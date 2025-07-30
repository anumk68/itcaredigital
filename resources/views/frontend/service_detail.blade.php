@extends('layouts.app')

@php
    $metaTitle = $service->meta_title ?? $service->name;
    $metaDescription = $service->meta_description ?? 'Learn more about our services.';
    $metaKeywords = $service->meta_keyword ?? 'default, service, keywords';
@endphp

@section('content')
    <section class="banner_about py_8"
        style="
        background: linear-gradient(
            rgba(31, 191, 255, 0.52),
            rgba(31, 191, 255, 0.52)
        ),
        url('{{ asset('storage/app/public/' . $service->banner_image) }}');
        background-size: cover;
        background-position: center;
    ">
        <div class="container">

            <div class="row align-items-center">

                <!-- Left Column -->
                <div class="col-md-5">
                    <div class="virtual-assist-box">
                        <h6>Our Experts are available for</h6>
                        <h3>Virtual Assistance (24/7)</h3>
                        <img src="{{ asset('public/images/calling.png') }}" alt="Virtual Assistant Icon">
                        <br>
                        <a href="{{route('virtual_chat')}}" class="btn btn-custom mt-3">Get in Touch</a>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-md-7">
                    <div class="services_banner_form_clickable">
                        <div class="container">
                            <div class="wizard-box">
                                <!-- Step 1 -->
                                <div class="step active" id="step1">
                                    <h4>Select Your Printer Series</h4>
                                    <div class="d-flex flex-wrap justify-content-center">
                                        @forelse ($seriesList as $series)

                                            <button class="btn-option " onclick="selectOption(this, 'printerSeries')">
                                                {{ $series }}
                                            </button>
                                        @empty
                                            <p>No printer series available for this brand.</p>
                                        @endforelse
                                    </div>

                                    <div class="text-center">
                                        <button class="nav-btn" onclick="nextStep()">Next</button>
                                    </div>
                                </div>

                                <!-- Step 2 -->
                                <div class="step" id="step2">
                                    <h4>Select the option that fits your problem best</h4>
                                    <div class="d-flex flex-wrap justify-content-center">
                                       @foreach ($brandServices as $brandService)
            <button class="btn-option {{ $brandService->id == $service->id ? 'active' : '' }}"
                onclick="selectOption(this, 'problem')">
                {{ $brandService->service_name }}
            </button>
        @endforeach


                                    </div>
                                    <div class="text-center">
                                        <button class="nav-btn" onclick="prevStep()">Previous</button>
                                        <button class="nav-btn" onclick="nextStep()">Next</button>
                                    </div>
                                </div>

                                <!-- Step 3 -->
                                <div class="step" id="step3">
                                    <h4>Choose your Operating System</h4>
                                    <div class="d-flex justify-content-center flex-wrap">
                                        <button class="btn-option" onclick="selectOption(this, 'os')">Windows</button>
                                        <button class="btn-option" onclick="selectOption(this, 'os')">Macbook</button>
                                        <button class="btn-option" onclick="selectOption(this, 'os')">Chromebook</button>
                                    </div>
                                    <div class="text-center">
                                        <button class="nav-btn" onclick="prevStep()">Previous</button>
                                        <button class="nav-btn" onclick="nextStep()">Next</button>
                                    </div>
                                </div>

                                <!-- Step 4 -->
                                <div class="step" id="step4">

                                    <div class="form-container">
                                        @include('partials.printer-form', [
                                            'brands' => $brands,
                                            'serviceSlug' => $service->slug ?? '',
                                        ])

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="image_banner_boottm py_8">
        <div class="container">
            <div class="single_image">
         <img src="{{ asset('public/images/new_all_printersetup_ai_file_17july.jpg' ) }}"
                     alt="{{ $service->service_name }}" class="img-fluid mb-3">
                           
            </div>
        </div>

    </section>

    <section class="bloging_content">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="bloging_main_under">
                        <!--<div class="img_bloging">-->
                        <!--    @if ($service->banner_image)-->
                        <!--        <img src="{{ asset('storage/app/public/' . $service->banner_image) }}"-->
                        <!--            alt="{{ $service->service_name }}" class="img-fluid mb-3">-->
                        <!--    @endif-->
                        <!--</div>-->
                        <div class="contant_under_bloging">
                            <p>{!! $service->description !!}</p>

                        </div>

                    </div>
   <div class="support-box text-center"
                            style="background: url('image/bloging_bg_buttons.png')">
                            <div class="fleX_blogging">
                              <div class="btn_header_callnow text-center">
                                        <a href="tel:8888752997" class="btn w-100">Call Now</a>
                                    </div>
                               <div class="btn_header_callnow text-center">
                                        <a href="javascript:void(0);" onclick="parent.LiveChatWidget.call('maximize')" class="btn w-100">Live Chat</a>
                                    </div>

                                       <div class="btn_header_callnow text-center">
                                        <a href="javascript:void(0);" onclick="openIframeModal('{{ route('iframe_index') }}');" class="btn w-100">Download Drivers</a>
                                        </div>
                            </div>
                            <!-- <div class="fleX_blogging">
                                <div class="btn_header_callnow text-center">
                                        <a href="{{ route('virtual_chat') }}" class="btn w-100">Virtual Assistance</a>
                                    </div>
                              <div class="btn_header_callnow text-center">
                                        <a href="javascript:void(0);" onclick="openIframeModal('{{ route('iframe_index') }}');" class="btn w-100">Download Drivers</a>
                                        </div>
                            </div> -->
                        </div>
                </div>
                <div class="col-md-5">
                    <div class="right_sticky_bloging">
                        <div class="social_icon_main">
                            <div class="follow_us">
                                <a href="https://www.youtube.com/@allprintersetup"><i class="fa-brands fa-youtube"></i></a>
                               <a href="https://x.com/allprintersetup"> <i class="fa-solid fa-x"></i></a>
                             <a href="https://www.facebook.com/allprintersetupusa/">   <i class="fa-brands fa-facebook"></i></a>
                               <a href="https://www.instagram.com/allprintersetupusa/"> <i class="fa-brands fa-instagram"></i></a>
                            </div>
                        </div>

                        <div class="bloging_form">
                            <div class="form-container">
                               @include('partials.common-form', [
                        'brands' => $brands,
                        'serviceSlug' => $service->slug ?? '',
                        'prefix' => 'service4',
                    ])
                            </div>
                        </div>



                    <!-- //iframe -->
                    <div id="iframeModal" style="display:none; position: fixed; top: 0; left: 0; width: 100%; height: 100%;
                        background-color: rgba(0, 0, 0, 0.7); z-index: 9999; justify-content: center; align-items: center;">
                        <div style="position: relative; width: 90%; max-width: 400px; height: 80%; background: #fff; border-radius: 10px; overflow: hidden;">
                            <button onclick="closeIframeModal()" style="position: absolute; top: 10px; right: 10px; z-index: 10000; background: #ff5a5a; color: white; border: none; padding: 5px 10px; border-radius: 4px; cursor: pointer;">X</button>
                            <iframe id="driversIframe" src="" style="width: 95%; height: 98%; border: none;margin-top:5%;justify-content:center;"></iframe>
                        </div>
                    </div>

                    @if(request()->isMethod('post'))
                        @php
                            $name  = request('name');
                            $email = request('email');
                            $phone = request('phone');
                            $model = request('model');
                            $feedback = request('feedback');

                            $to = 'manpreet.digirush@gmail.com';
                            $subject = 'New enquiry submitted';

                            $message = "New Inquiry Details:\n\n";
                            $message .= "Name: $name\n";
                            $message .= "Phone Number: $phone\n";
                            $message .= "Model Number: $model\n";
                            $message .= "Email: $email\n";
                            $message .= "Feedback: $feedback\n";

                            $headers = "From: contact@getsupportguide.com\r\n";
                            $headers .= "Reply-To: contact@getsupportguide.com\r\n";
                            $headers .= "X-Mailer: PHP/" . phpversion();

                            mail($to, $subject, $message, $headers);

                            echo json_encode(['status' => 'sent']);
                            exit;
                        @endphp
                    @endif



                        <section class="reviews">
                            <h2>Client Review's</h2>
                            <div class="owl-carousel review-carousel">
                                <div class="review-card">
                                    <div class="review-header">
                                         <img src="{{asset('public/images/testimonial_1.jpg')}}" alt="John Davidson" class="profile">
                                        <div class="review-info">
                                            <h4>Sarah M., Chicago, IL</h4>
                                            <div class="stars">★★★★★</div>
                                        </div>

                                    </div>
                                    <p class="review-text">
                                       I had constant printer spooler problems with my HP printer, and All Printer Setup sorted it out instantly. Their support staff was extremely friendly and online late at night when I desperately needed assistance.last line - I highly recommend All Printer Setup.
                                    </p>
                                </div>
                                       <div class="review-card">
                                    <div class="review-header">
                                        <img src="{{asset('public/images/testimonial_2.jpg')}}" alt="Robert McCauley" class="profile">
                                        <div class="review-info">
                                            <h4>Daniel R., Dallas, TX</h4>
                                            <div class="stars">★★★★★</div>
                                        </div>

                                    </div>
                                    <p class="review-text">
                                       “My Canon printer repeatedly disconnects from Wi-Fi. I rang All Printer Setup and received immediate assistance. They guided me through the repair step by step — top-notch printer connectivity service and fantastic service in general.”
                                    </p>
                                </div>
                                       <div class="review-card">
                                    <div class="review-header">
                                        <img src="{{asset('public/images/testimonial_3.jpg')}}" alt="Elizabeth" class="profile">
                                        <div class="review-info">
                                            <h4>Melissa T., San Diego, CA</h4>
                                            <div class="stars">★★★★★</div>
                                        </div>

                                    </div>
                                    <p class="review-text">
                                    “Our office Epson printer needed regular maintenance, and these guys made it hassle-free. Their printer maintenance service is smooth, fast, and affordable. We'll keep using All Printer Setup for all our printer support services.”
                                    </p>
                                </div>
                                <!-- Add more .review-card items as needed -->
                            </div>
                        </section>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-section py_8">
        <div class="container">
            <h2 class="section-title">Latest Blogs And Drivers</h2>
            <p class="section-subtitle">Effortless Printing, Every Time: Learn How Our Latest Drivers Make Your Life Easier
                in Our Informative Blogs.</p>

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
                                        <h3 class="blog-title">{{ Str::words($blog->title ?? '', 6, '...') }}</h3>
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
    <section class="faq-container py_8 pt-0">
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
