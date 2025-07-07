@extends('layouts.app')
<meta name="robots" content="noindex, nofollow" />

@section('content')
    <section class="checkout_page py_8">
        <div class="container">
            <div class="row">
                <!-- Billing Details -->
                <div class="col-md-7 mb-4">
                    <h4 class="mb-3">Billing details</h4>
                    <form action="{{ route('place.order') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="name" class="form-control" placeholder="Name"
                                    value="{{ Auth::check() ? Auth::user()->name : old('name') }}" required />
                            </div>
                            <div class="col">
                                <input type="email" name="email" class="form-control" placeholder="Email"
                                    value="{{ Auth::check() ? Auth::user()->email : old('email') }}" required />
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="phone" class="form-control" placeholder="Phone *"
                                value="{{ Auth::check() ? Auth::user()->phone_no ?? '' : old('phone') }}" required />
                        </div>
                        <div class="mb-3">
                            <input type="text" name="address" class="form-control"
                                placeholder="House number and street name" required />
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <select name="country" class="form-select" required>
                                    <option value="">Select Country</option>
                                    <option value="India">India</option>
                                    <option value="USA">USA</option>
                                    <!-- Add more countries -->
                                </select>
                            </div>
                            <div class="col">
                                <select name="state" class="form-select" required>
                                    <option value="">Select State</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Delhi">Delhi</option>
                                    <!-- Add more states -->
                                </select>
                            </div>
                            <div class="col">
                                <select name="city" class="form-select" required>
                                    <option value="">Select City</option>
                                    <option value="Ludhiana">Ludhiana</option>
                                    <option value="Chandigarh">Chandigarh</option>
                                    <!-- Add more cities -->
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="zip" class="form-control" placeholder="Postcode / ZIP"
                                required />
                        </div>
                        <div class="mb-3">
                            <textarea name="notes" class="form-control" rows="4" placeholder="Notes about your order..."></textarea>
                        </div>

                        <input type="hidden" name="package_id" value="{{ $package->id }}">
                        <input type="hidden" name="amount" value="{{ $package->price }}">

                        <button type="submit" class="btn btn-primary w-100">PLACE ORDER</button>
                    </form>

                </div>

                <!-- Your Order -->
                <div class="col-md-5">
                    <div class="p-4 border">
                        <h5 class="mb-3">Your Order</h5>
                        <table class="table mb-3">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th class="text-end">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $package->package_name }}</td>
                                    <td class="text-end">₹{{ number_format($package->price, 2) }}</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td class="text-end fw-bold">₹{{ number_format($package->price, 2) }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-primary w-100">PLACE ORDER</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
