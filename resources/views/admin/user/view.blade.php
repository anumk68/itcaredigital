@extends('layouts.adminapp')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="container">
                <h3>User Details</h3>
                <div class="card">
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-3">Name:</dt>
                            <dd class="col-sm-9">{{ $data->name  }}</dd>

                            <dt class="col-sm-3">Email:</dt>
                            <dd class="col-sm-9">{{ $data->email }}</dd>

                            <dt class="col-sm-3">Phone No:</dt>
                            <dd class="col-sm-9">{{ $data->phone }}</dd>

                            <dt class="col-sm-3">Address:</dt>
                            <dd class="col-sm-9">{{ $data->address ?? '-' }}</dd>

                            <dt class="col-sm-3">Zip code:</dt>
                            <dd class="col-sm-9">{{ $data->zip_code ?? '-' }}</dd>

                            <dt class="col-sm-3">Country:</dt>
                            <dd class="col-sm-9">{{ $data->country ?? '-' }}</dd>

                            <dt class="col-sm-3">State:</dt>
                            <dd class="col-sm-9">{{ $data->state ?? '-' }}</dd>

                            <dt class="col-sm-3">City:</dt>
                            <dd class="col-sm-9">{{ $data->city  ?? '-'}}</dd>
                        </dl>
                        <a href="{{ route('manage.users') }}" class="btn btn-primary">Back to List</a>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
