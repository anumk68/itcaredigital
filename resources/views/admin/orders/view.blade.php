@extends('layouts.adminapp')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="container">

                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Order #{{ $data->id }} Details</h5>
                    </div>
                    <div class="card-body">

                        <h5 class="mb-3 border-bottom pb-2">User Information</h5>
                        <div class="row mb-3">
                            <div class="col-md-6"><strong>Name:</strong> {{ $data->user->name ?? '-' }}</div>
                            <div class="col-md-6"><strong>Email:</strong> {{ $data->user->email ?? '-' }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6"><strong>Phone:</strong> {{ $data->user->phone ?? '-' }}</div>
                            <div class="col-md-6"><strong>Address:</strong> {{ $data->address ?? '-' }},
                                {{ $data->city ?? '' }}, {{ $data->state ?? '' }},
                                {{ $data->country ?? '' }} - {{ $data->zip ?? '' }}</div>
                        </div>

                        <h5 class="mb-3 border-bottom pb-2 mt-4">Order Information</h5>
                        <div class="row mb-3">
                            {{-- <div class="col-md-6"><strong>Payment Method:</strong>
                                {{ strtoupper($data->payment_method ?? '-') }}</div> --}}
                            {{-- <div class="col-md-6"><strong>Payment Status:</strong>
                                @if ($data->payment_status === 'paid')
                                    <span class="badge bg-success">Paid</span>
                                @else
                                    <span class="badge bg-warning text-dark">Unpaid</span>
                                @endif
                            </div> --}}
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6"><strong>Total Amount:</strong> <span
                                    class="text-success">₹{{ number_format($data->amount, 2) }}</span></div>
                            <div class="col-md-6"><strong>Order Status:</strong>
                                @php
                                    $badge = match ($data->status) {
                                        'pending' => 'bg-secondary',
                                        'processing' => 'bg-primary',
                                        'shipped' => 'bg-info',
                                        'delivered' => 'bg-success',
                                        'cancelled' => 'bg-danger',
                                        default => 'bg-dark',
                                    };
                                @endphp
                                <span class="badge {{ $badge }}">{{ ucfirst($data->status) }}</span>
                            </div>
                        </div>

                        <div class="mb-3"><strong>Created At:</strong> {{ $data->created_at->format('d M Y h:i A') }}
                        </div>

                        <h5 class="mb-3 border-bottom pb-2 mt-4">Ordered Package</h5>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <strong>Package Name:</strong> {{ $data->package->package_name ?? '-' }}
                            </div>
                            <div class="col-md-3">
                                <strong>Price:</strong> ₹   {{ number_format($data->amount ?? 0, 2) }}
                            </div>

                        </div>


                        <a href="{{ route('orders') }}" class="btn btn-outline-primary mt-3">
                            <i class='bx bx-arrow-back'></i> Back to Orders
                        </a>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
