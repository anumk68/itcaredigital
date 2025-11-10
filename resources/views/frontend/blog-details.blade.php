@extends('frontend.layouts.app')

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
                        <h1>Blog Details</h1>
                        <ul class="breadcumb-list">
                            <li><a href="#">Home</a></li>
                            <li class="list-arrow">&lt;</li>
                            <li>Blog Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==================================================-->
    <!-- end solutek breadcumb Area -->
    <!--==================================================-->







    <!--==================================================-->
    <!-- Start solutek blog details-->
    <!--==================================================-->

    <div class="blog-details-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="blog-details-thumb">
                                <img src="{{ asset('public/' . $blog->banner) }}" alt="thumb">
                            </div>
                            <div class="blog-details-content">
                                <div class="meta-blog">
                                    <span class="mate-text">By Author</span>
                                    <span><i class="fas fa-calendar-alt"></i>05 January, 2024</span>
                                    <span><img src="{{ asset('public/frontend/assets/images/inner/category-icon.png') }}"
                                            alt="">IT Solutions</span>
                                </div>
                                <h4 class="blog-details-title">{{ $blog->title }}</h4>
                                <p class="blog-details-desc two">{!! $blog->description !!}</p>


                             
                            </div>
                           

                        </div>

                    </div>
                </div>
               
            </div>
        </div>
    </div>

    <!--==================================================-->
    <!-- end solutek blog  details Area-->
    <!--==================================================-->






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
