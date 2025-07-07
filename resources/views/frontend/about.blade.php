@extends('layouts.app')
@section('content')

@if (session('success'))
    <script>
        Swal.fire({
            title: 'Success!',
            text: '{{ session('success')}}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
@endif
<section class="banner-section" style="background: linear-gradient(rgb(31 191 255 / 52%), rgb(31 191 255 / 52%)), url(public/images/about_bannner.png);">
   
  <div class="container">
    <div class="row align-items-center g-5">
      <!-- Left Content -->
      <div class="col-lg-6">
  <div class="banner_content">
          <h1 class="display-5 fw-bold">About Us</h1>
        <p class="mt-3">
         All Printer Setup is your go-to expert for stress-free online Printer maintenance and support. We assist you in handling everything from paper jams and driver installation to network connectivity problems—swiftly and effectively. Our professional team keeps your Printer working optimally with effective solutions designed especially for your device and configuration. Whether it's any brand or model, we're here to make your printing experience easier and maintain your productivity.
        </p>
  
  </div>
      </div>

      <!-- Right Form -->
      <div class="col-lg-6">
                    <div class="form-container">
           @include('partials.common-form', [
                        'brands' => $brands,
                        'serviceSlug' => $service->slug ?? '',
                        'prefix' => 'service5',
                    ])
        </div>
        
      </div>  
    </div>
  </div>
</section>
<section class="video-gallery-area py_8">
    <div class="container">
        <div class="row">
            <div class="content_under_way">
                <div class="text-holder">
                    <div class="flex_print_up">
                        <div class="about_heaing_prinn">
                            <h2>About All Printer Setup</h2>
                        </div>
                        <div class="img_logo_neewww">
                            <img src="{{ asset('public/images/resources/Printer(2).png') }}" alt="printer_logo">
                        </div>
                    </div>
                    <div class="top-text">
                        <p>Welcome to ALL PRINTER SETUP, here at all Printer Setup we are available to help set up your
                            printer for your operating system, in any part of the USA. Our specialization is in
                            full-service support for most printers such as HP printers, Hewlett Packard printers, Epson
                            printers, Canon printers, Brother printers, and all types of printers. If you require HP
                            printer support, Hewlett Packard printers support, Epson business support, Brother printer
                            support, Canon printer help and support, our skilled staff will assist with the installation
                            and troubleshooting of your printer.</p>
                    </div>
                    <div class="bottom-text">
                        <p>Since All Printer Setup is our company, we appreciate the need to provide adequate support.
                            That is why we have such services as HP printer support, Hewlett Packard printers support,
                            Epson business support, Brother printer support, Canon printer help and support. It means
                            our support involves the supply of the most essential information like the HP printer
                            support number, Hewlett Packard printer support phone number, and the Brother printer
                            customer support number. In case you need to seek an HP printer phone number, Epson printer
                            number, or Brother printer online support assistance, we are here to assist you.</p>
                    </div>
                    <div class="bottom-text">
                        <p>Our services also consist of procedure guides for installations such as how to install an HP
                            DeskJet 2700 printer, how to install Canon printer, or install settings for a Ricoh MP
                            3004ex printer. We make it possible for you to download and install HP printers or Canon
                            printers online or else, help you to answer questions like: how to install a printer on Mac,
                            how to install printers or how to install printer drivers and so on.</p>
                            <div class="btn_about_sec">
                            <a href="{{ route('contact') }}" class="btn">Get Support</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="core-value-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 content pull-right">
                <div class="text-holder">
                    <div class="sec-title-two">
                        <h2>Our Mission, Vision and Values</h2>
                        <span class="border"></span>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="single-item">
                                <div class="icon-box">
                                    <img src="{{ asset('public/images/resources/mission_ico.png') }}" alt="mission_icon">
                                </div>
                                <div class="text-box">
                                    <h3>Mission</h3>
                                    <p>Our mission is to simplify the printer setup and installation process by offering
                                        expert guidance and support for a wide range of printer brands, including HP,
                                        Epson, Canon, Brother, and more. We are dedicated to providing prompt and
                                        efficient services that meet the diverse needs of our customers, ensuring their
                                        printers are always ready to perform.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="single-item">
                                <div class="icon-box">
                                    <img src="{{ asset('public/images/resources/vision_ico.png') }}" alt="vision_icon">
                                </div>
                                <div class="text-box">
                                    <h3>Vision</h3>
                                    <p>To be the leading provider of reliable and accessible printer setup and support
                                        services across the USA, ensuring seamless printing experiences for businesses
                                        and individuals alike.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="single-item">
                                <div class="icon-box">
                                    <img src="{{ asset('public/images/resources/value_ico.png') }}" alt="value_icon">
                                </div>
                                <div class="text-box">
                                    <h3>Our Core Values</h3>
                                    <ul>
                                        <li>
                                            <p><strong>Customer Focus:</strong> We prioritize our customers' needs,
                                                providing personalized support to ensure their satisfaction.</p>
                                        </li>
                                        <li>
                                            <p><strong>Reliability:</strong> We deliver consistent and dependable
                                                services, ensuring that your printers are set up correctly and
                                                functioning optimally.</p>
                                        </li>
                                        <li>
                                            <p><strong>Expertise:</strong> Our team is knowledgeable and well-trained,
                                                staying updated on the latest printer technologies and installation
                                                processes.</p>
                                        </li>
                                        <li>
                                            <p><strong>Integrity:</strong> We conduct our business with honesty and
                                                transparency, building trust with our customers through our actions.</p>
                                        </li>
                                        <li>
                                            <p><strong>Innovation:</strong> We continually seek new ways to improve our
                                                services, embracing technology and innovative solutions to better serve
                                                our clients.</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="working-process-area py_8" style="background: linear-gradient(rgb(31 191 255 / 52%), rgb(31 191 255 / 52%)), url(public/images/about_bannner.png);">
    <div class="container">
        <div class="sec-title text-center">
            <h2>Why Choose Us</h2>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12 mb-2">
                <div class="setup_installation_pro">
                    <div class="main_install">
                        <h2>Setup & Installation Process</h2>
                        <p>We offer professional installation services for all major printer brands, ensuring your
                            device is set up correctly from the start.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 mb-2">
                <div class="setup_installation_pro">
                    <div class="main_install">
                        <h2>Troubleshooting and Repair</h2>
                        <p>Experiencing issues with your printer? Our team can diagnose and fix problems quickly to get
                            you back on track.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 mb-2">
                <div class="setup_installation_pro">
                    <div class="main_install">
                        <h2>Ongoing Support and Maintenance</h2>
                        <p>We provide continuous support to keep your printer in top condition, preventing issues before
                            they arise.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 mb-2">
                <div class="setup_installation_pro">
                    <div class="main_install">
                        <h2>Custom Solutions</h2>
                        <p>Need something specific? We offer tailored solutions to meet unique printing needs, from
                            network setups to specialized configurations.</p>
                    </div>
                </div>
            </div>
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


<!-- <section id="marquee">
        <div class="container" >
            <div class="pic-container" >
                <div class="pic">
                <a href="#"><img src="{{ asset('public/images/brand/img_new.png') }}" alt="brother_print_logo" loading="lazy"></a>
                </div>
                <div class="pic">
                <a href="#"><img src="{{ asset('public/images/brand/img_new1.png') }}" alt="brother_print_logo" loading="lazy"></a>
                </div>
                <div class="pic">
                <a href="#"><img src="{{ asset('public/images/brand/img_new2.png') }}" alt="brother_print_logo" loading="lazy"></a>
                </div>
                <div class="pic">
                <a href="#"><img src="{{ asset('public/images/brand/img3.png') }}" alt="brother_print_logo" loading="lazy"></a>
                </div>
                <div class="pic">
                <a href="#"><img src="{{ asset('public/images/brand/img4.png') }}" alt="brother_print_logo" loading="lazy"></a>
                </div>
                <div class="pic">
                <a href="#"><img src="{{ asset('public/images/brand/img5.png') }}" alt="brother_print_logo" loading="lazy"></a>
                </div>
                <div class="pic">
                <a href="#"><img src="{{ asset('public/images/brand/img6.png') }}" alt="brother_print_logo" loading="lazy"></a>
                </div>
                <div class="pic">
                <a href="#"><img src="{{ asset('public/images/brand/img7.png') }}" alt="brother_print_logo" loading="lazy"></a>
                </div>
                <div class="pic">
                <a href="#"><img src="{{ asset('public/images/brand/img8.png') }}" alt="brother_print_logo" loading="lazy"></a>
                </div>
                <div class="pic">
                <a href="#"><img src="{{ asset('public/images/brand/img9.png') }}" alt="brother_print_logo" loading="lazy"></a>
                </div>
                <div class="pic">
                <a href="#"><img src="{{ asset('public/images/brand/img10.png') }}" alt="brother_print_logo" loading="lazy"></a>
                </div>
                <div class="pic">
                <a href="#"><img src="{{ asset('public/images/brand/img11.png') }}" alt="brother_print_logo" loading="lazy"></a>
                </div>
                <div class="pic">
                <a href="#"><img src="{{ asset('public/images/brand/img12.png') }}" alt="brother_print_logo" loading="lazy"></a>
                </div>
                <div class="pic">
                <a href="#"><img src="{{ asset('public/images/brand/img13.png') }}" alt="brother_print_logo" loading="lazy"></a>
                </div>
                <div class="pic">
                <a href="#"><img src="{{ asset('public/images/brand/img14.png') }}" alt="brother_print_logo" loading="lazy"></a>
                </div>
                <div class="pic">
                <a href="#"><img src="{{ asset('public/images/brand/img15.png') }}" alt="brother_print_logo" loading="lazy"></a>
                </div>
                <div class="pic">
                <a href="#"><img src="{{ asset('public/images/brand/img16.png') }}" alt="brother_print_logo" loading="lazy"></a>
                </div>
            </div>
        </div>
    </section> -->
@endsection
@section('scripts')
<script>
    $(document).ready(function () {
        $('.owl-carousel-mainnaabt').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            autoplay: false,
            autoplauspedd: 2500,
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
    });
</script>
@endsection