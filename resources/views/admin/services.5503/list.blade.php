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
                <div class="breadcrumb-title pe-3">Services</div>
                <div class="ms-auto">
                    <div class="btn-group" style="margin-top: 20px;">
                        <a href="{{ route('services.create') }}">
                            <button type="button" class="btn btn-primary">Create</button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover" id="servicesTable">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Service Name</th>
                            <th>Brand</th>
                            <th>Icon Image</th>
                            <th>Banner Image</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $service)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $service->service_name ?? '--' }}</td>
                            <td>{{ $service->brand->brand_name ?? '--' }}</td>
                            <td>
                                @if ($service->icon)
                                    <img src="{{ asset('storage/app/public/' . $service->icon) }}" alt="Icon" width="40">
                                @else
                                    --
                                @endif
                            </td>
                            <td>
                                @if ($service->banner_image)
                                    <img src="{{ asset('storage/app/public/' . $service->banner_image) }}" alt="Banner" width="80">
                                @else
                                    --
                                @endif
                            </td>
                            <td>{{ $service->slug ?? '--' }}</td>
                            <td>
                                @php
                                    $words = explode(' ', strip_tags($service->description));
                                    $displayText = implode(' ', array_slice($words, 0, 8));
                                    $isLongText = count($words) > 8;
                                @endphp
                                <p>{{ $displayText }}{{ $isLongText ? '...' : '' }}</p>
                            </td>
                            <td>
                                @if ($service->status == 'active')
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>{{ $service->created_at->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('services.edit', $service->id) }}" class="btn btn-info btn-sm">Edit</a>
                                <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="delete-form" style="display:inline;">
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
        $('#servicesTable').DataTable({
            "order": [[0, "asc"]],
            "pageLength": 10,
        });

        // Delete confirmation with SweetAlert2
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
