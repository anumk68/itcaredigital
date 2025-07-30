@extends('layouts.app') 
@section('title', 'Contact')
@section('meta-description', 'Your meta description here') 
@section('content')
<section class="banner-section_contact" style="background: linear-gradient(rgb(31 191 255 / 86%), rgb(31 191 255 / 74%)), url(public/images/about_bannner.png)">
   
  <div class="container">
 <div class="heading_contact">
  <h1>Get Support</h1>
 </div>
     <div class="row align-items-center">
          <div class="col-md-6">
                    <h3>Get Expert Support – Contact Our Printer Setup Specialists Today</h3>
                    <p>No matter what time of the day it is, if you’re facing any kind of technical printer issue, we’re always just a call away to help you.</p>
                   <div class="btn_about_us_contact">
                            <a href="{{ route('members') }}" class="btn">See Membership</a>
                        </div>
                </div>
                     <div class="col-md-6">
                    <img src="{{ asset('public/images/technical_contact.png') }}" alt="">
                </div>
            </div>
  </div>
</section>

 <section class="form_map py_8 pt-0">
  <div class="container">
    <div class="row align-items-center g-5">
      <!-- Left Content -->
       <div class="col-md-6">
                    <div class="virtual-assist-box">
                        <h6>Our Experts are available for</h6>
                        <h3>Virtual Assistance (24/7)</h3>
                        <img src="{{ asset('public/images/calling.png') }}" alt="Virtual Assistant Icon">
                        <br>
                        <a href="{{route('virtual_chat')}}" class="btn btn-custom mt-3">Get in Touch</a>
                    </div>
       </div>
      <div class="col-lg-6">
                 <div class="form-container">
           @include('partials.common-form', [
                        'brands' => $brands,
                        'serviceSlug' => $service->slug ?? '',
                        'prefix' => 'service6',
                    ])
        </div>
      </div>  
    </div>
  </div>


</section> 

  <section class="section_issue pt-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="{{ asset('public/images/technial-image.png') }}" alt="">
                </div>
                <div class="col-md-6">
                    <h3>Get Your Issues Fixed Anytime of the Day</h3>
                    <p>No matter what time of the day it is, if you’re facing any kind of technical issue, we’re always just a call away to help you.</p>
                   <div class="btn_about_us">
                            <a href="{{ route('members') }}" class="btn">See Membership</a>
                        </div>
                </div>
            </div>
        </div>
    </section>


<section class="contact-section PY_8 PT-0 text-center">
  <div class="container">
    <div class="sec-title-two mb-3">
                        <h2>Quick Links</h2>
                
                    </div>
    <div class="row justify-content-center">
      <!-- Email Us -->
      <div class="col-md-6 mb-4 mb-md-0">
        <div class="contact-box">
          <div class="contact-icon mb-3">
         <i class="fa-solid fa-envelope"></i>
          </div>
          <h4 class="contact-title">Email Us</h4>
          <p>Email us for any assistance or inquiry.</p>
          <p><strong><a href="mailto:contact@allprintersetup.com">contact@allprintersetup.com</a></strong></p>
        </div>
      </div>

      <!-- Call Us -->
      <div class="col-md-6 mb-4 mb-md-0">
        <div class="contact-box">
          <div class="contact-icon mb-3">
        <i class="fa-solid fa-phone"></i>
          </div>
          <h4 class="contact-title">Call Us</h4>
          <p>Call us for any assistance or inquiry.</p>
          <p> <strong><a href="tel:+1 8887684674">+1 8887684674</a></strong></p>
        </div>
      </div>

      <!-- Visit Us -->
      <!-- <div class="col-md-4">
        <div class="contact-box">
          <div class="contact-icon mb-3">
            <img src="https://img.icons8.com/ios-filled/50/4a5b39/marker.png" alt="Location Icon">
          </div>
          <h4 class="contact-title">Visit Us</h4>
          <p>Visit us at our location for any inquiry.</p>
          <p><strong>1311 Park St Alameda, CA 94501<br></strong></p>
        </div>
      </div> -->
    </div>
  </div>
</section>
@endsection

