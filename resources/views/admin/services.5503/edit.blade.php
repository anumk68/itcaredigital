@extends('layouts.adminapp')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="contact-form">
                    <div class="title">
                        <h2>Edit Service</h2>
                    </div>
                    <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Important: Use PUT for updating -->

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="service_name">Service Name*</label>
                                <input type="text" name="service_name" class="form-control" value="{{ old('service_name', $service->service_name) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="brand_id">Brand*</label>
                                <select name="brand_id" class="form-control" required>
                                    <option value="">Select Brand</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}" {{ old('brand_id', $service->brand_id) == $brand->id ? 'selected' : '' }}>
                                            {{ $brand->brand_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" class="form-control" value="{{ old('slug', $service->slug) }}">
                            </div>
                            <div class="col-md-6">
                                <label for="icon">Icon Image</label>
                                <input type="file" name="icon" class="form-control">
                                @if ($service->icon)
                                    <div class="mt-2">
                                        <strong>Current Icon:</strong><br>
                                        <img src="{{ asset('uploads/services/' . $service->icon) }}" alt="Icon" width="80">
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="banner_image">Banner Image</label>
                                <input type="file" name="banner_image" class="form-control">
                                @if ($service->banner_image)
                                    <div class="mt-2">
                                        <strong>Current Banner:</strong><br>
                                        <img src="{{ asset('uploads/services/' . $service->banner_image) }}" alt="Banner" width="120">
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $service->description) }}</textarea>
                            </div>
                        </div>

                        <!-- Status defaults to 'active' in the database -->

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <button class="btn btn-primary" type="submit">Update Service</button>
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
