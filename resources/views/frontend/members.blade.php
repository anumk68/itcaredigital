@extends('layouts.app')

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
<!-- <section class="member_pricing py_8">
        <div class="container">
            <h2 class="text-center title">Get Reliable Help with Our Printer Support Plans</h2>

            </P>
            <div class="row justify-content-center">
                @foreach ($packages as $package)
                    @php
                        $packageReviews = $package->review ?? collect();
                        $average = $packageReviews->avg('rating');

                        $rounded = round($average * 2) / 2;
                        $count = $packageReviews->count();
                         $subscriberCount = $package->orders->count();
                    @endphp

                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="plan">
                            <h3>{{ $package->package_name }}</h3>
                        
                            <button class="select-btn">
                                <a href="{{ route('package.detail', $package->slug) }}">Select Membership</a>
                            </button>

                            <div class="rating-review-box">
                                <div class="stars">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($rounded >= $i)
                                            <i class="fas fa-star"></i>
                                        @elseif ($rounded >= $i - 0.5)
                                            <i class="fas fa-star-half-alt"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                    <div class="reviews">{{ $count }}+ Reviews</div>
                                </div>
                                @php
                                $displaySubscriberCount = ($subscriberCount ?? 0) > 0 ? $subscriberCount : rand(100, 200);
                            @endphp
                            
                            <div class="reviewws">{{ $displaySubscriberCount }}+ already Subscribed</div>

                            
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

    </section> -->


<main class="pricing-section py_8">
    <div class="container">
        <!-- One Time Fix -->
        <section class="plan-section">
            <div class="label-box">One Time Fix</div>
            <div class="card-container">
                @foreach ($packages->take(4) as $package)
                @php
                $packageReviews = $package->review ?? collect();
                $average = $packageReviews->avg('rating');

                $rounded = round($average * 2) / 2;
                $count = $packageReviews->count();
                $subscriberCount = $package->orders->count();
                @endphp

                <div class="card">
                    @if ($package->package_type == 'recommended')
                    <span class="badge recommended">RECOMMENDED</span>
                    @elseif($package->package_type == 'limited')
                             <span class="badge limited">LIMITED TIME OFFER</span>
                    @endif
                    <h3>{{ $package->package_name }}</h3>

                    @php
                    $priceArray = explode(',', $package->price);
                    $mainPrice = isset($priceArray[0]) ? number_format($priceArray[0], 2) : '0.00';
                    $cutPrice = isset($priceArray[1]) ? number_format($priceArray[1], 2) : null;
                    @endphp

                    <div class="price-box">
                        <span class="discounted-price">${{ $mainPrice }}</span>

                        @if ($cutPrice)
                        <span class="original-price">${{ $cutPrice }}</span>
                        @endif
                    </div>


                    <p>{{ $package->short_description }}</p>
                    <a href="{{ route('package.detail', $package->slug) }}" class="select-btn">Select Membership</a>

                    <div class="rating-review-box">
                        <div class="stars">
                            @for ($i = 1; $i <= 5; $i++) @if ($rounded>= $i)
                                <i class="fas fa-star"></i>
                                @elseif ($rounded >= $i - 0.5)
                                <i class="fas fa-star-half-alt"></i>
                                @else
                                <i class="far fa-star"></i>
                                @endif
                                @endfor

                        </div>
                        <div class="reviews">{{ $count }}+ Reviews</div>
                        @php
                        $displaySubscriberCount = ($subscriberCount ?? 0) > 0 ? $subscriberCount : rand(100, 200);
                        @endphp
                        <div class="reviewws">{{ $displaySubscriberCount }}+ already Subscribed</div>
                    </div>

                    <div class="features-toggle">
                        <div class="toggle-btn-wrapper">
                            <button class="toggle-btn">Show More Features ▼</button>
                        </div>

                        <div class="feature-wrapper">
                            <ul class="feature-list">
                                @php
                                $amenities = explode(',', $package->amenities);
                                @endphp
                                @foreach ($amenities as $amenity)
                                <li>✓ {{ trim($amenity) }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

        <!-- 365 Days Plans -->
        <section class="plan-section">
            <div class="label-box">365 Days Plans</div>
            <div class="card-container">
                @foreach ($packages->skip(4) as $package)
                @php
                $packageReviews = $package->review ?? collect();
                $average = $packageReviews->avg('rating');

                $rounded = round($average * 2) / 2;
                $count = $packageReviews->count();
                $subscriberCount = $package->orders->count();
                @endphp

                <div class="card">
                    @if ($package->package_type == 'recommended')
                    <span class="badge recommended">RECOMMENDED</span>
                    @elseif($package->package_type == 'limited')
                             <span class="badge limited">LIMITED TIME</span>
                    @endif
                   
                    <h3>{{ $package->package_name }}</h3>

                    @php
                    $priceArray = explode(',', $package->price);
                    $mainPrice = isset($priceArray[0]) ? number_format($priceArray[0], 2) : '0.00';
                    $cutPrice = isset($priceArray[1]) ? number_format($priceArray[1], 2) : null;
                    @endphp

                    <div class="price-box">
                        <span class="discounted-price">${{ $mainPrice }}</span>

                        @if ($cutPrice)
                        <span class="original-price">${{ $cutPrice }}</span>
                        @endif
                    </div>


                    <p>{{ $package->short_description }}</p>
                    <a href="{{ route('package.detail', $package->slug) }}" class="select-btn">Select Membership</a>

                    <div class="rating-review-box">
                        <div class="stars">
                            @for ($i = 1; $i <= 5; $i++) @if ($rounded>= $i)
                                <i class="fas fa-star"></i>
                                @elseif ($rounded >= $i - 0.5)
                                <i class="fas fa-star-half-alt"></i>
                                @else
                                <i class="far fa-star"></i>
                                @endif
                                @endfor

                        </div>
                        <div class="reviews">{{ $count }}+ Reviews</div>
                        @php
                        $displaySubscriberCount = ($subscriberCount ?? 0) > 0 ? $subscriberCount : rand(100, 200);
                        @endphp
                        <div class="reviewws">{{ $displaySubscriberCount }}+ already Subscribed</div>
                    </div>

                    <div class="features-toggle">
                        <div class="toggle-btn-wrapper">
                            <button class="toggle-btn">Show More Features ▼</button>
                        </div>

                        <div class="feature-wrapper">
                            <ul class="feature-list">
                                @php
                                $amenities = explode(',', $package->amenities);
                                @endphp
                                @foreach ($amenities as $amenity)
                                <li>✓ {{ trim($amenity) }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach

        </section>
    </div>
</main>

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
    <div class="notify-text">
        <div class="notify-img">
            <img src="{{ asset('public/images/icons8-happy.gif') }}" alt="">
        </div>
        <div class="rating_pricing">
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
</div>
@endforeach
@else
{{-- Fallback static random-like data --}}
@php
$fakeNames = ['jhon', 'Daniel', 'John', 'Sana', 'Emily', 'Suzan'];
$fakePackages = ['Starter', 'Pro', 'Enterprise', 'Business', 'Premium'];
$fakeAmounts = [279, 349, 189, 219, 149];
$fakeTimes = ['2 minutes ago', '10 minutes ago', '1 hour ago', 'Just now', '30 minutes ago'];
$fakeReviews = [
'Awesome support!',
'Highly recommended!',
'Very satisfied with the service.',
'Worth every penny!',
'Super fast setup!'
];

for ($i = 0; $i < 3; $i++) { $name=$fakeNames[array_rand($fakeNames)];
    $package=$fakePackages[array_rand($fakePackages)]; $amount=$fakeAmounts[array_rand($fakeAmounts)];
    $time=$fakeTimes[array_rand($fakeTimes)]; $review=$fakeReviews[array_rand($fakeReviews)]; @endphp <div
    class="notify-box popupBox" id="popupBox-{{ $i }}" style="display: none;">
    <div class="printer-decor top-right"></div>
    <div class="printer-decor bottom-left"></div>
    <div class="notify-text">
        <div class="notify-img">
            <img src="{{ asset('public/images/icons8-happy.gif') }}" alt="">
        </div>
        <div class="rating_pricing">
            <span class="name">🎉 {{ $name }} just subscribed!</span>
            <span class="plan mb-1">💰 ${{ $amount }} Plan</span>
            <span class="plan mb-1">🕒 {{ $time }}</span>
            <span class="plan mb-1">📦 {{ $package }}</span>
            <span class="plan">💬 "{{ $review }}"</span>
        </div>
    </div>
    </div>

    @php } @endphp
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