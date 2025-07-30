@extends('layouts.adminapp')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!-- Breadcrumb -->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Vlogs</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item active" aria-current="page">New Vlog</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- End breadcrumb -->

            <h6 class="mb-0 text-uppercase">Vlog Create</h6>
            <hr />

            <div class="card">
                <div class="card-body">

                    <!-- Error Messages -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> Please fix the following errors:
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form id="add_form" class="form-horizontal" action="{{ route('vlog.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-2 row" id="category">
                            <label class="col-md-3 col-form-label">Brand <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <select class="form-control aiz-selectpicker" name="brand_id" id="brand_id"
                                    data-live-search="true" required>
                                    <option value="">Select Brand</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}"
                                            {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                            {{ $brand->brand_name }}
                                        </option>
                                    @endforeach

                                </select>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Vlog Title -->
                        <div class="form-group mb-2 row">
                            <label class="col-md-3 col-form-label">Vlog Title <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input type="text" placeholder="Vlog Title" onkeyup="makeSlug(this.value)" id="title"
                                    name="title" class="form-control" minlength="10" required value="{{ old('title') }}">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Slug -->
                        <div class="form-group mb-2 row">
                            <label class="col-md-3 col-form-label">Slug <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input type="text" placeholder="Slug" name="slug" id="slug" class="form-control"
                                    required value="{{ old('slug') }}">
                                @error('slug')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-2 row">
                            <label class="col-md-3 col-form-label">Blog link <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input type="url"
                                    placeholder="https://allprintersetup.com/blogs/how-to-troubleshoot-epson-paper-jam-problem"
                                    name="blog_link" class="form-control" required value="{{ old('blog_link') }}">
                                @error('blog_link')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Category -->
                        <div class="form-group mb-2 row" id="category">
                            <label class="col-md-3 col-form-label">Category <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <select class="form-control aiz-selectpicker" name="category_id" id="category_id"
                                    data-live-search="true" required>
                                    <option value="">Select One</option>
                                    @foreach ($vlog_categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- YouTube Video URL -->
                        <div class="form-group mb-2 row">
                            <label class="col-md-3 col-form-label">YouTube Video URL <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input type="url" placeholder="https://www.youtube.com/watch?v=..." name="video_url"
                                    class="form-control" required value="{{ old('video_url') }}">
                                @error('video_url')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Short Description -->
                        <div class="form-group mb-2 row">
                            <label class="col-md-3 col-form-label">Short Description <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <textarea name="short_description" rows="4" class="form-control" required>{{ old('short_description') }}</textarea>
                                @error('short_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Full Description -->
                        <div class="form-group mb-2 row">
                            <label class="col-md-3 col-form-label">Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="description" rows="3" name="description" minlength="160" maxlength="200">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Meta Title -->
                        <div class="form-group mb-2 row">
                            <label class="col-md-3 col-form-label">Meta Title</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="meta_title" placeholder="Meta Title"
                                    value="{{ old('meta_title') }}">
                                @error('meta_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Meta Image -->
                        <div class="form-group mb-2 row">
                            <label class="col-md-3 col-form-label">Meta Image <small>(200x200)</small></label>
                            <div class="col-md-9">
                                <input type="file" name="meta_img" class="form-control">
                                @error('meta_img')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Meta Description -->
                        <div class="form-group mb-2 row">
                            <label class="col-md-3 col-form-label">Meta Description</label>
                            <div class="col-md-9">
                                <textarea id="meta_description" name="meta_description" rows="5" class="form-control">{{ old('meta_description') }}</textarea>
                                @error('meta_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Meta Keywords -->
                        <div class="form-group mb-2 row">
                            <label class="col-md-3 col-form-label">Meta Keywords</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="meta_keywords" name="meta_keywords"
                                    placeholder="Meta Keywords" value="{{ old('meta_keywords') }}">
                                @error('meta_keywords')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group mb-1 text-right">
                            <button type="submit" id="submit_button" class="btn btn-primary">Save</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
