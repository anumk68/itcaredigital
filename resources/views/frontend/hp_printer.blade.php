@extends('layouts.app')
@section('head')
    <meta name="robots" content="noindex, nofollow">
@endsection
@section('content')
    @php
    $bannerImage = $brand->banner_image 
        ? asset('storage/app/public/' . $brand->banner_image) 
        : asset('public/images/about_bannner.png');
@endphp

<section class="banner-section"
    style="background: linear-gradient(rgb(31 191 255 / 52%), rgb(31 191 255 / 52%)), url('{{ $bannerImage }}');">


        <div class="container">
            <div class="row align-items-center g-5">
                <!-- Left Content -->
                <div class="col-lg-6">
                    <div class="banner_content">
                        <!--<h1 class="display-5 fw-bold">{{ $brand->brand_name }}</h1>-->
                        <p class="mt-3">
                         {!! $brand->description !!}
                        </p>

                    </div>
                </div>

                <!-- Right Form -->
                <div class="col-lg-6">
                  
                        <div class="form-container">
                            @include('partials.common-form', [
                                'brands' => $brands,
                                'serviceSlug' => $service->slug ?? '',
                                'prefix' => 'service3',
                            ])
                        </div>

                   
                </div>
            </div>
        </div>
    </section>


    <section class="select_brand_issue">
        <div class="container my-5">
            <h2 class="text-center mb-4 title">Select the Type of Printer Issue</h2>
            <div class="row g-4">
                @foreach ($brand->services as $service)
                    <div class="col-md-3">
                    <a
                                href="{{ route('service_detail', ['brand_slug' => $brand->slug, 'service_slug' => $service->slug]) }}">
                        <div class="issue-box">
                            <img src="{{ asset('storage/app/public/' . $service->icon) }}" alt="{{ $service->name }}">
                            
                               <a href="#" class="services_main_under"> {{ $service->service_name }}</a>
                          
                        </div>
                          </a>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <section class="why_choose_us py_8">
        <div class="container">
            <div class="row align-items-center">

                <!-- Right Column (Content) -->
                <div class="col-md-6 mb-3">
                    <div class="content-box">
                        <!--<h2 class="section-heading">Printer Issue</h2>-->
                        <p class="section-content">
                          {!!$brand->seo_content ?? 'We provide comprehensive solutions for all your printer issues, ensuring smooth and efficient printing experiences. Our expert team is dedicated to resolving any problems you may encounter with your printer, from setup and installation to troubleshooting and maintenance.'!!}
                        </p>
                       
                    </div>
                </div>

                <!-- Left Column (Video) -->
                <div class="col-md-6 mb-3">
                    <div class="img_about">
                    <img src="{{ asset('storage/app/public/' . $brand->additional_image) }}" alt="{{ $brand->additional_image }}">
                       
                    </div>
                </div>
            </div>
        </div>
    </section>

 <section class="blog-section py_8">
        <div class="container">
            <h2 class="section-title">Latest {{ ucwords(str_replace('-', ' ', $brand_slug)) }} Printer Blogs And Drivers</h2>
            <p class="section-subtitle">Stay updated with the latest HP printer blogs, driver downloads and expert tips to keep your device running smoothly</p>

            @foreach ($blogs->chunk(3) as $chunk)
                <div class="row">
                    @foreach ($chunk as $blog)
                        <div class="col-md-4 mb-3">
                            <div class="single-latest-blog11">
                                <div class="img-holder">
                                    <a href="{{ route('blog.blog_details', $blog->slug) }}">
                                        <img src="{{ asset('public/' . $blog->banner) }}" alt="{{ $blog->banner_alt }}">
                                    </a>
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
                                        <h3 class="blog-title">{{ Str::words($blog->title ?? '', 8, '...') }}</h3>
                                    </a>
                                    <p class="blog-sort-desc">{{ Str::limit($blog->meta_description ?? '', 125, '...') }}
                                    </p>
                                    <a class="btn" href="{{ route('blog.blog_details', $blog->slug) }}">
                                        Read More
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach

        </div>
    </section>

    <section class="testimonials py_8">
         <div class="container">
            <h2 class="title">What Our Clients Say</h2>
            <p class="subtitle">Real Experiences, Real Satisfaction — Hear Directly from Our Happy Customers!</p>

            <div class="owl-carousel testimonial-slider">
                <!-- Testimonial 1 -->
                <div class="testimonial-box">
                    <img src="{{asset('public/images/testimonial_1.jpg')}}" alt="John Davidson" class="profile">
                    <h3> Sarah M., Chicago, IL</h3>
                    <div class="stars">★★★★★</div>
                    <p>“I had constant printer spooler problems with my HP printer, and All Printer Setup sorted it out instantly. Their support staff was extremely friendly and online late at night when I desperately needed assistance.last line - I highly recommend All Printer Setup.
                    </p>
                </div>

                <!-- Testimonial 2 -->
                <div class="testimonial-box">
                    <img src="{{asset('public/images/testimonial_2.jpg')}}" alt="Robert McCauley" class="profile">
                    <h3>Daniel R., Dallas, TX</h3>
                    <div class="stars">★★★★★</div>
                    <p>“My Canon printer repeatedly disconnects from Wi-Fi. I rang All Printer Setup and received immediate assistance. They guided me through the repair step by step — top-notch printer connectivity service and fantastic service in general.”</p>
                </div>

                <!-- Testimonial 3 -->
                <div class="testimonial-box">
                    <img src="{{asset('public/images/testimonial_3.jpg')}}" alt="Elizabeth" class="profile">
                    <h3>Melissa T., San Diego, CA</h3>
                    <div class="stars">★★★★★</div>
                    <p>“Our office Epson printer needed regular maintenance, and these guys made it hassle-free. Their printer maintenance service is smooth, fast, and affordable. We'll keep using All Printer Setup for all our printer support services.”</p>
                </div>
            </div>
        </div>
    </section>

    <section class="appoinment-area py_8 pb-0">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="products">
                        <div class="main_print_form">
                            
                             <img class="lazyload" src="{{ asset('public/images/about/fill_out_form_img.webp') }}" alt="printing_form"> 
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="form-container">
                            @include('partials.common-form', [
                                'brands' => $brands,
                                'serviceSlug' => $service->slug ?? '',
                                'prefix' => 'service8',
                            ])
                        </div>
                </div>
            </div>
        </div>
    </section>
     <section class="faq-container py_8 pt-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-3">
                    <div class="faq_images">
                        <img src="{{ asset('public/images/Customer_support.jpg') }}" alt="FAQ Image">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="faq-content">
                        <h2>Frequently Asked Questions</h2>

                        @if ($faqs->count())
                            @foreach ($faqs as $faq)
                                <div class="faq-item">
                                    <div class="faq-question" onclick="toggleFAQ(this)">
                                        <span>{{ $faq->question }}</span>
                                        <span class="icon">+</span>
                                    </div>
                                    <div class="faq-answer">
                                        <p>{{ $faq->answer }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>No FAQs found for this service.</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
