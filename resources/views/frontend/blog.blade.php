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
                        <h1>Blog </h1>
                        <ul class="breadcumb-list">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="list-arrow">&lt;</li>
                            <li>Blog </li>
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
    <!-- Start solutek blog Area style-grid-->
    <!--==================================================-->

    <div class="blog-area style-grid">
        <div class="container">
            <div class="row d-flex align-items-stretch">
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6 d-flex">
                        <div class="single-blog-box">
                            <div class="single-blog-thumb">
                                <img src="{{ asset('public/' .$blog->banner) }}" alt="thumb">
                            </div>
                            <div class="blog-box-content">
                                <div class="meta-blog">
                                    <a href="{{ route('blog-detail', $blog->slug) }}"><span><i class="far fa-user"></i>By
                                            wotech</span></a>
                                    <p><span><img src="{{ asset('public/frontend/assets/images/inner/grid-calen.png') }}"
                                                alt="icon"></span>January 5, 2024</p>
                                </div>
                                <h3><a href="{{ route('blog-detail', $blog->slug) }}">{{$blog->title}}
                                    </a></h3>
                                <div class="blog-button">
                                    <a href="{{ route('blog-detail', $blog->slug) }}">REAM MORE<i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col-lg-4 col-md-6">
				<div class="single-blog-box">
					<div class="single-blog-thumb">
						<img src="{{ asset('public/frontend/assets/images/inner/blog-grid2.png')}}" alt="thumb">
					</div>
					<div class="blog-box-content">
					   <div class="meta-blog">
						  <a href="{{route('blog-detail')}}"><span><i class="far fa-user"></i>By wotech</span></a>
						  <p><span><img src="{{ asset('public/frontend/assets/images/inner/grid-calen.png')}}" alt="icon"></span>January 5, 2024</p>
						</div>
						<h3><a href="{{route('blog-detail')}}">Simplify Streamline Succeed
							IT Solutions
						</a></h3>
						<div class="blog-button">
							<a href="{{route('blog-detail')}}">REAM MORE<i class="bi bi-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div> --}}
                {{-- <div class="col-lg-4 col-md-6">
				<div class="single-blog-box">
					<div class="single-blog-thumb">
						<img src="{{ asset('public/frontend/assets/images/inner/blog-grid3.png')}}" alt="thumb">
					</div>
					<div class="blog-box-content">
					   <div class="meta-blog">
						  <a href="{{route('blog-detail')}}"><span><i class="far fa-user"></i>By wotech</span></a>
						  <p><span><img src="{{ asset('public/frontend/assets/images/inner/grid-calen.png')}}" alt="icon"></span>January 5, 2024</p>
						</div>
						<h3><a href="{{route('blog-detail')}}">Unlocking Potential Through
							Technology
						</a></h3>
						<div class="blog-button">
							<a href="{{route('blog-detail')}}">REAM MORE<i class="bi bi-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div> --}}
                {{-- <div class="col-lg-4 col-md-6">
				<div class="single-blog-box">
					<div class="single-blog-thumb">
						<img src="{{ asset('public/frontend/assets/images/inner/blog-grid4.png')}}" alt="thumb">
					</div>
					<div class="blog-box-content">
					   <div class="meta-blog">
						  <a href="{{route('blog-detail')}}"><span><i class="far fa-user"></i>By wotech</span></a>
						  <p><span><img src="{{ asset('public/frontend/assets/images/inner/grid-calen.png')}}" alt="icon"></span>January 5, 2024</p>
						</div>
						<h3><a href="{{route('blog-detail')}}">Balancing AI Innovation with
							Ethical Standards
						</a></h3>
						<div class="blog-button">
							<a href="{{route('blog-detail')}}">REAM MORE<i class="bi bi-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div> --}}
                {{-- <div class="col-lg-4 col-md-6">
				<div class="single-blog-box">
					<div class="single-blog-thumb">
						<img src="{{ asset('public/frontend/assets/images/inner/blog-grid5.png')}}" alt="thumb">
					</div>
					<div class="blog-box-content">
					   <div class="meta-blog">
						  <a href="{{route('blog-detail')}}"><span><i class="far fa-user"></i>By wotech</span></a>
						  <p><span><img src="{{ asset('public/frontend/assets/images/inner/grid-calen.png')}}" alt="icon"></span>January 5, 2024</p>
						</div>
						<h3><a href="{{route('blog-detail')}}">UX/UI Designing the Future
							Web Design
						</a></h3>
						<div class="blog-button">
							<a href="{{route('blog-detail')}}">REAM MORE<i class="bi bi-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div> --}}
                {{-- <div class="col-lg-4 col-md-6">
				<div class="single-blog-box">
					<div class="single-blog-thumb">
						<img src="{{ asset('public/frontend/assets/images/inner/blog-grid6.png')}}" alt="thumb">
					</div>
					<div class="blog-box-content">
					   <div class="meta-blog">
						  <a href="{{route('blog-detail')}}"><span><i class="far fa-user"></i>By wotech</span></a>
						  <p><span><img src="{{ asset('public/frontend/assets/images/inner/grid-calen.png')}}" alt="icon"></span>January 5, 2024</p>
						</div>
						<h3><a href="{{route('blog-detail')}}">Your Business Safe & Ensure
							High Handiness
						</a></h3>
						<div class="blog-button">
							<a href="{{route('blog-detail')}}">REAM MORE<i class="bi bi-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div> --}}
            </div>
        </div>
    </div>

    <!--==================================================-->
    <!-- end solutek blog Area style-grid-->
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
