@extends('layouts.adminapp')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="container">
            <h3>Edit Support Assistance</h3>

            <!-- Display validation errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Support Assistance Edit Form -->
            <form action="{{ route('support.update', $supportAssistance->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="full_name">Full Name:</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" value="{{ $supportAssistance->full_name }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="phone_number">Phone Number:</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $supportAssistance->phone_number }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="model_number">Model Number:</label>
                    <input type="text" class="form-control" id="model_number" name="model_number" value="{{ $supportAssistance->model_number }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="type">Type:</label>
                    <input type="text" class="form-control" id="type" name="type" value="{{ $supportAssistance->type }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('support-index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
