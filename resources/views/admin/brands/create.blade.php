@extends('layouts.adminapp')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="contact-form">
                        <div class="title">
                            <h2>Create Brand</h2>
                        </div>
                        <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf <!-- CSRF token -->

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="brand_name">Brand Name*</label>
                                    <input type="text" name="brand_name" class="form-control"
                                        value="{{ old('brand_name') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="slug">Slug</label>
                                    <input type="text" name="slug" class="form-control" value="{{ old('slug') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="banner_image">Banner Image</label>
                                    <input type="file" name="banner_image" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="icon_image">Icon Image</label>
                                    <input type="file" name="icon_image" class="form-control">
                                </div>
                            </div>
                            <!-- 🆕 SEO Content Field -->
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="seo_content">SEO Content</label>
                                    <textarea name="seo_content" class="form-control" id ="description1" rows="4">{{ old('seo_content') }}</textarea>
                                </div>
                            </div>

                            <!-- 🆕 Additional Image Field -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="additional_image">Additional Image</label>
                                    <input type="file" name="additional_image" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" id = "description" nrows="4">{{ old('description') }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <h5>SEO Information</h5>
                                </div>
                                <div class="col-md-6">
                                    <label for="meta_title">Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control"
                                        value="{{ old('meta_title') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="meta_keyword">Meta Keyword</label>
                                    <input type="text" name="meta_keyword" class="form-control"
                                        value="{{ old('meta_keyword') }}">
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description') }}</textarea>
                                </div>
                            </div>

                            <!-- Status defaults to 'active' in the database, so no need to include a field here unless you want to give the option -->

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="submit">Save Brand</button>
                                    <a href="{{ route('brands.index') }}" class="btn btn-secondary">Back to List</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
