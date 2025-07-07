@extends('layouts.front.app')

@section('title', $metatitle)
@section('description', $metaDescription)

@section('content')



    <div id="popup-search-box">
        <div class="box-inner-wrap d-flex align-items-center">
            <form id="form" action="#" method="get" role="search">
                <input id="popup-search" type="text" name="s" placeholder="Type keywords here...">
                <button id="popup-search-button" type="submit" name="submit">
                    <i class="las la-search"></i>
                </button>
            </form>
            <div class="search-close"><i class="las la-times"></i></div>
        </div>
    </div>

    <section class="page-header" style="background-image: url(front_assets/img/contact_banner.png);">
        <div class="page-header-shape"></div>
        <div class="container">
            <div class="page-header-info">
                <h4>Contact Us</h4>
                <h1>Find the Perfect Solution for Your <br> <span>Business </span></h1>
                <p>Lift your business to new heights with our digital marketing services.<br> The magic of marketing, the
                    science of sales.</p>
            </div>
        </div>
    </section>











    @endsection