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
                        <h1>Digital Content Marketing</h1>
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
                        <h2 class="section-main-title">Why Digital Content Marketing is Essential for Your Brand’s
                            <span>Success.</span>
                        </h2>
                        <p class="section-title-descr">Digital content marketing plays an important role in building a
                            strong online presence and growing a business. When it comes to drawing in your target audience
                            and creating enduring relationships, IT Care Digital knows how important well-crafted content
                            is. Our valuable, interesting, and instructive material improves SEO results, builds brand
                            awareness, and fosters customer loyalty.
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
                            <a href="{{ route('about-us') }}"> About Us
                                <div class="solutek-hover-btn hover-bx"></div>
                                <div class="solutek-hover-btn hover-bx2"></div>
                                <div class="solutek-hover-btn hover-bx3"></div>
                                <div class="solutek-hover-btn hover-bx4"></div>
                            </a>
                        </div>
                        <!-- <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="single-counter-box">
                                        <div class="counter-icon">
                                            <img src="{{ asset('public/frontend/assets/images/inner/counter-icon.png') }}"
                                                alt="icon">
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
                            <img src="{{ asset('public/frontend/assets/images/inner/content-marketing-modish-online-business-ecommerce_31965-68123.jpg') }}"
                                alt="affordable content services">
                        </div>
                        <!-- <div class="about-us-video-icon">
                  <a class="video-vemo-icon venobox vbox-item" data-vbtype="youtube" data-autoplay="true" href="https://www.youtube.com/watch?v=Wx48y_fOfiY"><i class="bi bi-play"></i><span>WATCH VIDEO</span></a>
                 </div> -->
                        <div class="about-us-shape">
                            <img src="{{ asset('public/frontend/assets/images/inner/us-shape.png') }}"
                                alt="digital content experts">
                        </div>
                    </div>
                </div>
            </div>
            <div class="about2-us-shape">
                <img src="{{ asset('public/frontend/assets/images/inner/about-us-sh.png') }}" alt="seo and content writing">
            </div>
            <div class="about-us-shape2">
                <img src="{{ asset('public/frontend/assets/images/inner/about-us-she.png') }}"
                    alt="content marketing agency usa">
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
                        <h2 class="section-main-title">Digital Content Marketing <span>Services.</span> </h2>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-3 d-flex">
                    <div class="single-service-box">
                        <div class="service-thumb">
                            <img src="{{ asset('public/frontend/assets/images/inner/content_1.jpg') }}"
                                alt="affordable content services">
                        </div>
                        <!-- <div class="service-icon">
                            <img src="{{ asset('public/frontend/assets/images/inner/service-icon.png') }}"
                                alt="digital content experts">
                        </div> -->
                        <div class="service-content">
                            <h3 class="service-title"><a href="#">Content Strategy Development</a></h3>
                            <p class="service-text"> IT Care Digital creates tailored content strategies that align with
                                your brand’s goals, ensuring maximum engagement and ROI.</p>

                            <div class="services-shape bounce-animate-3">
                                <img src="{{ asset('public/frontend/assets/images/inner/serice-shape.png') }}"
                                    alt="seo and content writing">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-3 d-flex">
                    <div class="single-service-box">
                        <div class="service-thumb">
                            <img src="{{ asset('public/frontend/assets/images/inner/content_2.jpg') }}"
                                alt="content marketing agency usa">
                        </div>
                        <!-- <div class="service-icon">
                            <img src="{{ asset('public/frontend/assets/images/inner/service-icon.png') }}"
                                alt="affordable content services">
                        </div> -->
                        <div class="service-content">
                            <h3 class="service-title"><a href="#">Blog and Article <br> Writing</a></h3>
                            <p class="service-text"> Our team of expert writers produces high-quality, SEO-optimized blog
                                posts and articles to drive traffic and boost brand authority.</p>

                            <div class="services-shape bounce-animate-3">
                                <img src="{{ asset('public/frontend/assets/images/inner/serice-shape.png') }}"
                                    alt="digital content experts">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-3 d-flex">
                    <div class="single-service-box">
                        <div class="service-thumb">
                            <img src="{{ asset('public/frontend/assets/images/inner/content_3.jpg') }}"
                                alt="seo and content writing">
                        </div>
                        <!-- <div class="service-icon">
                            <img src="{{ asset('public/frontend/assets/images/inner/service-icon.png') }}"
                                alt="content marketing agency usa">
                        </div> -->
                        <div class="service-content">
                            <h3 class="service-title"><a href="#">Social Media Content Creation</a></h3>
                            <p class="service-text"> IT Care Digital designs compelling social media content that increases
                                engagement, builds community, and strengthens your online presence.</p>

                            <div class="services-shape bounce-animate-3">
                                <img src="{{ asset('public/frontend/assets/images/inner/serice-shape.png') }}"
                                    alt="affordable content services">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-3 d-flex">
                    <div class="single-service-box">
                        <div class="service-thumb">
                            <img src="{{ asset('public/frontend/assets/images/inner/content_4.jpg') }}"
                                alt="digital content experts">
                        </div>
                        <!-- <div class="service-icon">
                            <img src="{{ asset('public/frontend/assets/images/inner/service-icon.png') }}"
                                alt="seo and content writing">
                        </div> -->
                        <div class="service-content">
                            <h3 class="service-title"><a href="#">Video Content <br> Production</a></h3>
                            <p class="service-text"> We create impactful video content that communicates your brand message
                                effectively, driving audience engagement and conversions.</p>

                            <div class="services-shape bounce-animate-3">
                                <img src="{{ asset('public/frontend/assets/images/inner/serice-shape.png') }}"
                                    alt="content marketing agency usa">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-3 d-flex">
                    <div class="single-service-box">
                        <div class="service-thumb">
                            <img src="{{ asset('public/frontend/assets/images/inner/content_5.jpg') }}"
                                alt="affordable content services">
                        </div>
                        <!-- <div class="service-icon">
                            <img src="{{ asset('public/frontend/assets/images/inner/service-icon.png') }}"
                                alt="digital content experts">
                        </div> -->
                        <div class="service-content">
                            <h3 class="service-title"><a href="#">Infographic Design and Creation</a></h3>
                            <p class="service-text"> IT Care Digital crafts visually appealing infographics that simplify
                                complex information, improving content shareability and audience understanding</p>

                            <div class="services-shape bounce-animate-3">
                                <img src="{{ asset('public/frontend/assets/images/inner/serice-shape.png') }}"
                                    alt="seo and content writing">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-3 d-flex">
                    <div class="single-service-box">
                        <div class="service-thumb">
                            <img src="{{ asset('public/frontend/assets/images/inner/content_6.jpg') }}"
                                alt="content marketing agency usa">
                        </div>
                        <!-- <div class="service-icon">
                            <img src="{{ asset('public/frontend/assets/images/inner/service-icon.png') }}"
                                alt="affordable content services">
                        </div> -->
                        <div class="service-content">
                            <h3 class="service-title"><a href="#">SEO Content <br> Optimization</a></h3>
                            <p class="service-text"> Our team ensures all content is optimized for search engines, boosting
                                visibility and helping your brand rank higher in search results.</p>

                            <div class="services-shape bounce-animate-3">
                                <img src="{{ asset('public/frontend/assets/images/inner/serice-shape.png') }}"
                                    alt="digital content experts">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-3 d-flex">
                    <div class="single-service-box">
                        <div class="service-thumb">
                            <img src="{{ asset('public/frontend/assets/images/inner/content_7.jpg') }}"
                                alt="seo and content writing">
                        </div>
                        <!-- <div class="service-icon">
                            <img src="{{ asset('public/frontend/assets/images/inner/service-icon.png') }}"
                                alt="content marketing agency usa">
                        </div> -->
                        <div class="service-content">
                            <h3 class="service-title"><a href="#">Email Marketing Campaigns</a></h3>
                            <p class="service-text"> IT Care Digital designs personalized email marketing campaigns that
                                engage subscribers and drive conversions through well-crafted content.</p>

                            <div class="services-shape bounce-animate-3">
                                <img src="{{ asset('public/frontend/assets/images/inner/serice-shape.png') }}"
                                    alt="affordable content services">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-3 d-flex">
                    <div class="single-service-box">
                        <div class="service-thumb">
                            <img src="{{ asset('public/frontend/assets/images/inner/content_8.jpg') }}"
                                alt="digital content experts">
                        </div>
                        <!-- <div class="service-icon">
                            <img src="{{ asset('public/frontend/assets/images/inner/service-icon.png') }}"
                                alt="seo and content writing">
                        </div> -->
                        <div class="service-content">
                            <h3 class="service-title"><a href="#">Content Performance Analytics</a></h3>
                            <p class="service-text"> We track and analyze the performance of your content, providing
                                insights to refine strategies and improve results for sustained growth..</p>

                            <div class="services-shape bounce-animate-3">
                                <img src="{{ asset('public/frontend/assets/images/inner/serice-shape.png') }}"
                                    alt="seo and content writing">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="service-shape bounce-animate3">
                <img src="{{ asset('public/frontend/assets/images/service5.png') }}" alt="content marketing agency usa">
            </div>
            <div class="service-shape2">
                <img src="{{ asset('public/frontend/assets/images/service7.png') }}" alt="affordable content services">
            </div>
            <div class="service-shape3 bounce-animate4">
                <img src="{{ asset('public/frontend/assets/images/service8.png') }}" alt="digital content experts">
            </div>
        </div>
    </div>

    <!--==================================================-->
    <!-- end solutek service Area style-two-->
    <!--==================================================-->

    <div class="faq-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="section-title text-left">
                        <h5 class="section-sub-title">ITCARE DIGITAL COMPANY</h5>
                        <h2 class="section-main-title">Frequently Asked <span> Questions</span></h2>

                    </div>
                    <div class="faq-thumb">
                        <img src="{{ asset('public/frontend/assets/images/faq1.png') }}"
                            alt="content marketing agency usa">
                    </div>
                </div>

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


                <div class="col-lg-6 col-md-12">
                    <div class="tab_container">
                        <!-- <div class="feq-content">
                                    <h3 class="faq-title">A Comprehensive <span>Guide.</span></h3>
                                    <p class="faq-description">Alternative innovation network environmental whiteboard pursue for
                                        premier
                                        methods empowerment go forward opportunities</p>
                                </div> -->
                        <div id="tab1" class="tab_content">
                            <ul class="accordion">
                                <li>
                                    <a class=""><span>1. What is Digital Content Marketing?</span></a>
                                    <p style="display: none;">Digital content marketing is the process of producing and
                                        disseminating worthwhile, pertinent material via email, social media, blogs, and
                                        videos. Its objective is to use fun and educational content to engage your audience,
                                        increase brand recognition, and boost conversions.</p>
                                </li>
                                <li>
                                    <a><span>2. How can Digital Content Marketing benefit my business?</span></a>
                                    <p>Digital content marketing increases targeted traffic, increases online visibility,
                                        and fosters consumer trust. You build credibility in your field, raise your SEO
                                        ranks, and eventually draw in and keep devoted clients by producing high-quality
                                        content.</p>
                                </li>
                                <li>
                                    <a><span>3. Why should I choose IT Care Digital for Digital Content
                                            Marketing?</span></a>
                                    <p> IT Care Digital offers personalized content strategies that align with your business
                                        goals. Our team focuses on creating high-quality, SEO-optimized content that
                                        resonates with your audience, helping you improve engagement and achieve measurable
                                        business results.</p>
                                </li>
                                <li>
                                    <a><span>4. What types of content do you create for Digital Content
                                            Marketing?</span></a>
                                    <p>We produce a range of content formats, such as whitepapers, case studies, films,
                                        infographics, and blog entries. Every item is designed to increase brand awareness,
                                        target audience engagement, and your online presence across many platforms.</p>
                                </li>
                                <li>
                                    <a><span>5. How long does it take to see results from Digital Content
                                            Marketing?</span></a>
                                    <p> A long-term approach is digital content marketing. Significant results, including
                                        more traffic, better SEO rankings, and greater conversion rates, usually show up
                                        after 6 months of constant content production and optimization, while you might
                                        notice some initial returns in 1–3 months. </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="faq-shape">
                <img src="{{ asset('public/frontend/assets/images/faq2.png') }}" alt="affordable content services">
            </div>
            <div class="faq-shape2">
                <img src="{{ asset('public/frontend/assets/images/faq3.png') }}" alt="digital content experts">
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
                                alt="custom seo and web design">
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
                          <a href="mailto:contact@itcaredigital.com" >contact@itcaredigital.com
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
