@extends('admin.includes.app')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="container">


                <!-- Display flash messages -->
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

                <div class="page-breadcrumb d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Pages</div>
                    <div class="ms-auto">
                        <div class="btn-group" style="margin-top: 20px;">
                            <a href="{{ route('pages.create') }}"><button type="button"
                                    class="btn btn-primary">Create</button></a>
                        </div>
                    </div>
                </div>
                    @csrf
                    @method('DELETE')
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="blogTable">
                            <thead>
                                <tr>                                  
                                    <th>Sr No.</th>
                                    <th>Page</th>
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $key => $blog)
                                    <tr>
                                       
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{ $blog->page }}
                                        </td>
                                        <td>
                                            {{ $blog->created_at->format('d M, Y') }}
                                        </td>
                                        <td>
                                            <!-- Add action buttons here -->
                                            <form action="{{ route('pages.destroy', $blog->id) }}" method="POST"
                                                class="delete-form" style="display:inline;">
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
@endsection
@section('heads')
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
@endsection

@section('scripts')
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function () {
            // Initialize DataTable
            $('#blogTable').DataTable({
                "order": [[0, "asc"]], // Order by first column (Serial)
                "pageLength": 10, // Display 10 records per page
            });

            // Attach event delegation to handle clicks on delete buttons
            document.body.addEventListener('submit', function (event) {
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
                            event.target.submit(); 
                        }
                    });
                }
            });
        });

        function confirmDelete(button) {
            // Show confirmation dialog
            const confirmation = confirm("Are you sure you want to delete this blog?");

            if (confirmation) {
                // If confirmed, submit the form
                button.closest('form').submit();
            }
        }
    </script>

    


@endsection