@extends('layouts.app')

@section('meta_description')
@section('content')

    <section class="banner-section"
        style="background: linear-gradient(rgb(31 191 255 / 52%), rgb(31 191 255 / 52%)),
              url(public/images/about_bannner.png);">

        <div class="container">
            <div class="row align-items-center g-5">
                <!-- Left Content -->
                <div class="col-lg-6">
                    <div class="banner_content">
                        <h1 class="display-5 fw-bold">Dealing with Printer Problems? Get Instant Support</h1>
                        <p class="mt-3">
                            All Printer Setup offers expert and accessible Online Printer Support Services to customers all
                            over the USA. Whether your printer is displaying spooler errors, having connectivity issues, or
                            just not responding, our expert support team is here to assist you. From simple driver updates
                            to complex setup failures, we do it all—so you can stop worrying about technical issues.
                        </p>
                        <p>Our certified technicians offer round-the-clock printer help for all major brands, including HP,
                            Canon, Brother, and Epson. No matter what model you own, we deliver personalized printer support
                            services designed to diagnose and fix your device quickly and efficiently.
                        </p>

                    </div>
                </div>

                <!-- Right Form -->
                <div class="col-lg-6">

                    <div class="form-container">
                        @include('partials.common-form', [
                            'brands' => $brands,
                            'serviceSlug' => $service->slug ?? '',
                            'prefix' => 'service1',
                        ])
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="printer-brands py_8">
        <div class="container">
            <div class="printer_brands_heaidng">
                <h2>Select Your Printer Brand with Confidence</h2>
                <p>Get Expert Support for All Leading Printer Brands in One Place!</p>
            </div>


            @foreach ($brands->chunk(5) as $brandRow)
                <div class="row justify-content-center">
                    @foreach ($brandRow as $brand)
                        <div class="col-lg-2 col-md-3 col-sm-4 mb-3">
                            <div class="brand-card">
                                <a href="{{ route('printer', ['brand_slug' => strtolower($brand->slug)]) }}">
                                    @if ($brand->icon_image)
                                        <img src="{{ asset('storage/app/public/' . $brand->icon_image) }}"
                                            alt="{{ $brand->brand_name }}">
                                    @else
                                        <img src="{{ asset('images/default_logo.png') }}" alt="No Image">
                                    @endif
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach

        </div>
        </div>
    </section>

    <section class="why_choose_us pb-0">
        <div class="container">
            <div class="row align-items-center">

                <!-- Left Column (Video) -->
                <!-- <div class="video-container">
                                    <video autoplay muted loop>
                                         <source src="{{ asset('public/video/final_after_changes.mp4') }}" type="video/mp4">
                                      Why Choose All Printer Setup to Fix Your Printer Issues?
                                    </video>
                                </div> -->
                <div class="col-md-6 mx-auto text-center">
                    <div class="video-thumbnail" onclick="openPopup()">
                        <img src="{{ asset('public/images/video_background_img.jpg') }}" alt="printer_logo">
                        <div class="play-button">&#9658;</div>
                    </div>

                    <!-- Popup Section -->
                    <div class="popup" id="videoPopup">
                        <div class="popup-content">
                            <span class="close-popup" onclick="closePopup()">&times;</span>
                            <iframe id="youtubeVideo" src="" frameborder="0" allow="autoplay; encrypted-media"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>

                <!-- Right Column (Content) -->
                <div class="col-md-6 mb-3">
                    <div class="content-box">
                        <h2 class="section-heading"> Why Choose All Printer Setup to Fix Your Printer Issues?</h2>
                        <p class="section-content">
                            Trained support engineers at All Printer Setup are available 24/7 to diagnose and resolve any
                            printer issues — whether it's a printer spooler failure, connectivity problems, or routine
                            maintenance. We provide brand-agnostic printer support for HP, Canon, Brother, and Epson
                            printers.

                        </p>
                        <p>Our mission is straightforward to provide quick and professional printer assistance whenever you
                            need it. Getting expert printer service is simple with us — phone us anytime, and we'll take
                            care of the rest.</p>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <section class="why_choose_us py_8">
        <div class="container">
            <div class="row align-items-center">

                <!-- Right Column (Content) -->
                <div class="col-md-6 mb-3">
                    <div class="content-box">
                        <h2 class="section-heading">Who We Are</h2>
                        <p class="section-content">
                            Professionals at All Printer Setup are trained to deliver trusted printer support for all major
                            brands, including HP, Canon, Brother, and Epson. Whether it's setup help, printer connectivity
                            issues, or routine printer maintenance services, we're here 24/7 to get your device working
                            again.
                        </p>
                        <p>Our experts offer easy-to-follow printer assistance that simplifies fixing problems — from
                            spooler issues to complete device restoration. Is quick Printer repair needed? Contact us
                            anytime. We are always prepared to help.</p>
                        <div class="btn_about_us">
                            <a href="{{ route('about') }}" class="btn">Read More</a>
                        </div>
                    </div>
                </div>

                <!-- Left Column (Video) -->
                <div class="col-md-6 mb-3">
                    <div class="img_about">
                        <img src="{{ asset('public/images/12345image.jpg') }}" alt="">
                    </div>
                </div>
            </div>

        </div>
    </section>
<main class="pricing-section  ">
    <div class="container">
                    <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="sec-title-two text-center">
                        <h2 class="title mb-4">Flexible Plans for Reliable Printer Support </h2>
                    </div>
                </div>
            </div>
        <!-- One Time Fix -->
        <section class="plan-section">
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
  <div class="btn_member_btn">
                    <a href="{{ route('members') }}" class="btn">See More</a>
                </div>
    </div>
</main>


               
           
    <section class="latest-blog-area py_8">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-9">
                    <div class="sec-title-two pull-left">
                        <h2>All Printer Setup - Latest Blogs Update</h2>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="button pull-right">
                        <!-- <a href="{{ route('blogs') }}">Read More News<i class="fa fa-caret-right"
                                            aria-hidden="true"></i></a> -->
                        <a href="{{ route('blogs') }}" class="btn">Read More News</i></a>
                    </div>
                </div>
            </div>
            <div class="owl-carousel owl-theme" id="owl_1">
                @foreach ($blogs as $blog)
                    <div class="item">
                        <div class="single-latest-blog11">
                            <div class="img-holder">
                                <img class="lazyload" src="{{ asset('public/' . $blog->banner) }}"
                                    alt="{{ $blog->banner_alt }}">
                                <div class="overlay-box">
                                    <div class="box">
                                        <div class="content">
                                            <a href="{{ route('blog.blog_details', $blog->slug) }}"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-holder">
                                <ul class="meta-info">
                                    <li><a href="#">{{ $blog->author }}</a></li>
                                    <li><i class="fa fa-clock-o" aria-hidden="true"></i><a
                                            href="#">{{ $blog->created_at->format('M d, Y') }}</a></li>
                                </ul>
                                
                                
                                <a href="{{ route('blog.blog_details', $blog->slug) }}">
                                    <h3 class="blog-title">
    {{ \Illuminate\Support\Str::words($blog->title, 6, '...') }}
</h3>

                                </a>
                                <p>{{ substr($blog->meta_description, 0, 140) }}...</p>
                                <a class="btn" href="{{ route('blog.blog_details', $blog->slug) }}">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <section class="testimonials py_8">
        <div class="container">
            <h2 class="title">What Our Clients Say</h2>
            <p class="subtitle">Real Experiences, Real Satisfaction — Hear Directly from Our Happy Customers!</p>

            <div class="owl-carousel testimonial-slider">
                <!-- Testimonial 1 -->
                <div class="testimonial-box">
                    <img src="{{ asset('public/images/testimonial_1.jpg') }}" alt="John Davidson" class="profile">
                    <h3> Sarah M., Chicago, IL</h3>
                    <div class="stars">★★★★★</div>
                    <p>“I had constant printer spooler problems with my HP printer, and All Printer Setup sorted it out
                        instantly. Their support staff was extremely friendly and online late at night when I desperately
                        needed assistance.last line - I highly recommend All Printer Setup.
                    </p>
                </div>

                <!-- Testimonial 2 -->
                <div class="testimonial-box">
                    <img src="{{ asset('public/images/testimonial_2.jpg') }}" alt="Robert McCauley" class="profile">
                    <h3>Daniel R., Dallas, TX</h3>
                    <div class="stars">★★★★★</div>
                    <p>“My Canon printer repeatedly disconnects from Wi-Fi. I rang All Printer Setup and received immediate
                        assistance. They guided me through the repair step by step — top-notch printer connectivity service
                        and fantastic service in general.”</p>
                </div>

                <!-- Testimonial 3 -->
                <div class="testimonial-box">
                    <img src="{{ asset('public/images/testimonial_3.jpg') }}" alt="Elizabeth" class="profile">
                    <h3>Melissa T., San Diego, CA</h3>
                    <div class="stars">★★★★★</div>
                    <p>“Our office Epson printer needed regular maintenance, and these guys made it hassle-free. Their
                        printer maintenance service is smooth, fast, and affordable. We'll keep using All Printer Setup for
                        all our printer support services.”</p>
                </div>
            </div>
        </div>
    </section>

    <section class="appoinment-area py_8 pb-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="products">
                        <div class="main_print_form">
                            <img src="{{ asset('public/images/fill_out_form_img.webp') }}" alt="Brother">
                            <!-- <img class="lazyload" data-src="{{ asset('public/images/about/fill_out_form_img.webp') }}" alt="printing_form"> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="form-container">
                        @include('partials.common-form', [
                            'brands' => $brands,
                            'serviceSlug' => $service->slug ?? '',
                            'prefix' => 'service2',
                        ])
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="faq-container py_8">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-md-6 mb-3">
                    <div class="faq-content">
                        <h2>Frequently Asked Questions</h2>

                        <div class="faq-item">
                            <div class="faq-question" onclick="toggleFAQ(this)">
                                <span>What types of printer issues do you handle?
                                </span>
                                <span class="icon">+</span>
                            </div>
                            <div class="faq-answer">
                                <p>We address all serious printer issues, including spooler errors, driver issues,
                                    connectivity problems, slow printing, and paper jams. We also offer professional printer
                                    maintenance for optimal performance over the long term.</p>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question" onclick="toggleFAQ(this)">
                                <span>Do you offer support for all printer brands?</span>
                                <span class="icon">+</span>
                            </div>
                            <div class="faq-answer">
                                <p>Yes, we do offer printer support services for leading brands such as HP, Canon, Brother,
                                    and Epson, among several others. Regardless of the printer model you're using, we're
                                    here to assist you.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question" onclick="toggleFAQ(this)">
                                <span>How quickly can I get help for my printer issue?
                                </span>
                                <span class="icon">+</span>
                            </div>
                            <div class="faq-answer">
                                <p>Our 24/7 support team is here to assist you. The majority of issues are fixed within the
                                    first call or session. We're dedicated to providing quick, live printer assistance
                                    throughout the United States.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question" onclick="toggleFAQ(this)">
                                <span>Can you help with printer Wi-Fi and network setup?</span>
                                <span class="icon">+</span>
                            </div>
                            <div class="faq-answer">
                                <p>Yes. Our expertise includes resolving printer connectivity problems, such as Wi-Fi
                                    configuration, network printing, and re-establishing printers that continually go
                                    offline.
                                </p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question" onclick="toggleFAQ(this)">
                                <span>Is there a money-back guarantee if my issue isn’t fixed?</span>
                                <span class="icon">+</span>
                            </div>
                            <div class="faq-answer">
                                <p>Yes. If our team is unable to resolve your issue, we offer a full refund under our
                                    printer support warranty — we prioritize customer satisfaction.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question" onclick="toggleFAQ(this)">
                                <span>Do you offer regular maintenance or just one-time fixes?</span>
                                <span class="icon">+</span>
                            </div>
                            <div class="faq-answer">
                                <p>We provide both! You can call for an individual printer service or arrange regular
                                    printer maintenance services to prevent future failures and ensure your equipment
                                    continues to run efficiently.</p>
                            </div>
                        </div>
                        <!-- Add more FAQ items as needed -->
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="faq_images">
                        <img src="{{ asset('public/images/Customer_support.jpg') }}" alt="FAQ public/images">
                    </div>
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
        $fakeNames = ['jhon', 'Daniel', 'John', 'Sana', 'Emily',  'Suzan'];
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

        for ($i = 0; $i < 3; $i++) {
            $name = $fakeNames[array_rand($fakeNames)];
            $package = $fakePackages[array_rand($fakePackages)];
            $amount = $fakeAmounts[array_rand($fakeAmounts)];
            $time = $fakeTimes[array_rand($fakeTimes)];
            $review = $fakeReviews[array_rand($fakeReviews)];
    @endphp


    <div class="notify-box popupBox" id="popupBox-{{ $i }}" style="display: none;">
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


    <div class="modal fade" id="videoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content bg-dark">
                <div class="modal-body p-0 position-relative">
                    <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    <div class="ratio ratio-16x9">
                        <iframe id="youtubeVideo" src="" title="YouTube video" allow="autoplay; encrypted-media"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
    <script>
        $('#owl_1').owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            smartSpeed: 3000,
            slideTransition: 'linear',
            items: 3,
            autoplaySpeed: 5000,
            dots: true,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
    </script>


    <script>
        function openPopup() {
            const popup = document.getElementById('videoPopup');
            const video = document.getElementById('youtubeVideo');
            video.src = "https://www.youtube.com/embed/JIDRK9gzTO0?autoplay=1";
            popup.style.display = 'flex';
        }

        function closePopup() {
            const popup = document.getElementById('videoPopup');
            const video = document.getElementById('youtubeVideo');
            video.src = "";
            popup.style.display = 'none';
        }
    </script>


@endsection
