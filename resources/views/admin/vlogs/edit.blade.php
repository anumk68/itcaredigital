@extends('layouts.adminapp')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Vlogs</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item active" aria-current="page">Edit Vlog</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">Edit Vlog</h6>
        <hr/>

        <div class="card">
            <div class="card-body">
                <form id="edit_form" class="form-horizontal" action="{{ route('vlog.update', $vlog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Vlog Title -->
                    <div class="form-group mb-2 row">
                        <label class="col-md-3 col-form-label">Vlog Title <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input type="text" placeholder="Vlog Title" onkeyup="makeSlug(this.value)" id="title" name="title" class="form-control" value="{{ $vlog->title }}" minlength="10" required>
                        </div>
                    </div>

                    <!-- Slug -->
                    <div class="form-group mb-2 row">
                        <label class="col-md-3 col-form-label">Slug <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input type="text" placeholder="Slug" name="slug" id="slug" class="form-control" value="{{ $vlog->slug }}" required>
                        </div>
                    </div>

                    <!-- Category -->
                    <div class="form-group mb-2 row" id="category">
                        <label class="col-md-3 col-from-label">Category <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <select class="form-control aiz-selectpicker" name="category_id" id="category_id" data-live-search="true" required>
                                <option value="">Select One</option>
                                @foreach ($vlog_categories as $category)
                                    <option value="{{ $category->id }}" {{ $vlog->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- YouTube Video URL -->
                    <div class="form-group mb-2 row">
                        <label class="col-md-3 col-form-label">YouTube Video URL <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input type="url" placeholder="https://www.youtube.com/watch?v=..." name="video_url" class="form-control" value="{{ $vlog->video_url }}" required>
                        </div>
                    </div>

                    <!-- Short Description -->
                    <div class="form-group mb-2 row">
                        <label class="col-md-3 col-form-label">Short Description <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <textarea name="short_description" rows="4" class="form-control" required>{{ $vlog->short_description }}</textarea>
                        </div>
                    </div>

                    <!-- Full Description -->
                    <div class="form-group mb-2 row">
                        <label class="col-md-3 col-from-label">Description</label>
                        <div class="col-md-9">
                            <textarea class="form-control" id="description" rows="3" name="description" minlength="160" maxlength="200">{{ $vlog->description }}</textarea>
                        </div>
                    </div>

                    <!-- Meta Title -->
                    <div class="form-group mb-2 row">
                        <label class="col-md-3 col-form-label">Meta Title</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="meta_title" placeholder="Meta Title" value="{{ $vlog->meta_title }}">
                        </div>
                    </div>

                    <!-- Meta Image -->
                    <div class="form-group mb-2 row">
                        <label class="col-md-3 col-form-label">Meta Image <small>(200x200)</small></label>
                        <div class="col-md-9">
                            <input type="file" name="meta_img" class="form-control">
                            @if($vlog->meta_img)
                                <img src="{{ asset($vlog->meta_img) }}" alt="Meta Image" width="100" class="mt-2">
                            @endif
                        </div>
                    </div>

                    <!-- Meta Description -->
                    <div class="form-group mb-2 row">
                        <label class="col-md-3 col-form-label">Meta Description</label>
                        <div class="col-md-9">
                            <textarea id="meta_description" name="meta_description" rows="5" class="form-control">{{ $vlog->meta_description }}</textarea>
                            <div id="meta_char_count">0/160 characters</div>
                            <div id="meta_error_message" style="color: red; display: none;"></div>
                        </div>
                    </div>

                    <!-- Meta Keywords -->
                    <div class="form-group mb-2 row">
                        <label class="col-md-3 col-form-label">Meta Keywords</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="{{ $vlog->meta_keywords }}">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group mb-0 text-right">
                        <button type="submit" id="submit_button" class="btn btn-primary">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
