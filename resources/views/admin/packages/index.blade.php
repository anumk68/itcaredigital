@extends('layouts.adminapp')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="container">

            <!-- Flash Messages -->
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
                <div class="breadcrumb-title pe-3">Packages</div>
                <div class="ms-auto">
                    <div class="btn-group" style="margin-top: 20px;">
                        <a href="{{ route('packages.create') }}">
                            <button type="button" class="btn btn-primary">Create</button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover" id="packageTable">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Package Name</th>
                            <th>Price</th>
                            <th>Short Description</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($packages as $package)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $package->package_name }}</td>
                            <td>₹{{ number_format($package->price, 2) }}</td>
                            <td>
                                @php
                                    $words = explode(' ', $package->short_description);
                                    $displayText = implode(' ', array_slice($words, 0, 8));
                                    $isLongText = count($words) > 8;
                                @endphp
                                <p>{{ $displayText }}{{ $isLongText ? '...' : '' }}</p>
                            </td>
                            <td>
                                @if ($package->status == 1)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>{{ $package->created_at->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('packages.edit', $package->id) }}" class="btn btn-info btn-sm">Edit</a>
                                <form action="{{ route('packages.delete', $package->id) }}" method="POST" class="delete-form d-inline">
                                    @csrf
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
        $('#packageTable').DataTable({
            "order": [[0, "asc"]],
            "pageLength": 10,
        });

        document.body.addEventListener('submit', function(event) {
            if (event.target.matches('.delete-form')) {
                event.preventDefault();

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You will not be able to recover this package!',
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
