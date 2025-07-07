@extends('layouts.app')
<meta name="robots" content="noindex, nofollow" />
<style>


</style>
@section('content')
    <section class="banner-section"
        style="background: linear-gradient(rgb(31 191 255 / 52%), rgb(31 191 255 / 52%)), url(public/images/about_bannner.png);">
        <div class="container">
            <div class="row align-items-center g-5">
                <!-- Left Content -->
                <div class="col-lg-6">
                    <div class="banner_content">
                        <h1 class="display-5 fw-bold">Printer Support Plans by All Printer Setup</h1>
                        <p class="mt-3">
                            Keep your printer in optimal condition with trusted and affordable Printer Support Plans from
                            All Printer Setup. Routine problems can disrupt your workflow, whether it's a domestic printer,
                            a small business workplace, or an extensive corporate operation. Our tailored support plans are
                            designed to keep your devices in pristine condition while minimizing downtime.

                        </p>
                        <p class="mt-3">
                            We provide comprehensive coverage for all leading printer brands, including HP, Canon, Epson,
                            Brother, Dell, and others. From installation and setup to regular maintenance, driver updates,
                            connectivity issues, and error resolution, our trained technicians are available to support you
                            remotely or on-site, depending on your package.

                        </p>
                        <p class="mt-3">
                            With 24/7 support, rapid response times, and easy monthly or annual plans, All Printer Setup
                            provides peace of mind for all your printing needs, eliminating the need for expensive repairs
                            and technical holdups.

                        </p>
                        <p class="mt-3">
                            Join thousands of satisfied customers who trust us for reliable printer care. Select a plan that
                            matches your requirements and enjoy hassle-free printing support today!


                        </p>

                    </div>
                </div>

                <!-- Right Form -->
                <div class="col-lg-6">
                    <div class="form-container">
                        @include('partials.common-form', [
                            'brands' => $brands,
                            'serviceSlug' => $service->slug ?? '',
                            'prefix' => 'service16',
                        ])
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="member_pricing py_8">
        <div class="container">
            <h2 class="text-center title">Get Reliable Help with Our Printer Support Plans</h2>

            </P>
            <div class="row justify-content-center">


                @foreach ($packages as $package)
                    <div class="col-md-3 mb-3">
                        <div class="plan">
                            <h3>{{ $package->package_name }}</h3>
                            <div class="price">${{ number_format($package->price, 2) }}</div>
                            <div class="desc">{{ $package->short_description }}</div>

                            <button class="select-btn">
                                <a href="{{ route('package.detail', $package->slug) }}">Select Membership</a>

                            </button>

                            <div class="rating-review-box">
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <div class="reviews">24000+ Reviews</div>
                                </div>
                                <div class="reviewws">1L+ already Subscribed</div>
                            </div>

                            <span class="toggle-link" onclick="toggleList(this)">Show More Features</span>

                            <ul class="features">
                                @php
                                    $amenities = explode(',', $package->amenities);
                                @endphp

                                @foreach ($amenities as $amenity)
                                    <li>✓ {{ trim($amenity) }}</li>
                                @endforeach
                            </ul>


                        </div>
                    </div>
                @endforeach


            </div>
        </div>

    </section>

    <!--  -->
    <section class="remote_support">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="border_line">
                        <img src="{{ asset('public/images/icon.png') }}" alt="">
                        <h3>24/7 Remote Support Available</h3>
                        <p>Get help anytime with our 24/7 remote support. Solve your tech issues quickly without leaving
                            your home or office.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section_issue">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="{{ asset('public/images/technial-image.png') }}" alt="">
                </div>
                <div class="col-md-6">
                    <h3>Resolve Your Issues Anytime, Day or Night</h3>
                    <p>No matter the hour, if you’re facing a technical issue, our expert support team is just a call
                        away—ready to assist you whenever you need help.
                    </p>
                    <a href="{{ route('contact') }}" class="btn">Contact Us</a>
                </div>
            </div>
        </div>
    </section>
  @if ($orders->isNotEmpty())
        @foreach ($orders as $index => $order)
            <div class="notify-box popupBox" id="popupBox-{{ $index }}" style="display: none;">
                <div class="printer-decor top-right"></div>
                <div class="printer-decor bottom-left"></div>

                <div class="notify-img">
                    <img src="{{ asset('public/images/icons8-happy.gif') }}" alt="">
                </div>

                <div class="notify-text">
                    <span class="name">🎉 {{ ucfirst($order->user->name) }} just subscribed!</span>

                    @if ($order->amount)
                        <span class="plan mb-1">💰 ${{ $order->amount }} Plan</span>
                    @endif

                    @if ($order->created_at)
                        <span class="plan mb-1">🕒 {{ $order->created_at->diffForHumans() }}</span>
                    @endif

                    @if ($order->package->package_name)
                        <span class="plan mb-1">📦 {{ $order->package->package_name }}</span>
                    @endif

                </div>
            </div>
        @endforeach
    @else
        {{-- Fallback static box --}}
        <div class="notify-box popupBox" id="popupBox-0">
            <div class="printer-decor top-right"></div>
            <div class="printer-decor bottom-left"></div>
            <div class="notify-img">
                <img src="{{ asset('public/images/icons8-happy.gif') }}" alt="">
            </div>
            <div class="notify-text">
                <span class="name">We appreciate your subscription</span>
                <span class="plan mb-2">$99 Plan</span>
                <span class="plan">Richard has subscribed to the plan successfully!</span>
            </div>
        </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <!--  -->
    <script>
        function toggleList(element) {
            const list = element.nextElementSibling;
            list.style.display = list.style.display === 'none' ? 'block' : 'none';
            element.innerText = list.style.display === 'block' ? 'Hide Features' : 'Show More Features';
        }
    </script>
@endsection
