@extends('layouts.adminapp')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="container">

            <h3>Assistance Listing</h3>
            
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

            <div class="table-responsive">
                <table id="assistanceTable" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>City</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->full_name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->contact }}</td>
                            <td class="text-wrap">{{ $item->city }}</td>
                            <td class="text-wrap">{{ \Illuminate\Support\Str::words($item->message, 20, '...') }}</td>
                            <td>{{ $item->created_at->format('M d, Y')}}</td>
                            <td>
                                <a href="{{ route('assistance.show', $item->id) }}" class="btn btn-info btn-sm">View</a>
                                <form action="{{ route('assistance.destroy', $item->id) }}" method="POST" class="delete-form" style="display:inline;">
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize the DataTable
        $('#assistanceTable').DataTable();

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
@endsection
