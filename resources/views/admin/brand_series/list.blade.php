@extends('layouts.adminapp')

@section('heads')
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="container">

            <!-- Flash Messages -->
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="page-breadcrumb d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Brand Series</div>
                <div class="ms-auto">
                    <div class="btn-group" style="margin-top: 20px;">
                        <a href="{{ route('brand_series.create') }}">
                            <button type="button" class="btn btn-primary">Create Series</button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover" id="seriesTable">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Brand Name</th>
                            <th>Series Name</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($series as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->brand->brand_name ?? '--' }}</td>
                            <td>{{ $item->series_name }}</td>
                            <td>{{ $item->slug ?? '--' }}</td>
                            <td>
                                @if ($item->status === 'active')
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>{{ $item->created_at->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('brand_series.edit', $item->id) }}" class="btn btn-info btn-sm">Edit</a>
                                <form action="{{ route('brand_series.destroy', $item->id) }}" method="POST" class="delete-form d-inline">
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script>
    $(document).ready(function() {
        $('#seriesTable').DataTable({
            "order": [[0, "asc"]],
            "pageLength": 10
        });

        document.body.addEventListener('submit', function(event) {
            if (event.target.matches('.delete-form')) {
                event.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'This record will be permanently deleted!',
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
