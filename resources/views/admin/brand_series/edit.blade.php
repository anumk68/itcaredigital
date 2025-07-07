@extends('layouts.adminapp')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="container">
            <div class="contact-form">
                <div class="title">
                    <h2>Edit Brand Series</h2>
                </div>
                <form action="{{ route('brand_series.update', $series->id) }}" method="POST">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Brand*</label>
                            <select name="brand_id" class="form-control" required>
                                <option value="">Select Brand</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ $series->brand_id == $brand->id ? 'selected' : '' }}>
                                        {{ $brand->brand_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Series Name*</label>
                            <input type="text" name="series_name" class="form-control" value="{{ $series->series_name }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Slug</label>
                            <input type="text" name="slug" class="form-control" value="{{ $series->slug }}">
                        </div>
                        <div class="col-md-6">
                            <label>Status*</label>
                            <select name="status" class="form-control" required>
                                <option value="active" {{ $series->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $series->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <button class="btn btn-primary" type="submit">Update Series</button>
                            <a href="{{ route('brand_series.index') }}" class="btn btn-secondary">Back to List</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
