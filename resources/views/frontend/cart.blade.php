@extends('layouts.app')


@section('content')
<section class="cart_section">
    <div class="container py-5">
        <h2 class="fw-bold mb-4">Cart</h2>

        <div class="row g-4">
            <!-- Left Column -->
            <div class="col-lg-7">
                <div class="card p-4 card-shadow">
                    <h5 class="fw-bold mb-3">
                        <img src="https://cdn-icons-png.flaticon.com/512/4712/4712109.png" alt="icon" width="24" class="me-2">
                        {{ $package->package_name }}
                    </h5>

                    @php
                        $amenities = explode(',', $package->amenities);
                    @endphp

                    <ul class="list-unstyled">
                        @foreach ($amenities as $item)
                            <li class="mb-2"><i class="bi bi-check2-circle check-icon me-2"></i> {{ trim($item) }}</li>
                        @endforeach
                    </ul>

                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <span class="fw-bold fs-5">Rs. {{ number_format($package->price, 2) }}</span>
                        <button class="btn chat-btn" onclick="parent.LiveChatWidget.call('maximize')">Start Chat</button>
                    </div>
                </div>
                <p class="mt-4 fs-5">What else can we help with?</p>
            </div>

            <!-- Right Column -->
            <div class="col-lg-5">
                <div class="card p-4 card-shadow">
                    <h6 class="fw-bold mb-3">Order Summary</h6>

                    <div class="alert alert-success py-2 d-flex justify-content-between align-items-center">
                        <span class="small">Plan added to cart.</span>
                        <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert"></button>
                    </div>

                    <div class="border rounded p-3 mb-3">
                        <div class="d-flex justify-content-between">
                            <strong>{{ $package->package_name }}</strong>
                            <strong>Rs. {{ number_format($package->price, 2) }}</strong>
                        </div>
                        <p class="text-muted small mb-2">{{ $package->short_description }}</p>
                     
                    </div>

                    <ul class="list-unstyled mb-3">
                        <li class="d-flex justify-content-between"><span>Item(s)</span><span>1</span></li>
                        <li class="d-flex justify-content-between"><span>Sub Total</span><span>Rs. {{ number_format($package->price, 2) }}</span></li>
                    </ul>

                    <hr>
                    <div class="d-flex justify-content-between fw-bold mb-3">
                        <span>Total</span><span>Rs. {{ number_format($package->price, 2) }}</span>
                    </div>

                    <div class="checkout_btn">
                       <a href="{{ route('checkout', $package->id) }}" class="btn btn-primary w-100">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
