@extends('layouts.adminapp')

@section('heads')
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
@endsection

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
                <div class="breadcrumb-title pe-3">Brands</div>
                <div class="ms-auto">
                    <div class="btn-group" style="margin-top: 20px;">
                        <a href="{{ route('brands.create') }}">
                            <button type="button" class="btn btn-primary">Create</button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover" id="brandTable">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Brand Name</th>
                            <th>Icon Image</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $brand)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $brand->brand_name ?? '--' }}</td>
                            <td>
                                @if ($brand->icon_image)
                                    <img src="{{ asset('storage/app/public/' . $brand->icon_image) }}" alt="Icon" width="40">
                                @else
                                    --
                                @endif
                            </td>
                            <td>{{ $brand->slug ?? '--' }}</td>
                            <td>
                                @php
                                    $words = explode(' ', strip_tags($brand->description));
                                    $displayText = implode(' ', array_slice($words, 0, 8));
                                    $isLongText = count($words) > 8;
                                @endphp
                                <p>{{ $displayText }}{{ $isLongText ? '...' : '' }}</p>
                            </td>
                            <td>
                                @if ($brand->status == 'active')
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>{{ $brand->created_at->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-info btn-sm">Edit</a>
                                <form action="{{ route('brands.destroy', $brand->id) }}" method="POST" class="delete-form" style="display:inline;">
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

@section('scripts')
<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize DataTable
        $('#brandTable').DataTable({
            "order": [[0, "asc"]],
            "pageLength": 10,
        });

        // Attach event delegation to handle delete confirmation
        document.body.addEventListener('submit', function(event) {
            if (event.target.matches('.delete-form')) {
                event.preventDefault();

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
</script>
@endsection
