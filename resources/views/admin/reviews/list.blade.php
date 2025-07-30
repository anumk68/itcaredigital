@extends('layouts.adminapp')
@section('content')
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 45px;
            height: 25px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: 0.4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 19px;
            width: 19px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: 0.4s;
            border-radius: 50%;
        }

        input:checked+.slider {
            background-color: #007bff;
            /* Bootstrap blue */
        }

        input:checked+.slider:before {
            transform: translateX(20px);
        }
    </style>
    <div class="page-wrapper">
        <div class="page-content">
            <div class="container">

                <h3>Review Listing</h3>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="contactTable">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>User Name</th>
                                <th>Package Name</th>
                                <th>Rating</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->package->package_name }}</td>
                                    <td>{{ $item->rating }}</td>

                                    <td>
    <span class="date-text">{{ $item->created_at->format('M d, Y') }}</span>
    <button class="btn btn-sm btn-primary open-date-modal"
        data-id="{{ $item->id }}"
        data-date="{{ $item->created_at->format('Y-m-d') }}"
        data-url="{{ route('reviews.updateDate', $item->id) }}">
        Edit
    </button>
</td>
                                    <td>
                                        @if ($item->status == '1')
                                            <span class="badge bg-success fw-bold">Active</span>
                                        @else
                                            <span class="badge bg-danger fw-bold">Inactive</span>
                                        @endif
                                    </td>
                                    <td>

                                        <form action="{{ route('reviews.toggleStatus', $item->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            <label class="switch">
                                                <input type="checkbox" onchange="this.form.submit()"
                                                    {{ $item->status ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </label>
                                        </form>


                                        <form action="{{ route('reviews.delete', $item->id) }}" method="POST"
                                            class ="delete-form" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>



            </div>
        </div>
    </div>
    
    <!-- Date Edit Modal -->
<div class="modal fade" id="dateEditModal" tabindex="-1" aria-labelledby="dateEditModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="dateEditForm">
        @csrf
        @method('PUT')
        <div class="modal-header">
          <h5 class="modal-title">Edit Created Date</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="review_id">
          <input type="hidden" id="update_url">
          <div class="mb-3">
            <label for="created_at" class="form-label">Date</label>
            <input type="date" name="created_at" id="created_at" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Update</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection


@section('heads')
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize DataTable
            $('#contactTable').DataTable({
                // Customize DataTable settings if necessary
                "order": [
                    [0, "asc"]
                ], // Order by first column (Serial)
                "pageLength": 10, // Display 10 records per page
            });

            // Attach event delegation to handle clicks on delete buttons
            document.body.addEventListener('submit', function(event) {
                if (event.target.matches('.delete-form')) {
                    event.preventDefault(); // Prevent the form from submitting immediately

                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'You will not be able to recover this record!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            event.target.submit(); // Submit the form if confirmed
                        }
                    });
                }
            });
        });
    </script>
    <script>
$(document).ready(function () {
 
    $(document).on('click', '.open-date-modal', function () {
        let id = $(this).data('id');
        let date = $(this).data('date');
        let url = $(this).data('url');
 
        $('#review_id').val(id);
        $('#created_at').val(date);
        $('#update_url').val(url);
 
        $('#dateEditModal').modal('show');
    });
    $('#dateEditForm').submit(function (e) {
        e.preventDefault();
 
        let url = $('#update_url').val();
        let date = $('#created_at').val();
        let token = $('input[name="_token"]').val();
 
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                _token: token,
                _method: 'PUT',
                created_at: date
            },
            success: function (res) {
                if (res.success) {
                    let id = $('#review_id').val();
                    let row = $(`button[data-id="${id}"]`).closest('td');
                    row.find('.date-text').text(res.new_date);
                    $('#dateEditModal').modal('hide');
                }
            },
            error: function () {
                alert('Something went wrong.');
            }
        });
    });
 
});
</script>
@endsection
