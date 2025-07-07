@extends('layouts.adminapp')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="container">
                <h1>Contact Details</h1>
                <div class="card">
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-3">Name:</dt>
                            <dd class="col-sm-9">{{ $data->full_name }}</dd>

                            <dt class="col-sm-3">Email:</dt>
                            <dd class="col-sm-9">{{ $data->email }}</dd>

                            <dt class="col-sm-3">Contact:</dt>
                            <dd class="col-sm-9">{{ $data->contact }}</dd>

                            <dt class="col-sm-3">Subject:</dt>
                            <dd class="col-sm-9">{{ $data->subject }}</dd>

                            <dt class="col-sm-3">Message:</dt>
                            <dd class="col-sm-9">{{ $data->message }}</dd>
                        </dl>
                        <a href="{{ route('contact-index') }}" class="btn btn-primary">Back to List</a>

                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
