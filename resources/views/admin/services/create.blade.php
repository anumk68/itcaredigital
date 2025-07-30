@extends('layouts.adminapp')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="contact-form">
                        <div class="title">
                            <h2>Create Service</h2>
                        </div>
                        <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf <!-- CSRF token -->

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="service_name">Service Name*</label>
                                    <input type="text" name="service_name" class="form-control"
                                        value="{{ old('service_name') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="brand_id">Brand*</label>
                                    <select name="brand_id" class="form-control" required>
                                        <option value="">Select Brand</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}"
                                                {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                                {{ $brand->brand_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="slug">Slug</label>
                                    <input type="text" name="slug" class="form-control" value="{{ old('slug') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="icon">Icon Image</label>
                                    <input type="file" name="icon" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="banner_image">Banner Image</label>
                                    <input type="file" name="banner_image" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" id="description" rows="4">{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <!-- Status defaults to 'active' in the database -->
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="meta_title">Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control"
                                        value="{{ old('meta_title') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description') }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="meta_keyword">Meta Keywords</label>
                                    <textarea name="meta_keyword" class="form-control" rows="2">{{ old('meta_keyword') }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="submit">Save Service</button>
                                    <a href="{{ route('services.index') }}" class="btn btn-secondary">Back to List</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
