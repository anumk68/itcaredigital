@extends('layouts.app')
<meta name="robots" content="noindex, nofollow" />
<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

@section('content')
    <section class="video_banner"
        style="background: linear-gradient(rgb(31 191 255 / 52%), rgb(31 191 255 / 52%)), url(public/images/about_bannner.png);">
        <div class="container">
            <div class="row">
                <div class="text_video_heading">
                    <h1>Account</h1>
                </div>
            </div>
        </div>

    </section>

    <section class="account py_8">
        <div class="container">
            <div class="row">
                <!-- Sidebar Navigation -->
                <div class="col-md-3 sidebar">
                    <ul class="nav nav-pills flex-md-column flex-row justify-content-around" id="dashboardTabs"
                        role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="dashboard-tab" data-bs-toggle="pill"
                                data-bs-target="#dashboard" type="button" role="tab"><i class="fa fa-tachometer"></i>
                                Dashboard</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="orders-tab" data-bs-toggle="pill" data-bs-target="#orders"
                                type="button" role="tab"><i class="fa fa-shopping-cart"></i> Orders</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="account-tab" data-bs-toggle="pill" data-bs-target="#account"
                                type="button" role="tab"><i class="fa fa-user"></i> Account Details</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <form action="{{ route('user.logout') }}" method="POST">
                                @csrf
                                <button class="nav-link" id="logout-tab" data-bs-toggle="pill" data-bs-target="#logout"
                                    type="submit" role="tab"><i class="fa fa-sign-out"></i> Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>

                <!-- Content Area -->
                <div class="col-md-9 tab-content" id="dashboardTabsContent">
                    <!-- Dashboard -->
                    <div class="tab-pane fade show active" id="dashboard" role="tabpanel">
                        @if (session('success'))
                            <div class="alert alert-success mt-3">
                                {{ session('success') }}
                            </div>
                        @endif

                        <h4>Dashboard</h4>
                        <p>Hello, <strong>{{ Auth::guard('user')->user()->name }}</strong></p>
                        <p>From your account dashboard you can check your recent orders, manage your address and edit your
                            account info.</p>
                    </div>

                    <!-- Orders -->
                    <div class="tab-pane fade" id="orders" role="tabpanel">
                        <h4 class="mb-3">My Orders</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped align-middle">
                                <thead class="table-dark">
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Package</th>
                                        <th>Order Status</th>
                                        <th>Total</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($orders as $key => $order)
                                        <tr class="text-center">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $order->package->package_name ?? '-' }}</td>


                                            {{-- Order Status --}}
                                            <td>
                                                @php
                                                    $status = strtolower($order->status);
                                                    $badge = match ($status) {
                                                        'pending' => 'bg-secondary',
                                                        'processing' => 'bg-primary',
                                                        'shipped' => 'bg-info',
                                                        'delivered' => 'bg-success',
                                                        'cancelled' => 'bg-danger',
                                                        default => 'bg-dark',
                                                    };
                                                @endphp
                                                <span class="badge {{ $badge }}">{{ ucfirst($status) }}</span>
                                            </td>

                                            <td>₹{{ number_format($order->amount ?? 0, 2) }}</td>
                                            <td>{{ $order->created_at->format('d M Y') }}</td>
                                            <td>
                                                <a href="{{ route('order.invoice.download', $order->id) }}"
                                                    class="btn btn-sm btn-outline-secondary">
                                                    <i class='bx bx-download'></i> Invoice
                                                </a>
                                            </td>

                                            </td>


                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center text-muted">No orders found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <!-- Account Details -->
                    <div class="tab-pane fade" id="account" role="tabpanel">
                        <h4>Account Details</h4>
                        <form class="mt-4" method="POST" action="{{ route('update.account') }}">
                            @csrf

                            <div class="row mb-3">
                                <div class="col-md-6 mb-2">
                                    <input type="text" class="form-control" name="name"
                                        value="{{ Auth::guard('user')->user()->name ?? '' }}">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <input type="email" class="form-control" name="email"
                                        value="{{ Auth::guard('user')->user()->email ?? '' }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 mb-2">
                                    <input type="text" class="form-control" name="phone" placeholder="Phone"
                                        value="{{Auth::guard('user')->user()->phone ?? '' }}">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <input type="text" class="form-control" name="zip_code" placeholder="Zip Code"
                                        value="{{ Auth::guard('user')->user()->zip_code ?? '' }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <textarea class="form-control" name="address" rows="4" placeholder="Address">{{ Auth::guard('user')->user()->address ?? '' }}</textarea>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4 mb-2">
                                    <input type="text" class="form-control" name="country" placeholder="Country"
                                        value="{{ Auth::guard('user')->user()->country ?? '' }}">
                                </div>
                                <div class="col-md-4 mb-2">
                                    <input type="text" class="form-control" name="state" placeholder="State"
                                        value="{{ Auth::guard('user')->user()->state ?? '' }}">
                                </div>
                                <div class="col-md-4 mb-2">
                                    <input type="text" class="form-control" name="city" placeholder="City"
                                        value="{{ Auth::guard('user')->user()->city ?? '' }}">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>

                    </div>

                    <!-- Logout -->
                    <div class="tab-pane fade" id="logout" role="tabpanel">
                        <h4>You have been logged out.</h4>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
