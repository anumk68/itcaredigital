@extends('admin.includes.app')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="container">
                <h4>Inquery Details</h1>
                <div class="card">
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-3">Name:</dt>
                            <dd class="col-sm-9">{{ $data->name }}</dd>

                            <dt class="col-sm-3">Email:</dt>
                            <dd class="col-sm-9">{{ $data->email }}</dd>

                            <dt class="col-sm-3">Contact:</dt>
                            <dd class="col-sm-9">{{ $data->country_code .  $data->phone_number }}</dd>

                            <dt class="col-sm-3">Brand:</dt>
                            <dd class="col-sm-9">{{ $data->brand }}</dd>

                            <dt class="col-sm-3">Brand Model no:</dt>
                            <dd class="col-sm-9">{{ $data->model_number }}</dd>

                            <dt class="col-sm-3">Issue:</dt>
                            <dd class="col-sm-9">{{ $data->issue_description }}</dd>

                            <dt class="col-sm-3">Date:</dt>
                            <dd class="col-sm-9">{{ $data->created_at->format('M,d Y') }}</dd>
                        </dl>
                        <a href="{{ route('inquiry.list')}}" class="btn btn-primary">Back to List</a>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
