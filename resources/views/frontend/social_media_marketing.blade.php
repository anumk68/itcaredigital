@extends('frontend.layouts.app')
@section('title', $title)
@section('meta_description', $desc)
@section('meta_keywords', $key)
@section('content')

    <style>
        .breadcumb-area {

            background: url("{{ asset('public/frontend/assets/images/inner/breadcumb-bg.png') }}");
            padding: 230px 0 170px;
            background-repeat: no-repeat;
            background-size: contain;
            position: relative;
            margin: -77px 0px 0 -16px;
        }

        /*inner page */
        .breadcumb-area {
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
        }
    </style>

    <!--==================================================-->
    <!-- Start solutek breadcumb Area -->
    <!--==================================================-->
    <div class="breadcumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcumb-content">
                        <h1>Social Media Marketing</h1>
                        <ul class="breadcumb-list">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="list-arrow">&lt;</li>
                            <li>Services</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==================================================-->
    <!-- end solutek breadcumb Area -->
    <!--==================================================-->



    <div class="about-us-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title text-left">
                        <h5 class="section-sub-title">ITCARE DIGITAL COMPANY</h5>
                        <h2 class="section-main-title">Why Social Media Marketing is Essential for Business
                            <span>Growth.</span>
                        </h2>

                        <p class="section-title-descr">Social media marketing enables businesses to reach a large audience,
                            and it is essential for business expansion. Businesses may effectively raise their visibility,
                            interact with customers, and boost traffic by using social media platforms like Facebook,
                            Instagram, and LinkedIn.
                        </p>
                    </div>
                    <div class="about-us-content">
                        <div class="about-us-list">
                            <ul>
                                <li><span>Best IT Solutions & Service</span></li>
                                <li><span>24 Hour's Customer Service</span></li>
                            </ul>
                        </div>
                        <div class="solutek-btn">
                            <a href="{{ route('about-us') }}">About Us
                                <div class="solutek-hover-btn hover-bx"></div>
                                <div class="solutek-hover-btn hover-bx2"></div>
                                <div class="solutek-hover-btn hover-bx3"></div>
                                <div class="solutek-hover-btn hover-bx4"></div>
                            </a>
                        </div>
                        <!-- <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="single-counter-box">
                   <div class="counter-icon">
                    <img src="{{ asset('public/frontend/assets/images/inner/counter-icon.png') }}" alt="icon">
                   </div>
                   <div class="counter-content">
                    <h4 class="counter">826</h4>
                    <span>+</span>
                    <p>Satisfied Clients</p>
                   </div>
                  </div>
                 </div> -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-us-thumb">
                        <div class="about-us-img">
                            <img src="{{ asset('public/frontend/assets/images/inner/hand-holding-smartphone-social-media-concept_23-2150208260.jpg') }}"
                                alt="digital branding agency">
                        </div>
                        <!-- <div class="about-us-video-icon">
                  <a class="video-vemo-icon venobox vbox-item" data-vbtype="youtube" data-autoplay="true" href="https://www.youtube.com/watch?v=Wx48y_fOfiY"><i class="bi bi-play"></i><span>WATCH VIDEO</span></a>
                 </div> -->
                        <div class="about-us-shape">
                            <img src="{{ asset('public/frontend/assets/images/inner/us-shape.png') }}"
                                alt="social media ad management">
                        </div>
                    </div>
                </div>
            </div>
            <div class="about2-us-shape">
                <img src="{{ asset('public/frontend/assets/images/inner/about-us-sh.png') }}" alt="affordable smm packages">
            </div>
            <div class="about-us-shape2">
                <img src="{{ asset('public/frontend/assets/images/inner/about-us-she.png') }}"
                    alt="social media marketing company usa">
            </div>
        </div>
    </div>


    <!--==================================================-->
    <!-- start solutek service Area style-two-->
    <!--==================================================-->

    <div class="sservice-area style-two">
        <div class="container">
            <div class="row align-items-center d-flex align-items-stretch">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h5 class="section-sub-title">ITCARE DIGITAL COMPANY</h5>
                        <h2 class="section-main-title">Effective Social Media Marketing Services </h2>
                        <h2 class="section-main-title">for Business <span> Growth.</span></h2>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-3 d-flex">
                    <div class="single-service-box">
                        <div class="service-thumb">
                            <img src="{{ asset('public/frontend/assets/images/inner/social_1.jpg') }}"
                                alt="digital branding agency">
                        </div>
                        <!-- <div class="service-icon">
                            <img src="{{ asset('public/frontend/assets/images/inner/service-icon.png') }}"
                                alt="social media ad management">
                        </div> -->
                        <div class="service-content">
                            <h3 class="service-title"><a href="#">Social Media Strategy Development</a></h3>
                            <p class="service-text">Develop specialized tactics to improve brand awareness and interaction
                                while accomplishing corporate goals on all platforms.</p>

                            <div class="services-shape bounce-animate-3">
                                <img src="{{ asset('public/frontend/assets/images/inner/serice-shape.png') }}"
                                    alt="affordable smm packages">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-3 d-flex">
                    <div class="single-service-box">
                        <div class="service-thumb">
                            <img src="{{ asset('public/frontend/assets/images/inner/social_2.jpg') }}"
                                alt="social media marketing company usa">
                        </div>
                        <!-- <div class="service-icon">
                            <img src="{{ asset('public/frontend/assets/images/inner/service-icon.png') }}"
                                alt="digital branding agency">
                        </div> -->
                        <div class="service-content">
                            <h3 class="service-title"><a href="#"> Content Creation & Curation</a></h3>
                            <p class="service-text">Develop engaging and shareable content, including graphics, videos, and
                                blogs, tailored to your audience.</p>

                            <div class="services-shape bounce-animate-3">
                                <img src="{{ asset('public/frontend/assets/images/inner/serice-shape.png') }}"
                                    alt="social media ad management">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-3 d-flex">
                    <div class="single-service-box">
                        <div class="service-thumb">
                            <img src="{{ asset('public/frontend/assets/images/inner/social_3.jpg') }}"
                                alt="affordable smm packages">
                        </div>
                        <!-- <div class="service-icon">
                            <img src="{{ asset('public/frontend/assets/images/inner/service-icon.png') }}"
                                alt="social media marketing company usa">
                        </div> -->
                        <div class="service-content">
                            <h3 class="service-title"><a href="#">Social Media Management</a></h3>
                            <p class="service-text">Ensure continuous brand messaging and growth by supervising daily
                                posts, conversations, and community involvement.</p>

                            <div class="services-shape bounce-animate-3">
                                <img src="{{ asset('public/frontend/assets/images/inner/serice-shape.png') }}"
                                    alt="digital branding agency">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-3 d-flex">
                    <div class="single-service-box">
                        <div class="service-thumb">
                            <img src="{{ asset('public/frontend/assets/images/inner/social_4.jpg') }}"
                                alt="social media ad management">
                        </div>
                        <!-- <div class="service-icon">
                            <img src="{{ asset('public/frontend/assets/images/inner/service-icon.png') }}"
                                alt="affordable smm packages">
                        </div> -->
                        <div class="service-content">
                            <h3 class="service-title"><a href="#">Paid Social Media Advertising</a></h3>
                            <p class="service-text">Targeted advertising strategies on social media platforms like
                                Facebook, Instagram, and LinkedIn can increase reach and conversions.</p>

                            <div class="services-shape bounce-animate-3">
                                <img src="{{ asset('public/frontend/assets/images/inner/serice-shape.png') }}"
                                    alt="social media marketing company usa">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-3 d-flex">
                    <div class="single-service-box">
                        <div class="service-thumb">
                            <img src="{{ asset('public/frontend/assets/images/inner/social_5.jpg') }}"
                                alt="digital branding agency">
                        </div>
                        <!-- <div class="service-icon">
                            <img src="{{ asset('public/frontend/assets/images/inner/service-icon.png') }}"
                                alt="social media ad management">
                        </div> -->
                        <div class="service-content">
                            <h3 class="service-title"><a href="#">Influencer Marketing</a></h3>
                            <p class="service-text">Partner with influencers to promote products, build brand trust, and
                                reach wider audiences in an authentic way.</p>

                            <div class="services-shape bounce-animate-3">
                                <img src="{{ asset('public/frontend/assets/images/inner/serice-shape.png') }}"
                                    alt="affordable smm packages">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-3 d-flex">
                    <div class="single-service-box">
                        <div class="service-thumb">
                            <img src="{{ asset('public/frontend/assets/images/inner/social_6.jpg') }}"
                                alt="social media marketing company usa">
                        </div>
                        <!-- <div class="service-icon">
                            <img src="{{ asset('public/frontend/assets/images/inner/service-icon.png') }}"
                                alt="digital branding agency">
                        </div> -->
                        <div class="service-content">
                            <h3 class="service-title"><a href="#">Social Media Analytics & Reporting</a></h3>
                            <p class="service-text">Monitor and analyze social media performance to refine strategies and
                                optimize for better results.</p>

                            <div class="services-shape bounce-animate-3">
                                <img src="{{ asset('public/frontend/assets/images/inner/serice-shape.png') }}"
                                    alt="social media ad management">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-3 d-flex">
                    <div class="single-service-box">
                        <div class="service-thumb">
                            <img src="{{ asset('public/frontend/assets/images/inner/social_7.jpg') }}"
                                alt="affordable smm packages">
                        </div>
                        <!-- <div class="service-icon">
                            <img src="{{ asset('public/frontend/assets/images/inner/service-icon.png') }}"
                                alt="social media marketing company usa">
                        </div> -->
                        <div class="service-content">
                            <h3 class="service-title"><a href="#">Community Management</a></h3>
                            <p class="service-text">Manage customer interactions, respond to inquiries, and foster a loyal
                                online community around your brand.</p>

                            <div class="services-shape bounce-animate-3">
                                <img src="{{ asset('public/frontend/assets/images/inner/serice-shape.png') }}"
                                    alt="digital branding agency">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-3 d-flex">
                    <div class="single-service-box">
                        <div class="service-thumb">
                            <img src="{{ asset('public/frontend/assets/images/inner/social_8.jpg') }}"
                                alt="social media ad management">
                        </div>
                        <!-- <div class="service-icon">
                            <img src="{{ asset('public/frontend/assets/images/inner/service-icon.png') }}"
                                alt="affordable smm packages">
                        </div> -->
                        <div class="service-content">
                            <h3 class="service-title"><a href="#">Social Media Contest & Campaigns</a></h3>
                            <p class="service-text">Develop and oversee engaging campaigns or competitions to boost
                                engagement, grow your fan base, and enhance brand awareness.</p>

                            <div class="services-shape bounce-animate-3">
                                <img src="{{ asset('public/frontend/assets/images/inner/serice-shape.png') }}"
                                    alt="social media marketing company usa">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="service-shape bounce-animate3">
                <img src="{{ asset('public/frontend/assets/images/service5.png') }}" alt="digital branding agency">
            </div>
            <div class="service-shape2">
                <img src="{{ asset('public/frontend/assets/images/service7.png') }}" alt="social media ad management">
            </div>
            <div class="service-shape3 bounce-animate4">
                <img src="{{ asset('public/frontend/assets/images/service8.png') }}" alt="affordable smm packages">
            </div>
        </div>
    </div>

    <!--==================================================-->
    <!-- end solutek service Area style-two-->
    <!--==================================================-->
    
    <!-- //extra schema 10nov,25 -->
    <script type="application/ld+json">
    {{ $extra }}
    </script>
    <!-- extra schema 10nov,25 ends -->

    <!-- //faq schema 10nov,25 -->
    <script type="application/ld+json">
        {{ $faq }}
    </script>
    <!-- faq schema 10nov,25 ends -->


    <div class="faq-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="section-title text-left">
                        <h5 class="section-sub-title">ITCARE DIGITAL COMPANY</h5>
                        <h2 class="section-main-title">Frequently Asked <span> Questions.</span> </h2>
                    </div>
                    <div class="faq-thumb">
                        <img src="{{ asset('public/frontend/assets/images/faq1.png') }}"
                            alt="social media marketing company usa">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="tab_container">

                        <div id="tab1" class="tab_content">
                            <ul class="accordion">
                                <li>
                                    <a class=""><span>1. What is Social Media Marketing (SMM)?</span></a>
                                    <p style="display: none;">Social media marketing, or SMM, is the practice of promoting
                                        your brand, interacting with your audience, and increasing traffic through websites
                                        like Facebook, Instagram, and LinkedIn. It's an effective strategy for building
                                        client relationships and raising brand recognition.</p>
                                </li>
                                <li>
                                    <a><span>2. How does Social Media Marketing benefit my business?</span></a>
                                    <p>SMM increases consumer loyalty, targeted traffic, and brand visibility. Businesses
                                        may communicate with their audience directly, increase engagement, and create leads
                                        thanks to it, which eventually boosts conversions and expands their operations.</p>
                                </li>
                                <li>
                                    <a><span>3. Why should I choose IT Care Digital for Social Media Marketing?</span></a>
                                    <p>IT Care Digital offers tailored social media strategies that align with your business
                                        goals. Our expert team creates engaging content, runs targeted ads, and uses
                                        data-driven insights to ensure measurable results and ROI for your business.</p>
                                </li>
                                <li>
                                    <a><span>4. What platforms do you focus on for Social Media Marketing?</span></a>
                                    <p>We focus on the most effective platforms for your business, including Facebook,
                                        Instagram, LinkedIn, and Twitter. Our team selects the right platform based on your
                                        target audience, industry, and marketing objectives to ensure maximum impact.</p>
                                </li>
                                <li>
                                    <a><span>5. How long does it take to see results from Social Media Marketing?</span></a>
                                    <p>Although social media marketing yields a range of results, companies usually observe
                                        measurable gains within three to six months. Campaign optimization for long-term
                                        growth and lead generation, audience engagement, and strategy are all critical
                                        components of success. </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="faq-shape">
                <img src="{{ asset('public/frontend/assets/images/faq2.png') }}" alt="digital branding agency">
            </div>
            <div class="faq-shape2">
                <img src="{{ asset('public/frontend/assets/images/faq3.png') }}" alt="social media ad management">
            </div>
        </div>
    </div>






    <!--==================================================-->
    <!-- Start solutek address Area -->
    <!--==================================================-->


    <div class="address-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="address-box">
                        <div class="address-icon">
                            <img src="{{ asset('public/frontend/assets/images/address1.png') }}"
                                alt="affordable smm packages">
                        </div>
                        <div class="address-title">
                            <h3>Elevating Customer Experience.</h3>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-6 col-md-12">
                    <div class="address-box2">
                        <div class="address-icon" style="font-size: 32px;  color: #fff;">
                           <i class="fa fa-envelope"></i>
                        </div>
                        <div class="solutek-btn">
                          <a href="mailto:contact@itcaredigital.com">contact@itcaredigital.com
                                <div class="solutek-hover-btn hover-bx"></div>
                                <div class="solutek-hover-btn hover-bx2"></div>
                                <div class="solutek-hover-btn hover-bx3"></div>
                                <div class="solutek-hover-btn hover-bx4"></div>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!--==================================================-->
    <!-- end solutek address Area -->
    <!--==================================================-->


@endsection
