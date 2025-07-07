@extends('layouts.adminapp')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="contact-form">
                    <div class="title">
                        <h2>Create FAQ</h2>
                    </div>
                    <form action="{{ route('faqs.store') }}" method="POST">
                        @csrf <!-- CSRF token -->

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="brand_id">Brand (Optional)</label>
                                <select name="brand_id" id="brand_id" class="form-control">
                                    <option value="">Select Brand</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                            {{ $brand->brand_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="service_id">Service (Optional)</label>
                                <select name="service_id" id="service_id" class="form-control">
                                    <option value="">Select Service</option>
                                    @foreach($services as $service)
                                        <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                            {{ $service->service_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="question">Question*</label>
                                <input type="text" name="question" class="form-control" value="{{ old('question') }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="answer">Answer*</label>
                                <textarea name="answer" class="form-control" rows="5" required>{{ old('answer') }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="status">Status*</label>
                                <select name="status" class="form-control" required>
                                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <button class="btn btn-primary" type="submit">Save FAQ</button>
                                <a href="{{ route('faqs.index') }}" class="btn btn-secondary">Back to List</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
