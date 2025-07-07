@extends("layouts.app")

@php
$page_url = url()->current();
$explode_url = explode('com', $page_url);
@endphp



@section("content")

<!-- Breadcrumb Area -->

<section class="banner-section" style="background: linear-gradient(rgb(31 191 255 / 52%), rgb(31 191 255 / 52%)), url(image/about_bannner.png);">
   
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="contant_contact">
        <h1>Latest Blogs</h1>
      </div>
    </div>
  </div>
</section>


<section class="latest-blog-area py_8">
    <div class="container">
        <div class="colls_pans">
            <div class="sec-title-two pull-left">
                <h2>All Printer Setup - Latest Blogs Update</h2>
            </div>
            <div class="button pull-right">
                <a href="javascript:void(0)">Read More News<i class="fa fa-caret-right" aria-hidden="true"></i></a>
            </div>
        </div>
        
        @foreach($blogs->chunk(3) as $chunk)
            <div class="row">
                @foreach($chunk as $blog)
                    <div class="col-md-4 mb-3">
                        <div class="single-latest-blog11">
                            <div class="img-holder">
                            <a href="{{ route('blog.blog_details', $blog->slug) }}">
                                <img src="{{ asset('public/'.$blog->banner) }}" alt="{{ $blog->banner_alt }}">
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
                                    <li><i class="fa fa-clock-o" aria-hidden="true"></i><a href="#">{{ $blog->created_at->format('M d, Y') }}</a></li>
                                </ul>
                                <a href="{{ route('blog.blog_details', $blog->slug) }}">
                                    <h3 class="blog-title">{{ Str::words($blog->title ?? '', 8, '...') }}</h3>
                                </a>
                                <p class="blog-sort-desc">{{ Str::limit($blog->meta_description ?? '', 125, '...') }}</p>
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


<!-- Latest Blog Section -->
<!-- <section class="latest-blog-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="sec-title-two pull-left">
                    <h2>All Printer Setup - Latest Blogs Update</h2>
                </div>
                <div class="button pull-right">
                    <a href="javascript:void(0)">Read More News<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    @foreach($blogs as $blog)
                
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="single-latest-blog11">
                            <div class="img-holder">
                                <img src="{{ asset('public/'.$blog->banner) }}" alt="{{ $blog->title }}">
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
                                    <li><i class="fa fa-clock-o" aria-hidden="true"></i><a href="#">{{
                                            $blog->created_at->format('M d, Y') }}</a></li>
                                </ul>
                                <a href="{{ route('blog.blog_details', $blog->slug) }}">
                                    <h3 class="blog-title">{{ $blog->title }}</h3>
                                </a>

                                <p>{{ substr($blog->meta_description,0,140) }}...</p>

                                <a style="padding:9px; border:2px solid #337ab7;" class="blog_btn"
                                    href="{{ route('blog.blog_details', $blog->slug) }}">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

 

            </div>
        </div>



         <div class="row">
           
        </div> -->
    <!-- </div>
</section>  -->


@endsection