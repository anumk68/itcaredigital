@extends('layouts.adminapp')

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
                <div class="breadcrumb-title pe-3">Vlogs</div>
                <div class="ms-auto">
                    <div class="btn-group" style="margin-top: 20px;">
                        <a href="{{ route('vlog.create') }}">
                            <button type="button" class="btn btn-primary">Create Vlog</button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover" id="vlogTable">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Short Description</th>
                            <th>Video Link</th>
                            <th>Created Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vlogs as $key => $vlog)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $vlog->title }}</td>
                            <td>
                                @if ($vlog->category)
                                    {{ $vlog->category->category_name }}
                                @else
                                    --
                                @endif
                            </td>
                            <td>
                                @php
                                    $words = explode(' ', $vlog->short_description);
                                    $displayText = implode(' ', array_slice($words, 0, 8));
                                    $isLongText = count($words) > 8;
                                @endphp
                                <p>{{ $displayText }}{{ $isLongText ? '...' : '' }}</p>
                            </td>
                            <td>
                                @php
                                    // Get the YouTube video ID
                                    preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $vlog->video_url, $matches);
                                    $videoId = $matches[1] ?? null;
                                @endphp

                                @if ($videoId)
                                    <iframe width="120" height="70" src="https://www.youtube.com/embed/{{ $videoId }}" frameborder="0" allowfullscreen></iframe>
                                @else
                                    <a href="{{ $vlog->video_url }}" target="_blank">Watch</a>
                                @endif
                            </td>
                            <td>{{ $vlog->created_at->format('Y-m-d') }}</td>

                            <td>
                                <a href="{{ route('vlog.edit', $vlog->id) }}" class="btn btn-info btn-sm">Edit</a>
                                <form action="{{ route('vlog.delete', $vlog->id) }}" method="POST" class="delete-form d-inline">
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
        $('#vlogTable').DataTable({
            "order": [[0, "asc"]],
            "pageLength": 10,
        });

        document.body.addEventListener('submit', function(event) {
            if (event.target.matches('.delete-form')) {
                event.preventDefault();

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You will not be able to recover this vlog!',
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
