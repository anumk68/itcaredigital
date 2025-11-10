@extends('frontend.layouts.app')

@section('content')

<style>
    .contact-box::before {
    position: absolute;
    content: "";
    height: 100%;
    width: 100%;
  
    left: -20%;
    background-repeat: no-repeat;
    background-position: center;
    top: 33%;

}
.contact-area {
    background: url("{{ asset('public/frontend/assets/images/contact-bg2.png')}}");
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    padding: 120px 0 120px;
    position: relative;
}
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
					<h1>Contact</h1>
					<ul class="breadcumb-list">
						<li><a href="{{ route('home') }}">Home</a></li>
						<li class="list-arrow">&lt;</li>
						<li>Contact</li>
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
<!-- Start solutek contact Area -->
<!--==================================================-->

<div class="contact-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="section-title text-left">
					<h5 class="section-sub-title">CONTACT US</h5>
					<h2 class="section-main-title">Make an Online Appoinemnt Booking</h2>
					<h2 class="section-main-title">For Business Planing.</h2>
				</div>
					<div class="contact_from_box">
						{{-- <form action="https://formspree.io/f/myyleorq" method="POST" id="dreamit-form">
							<div class="row">
								<div class="col-lg-6">
									<div class="form_box">
										<input type="text" name="name" placeholder="Your Name *">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form_box">
										<input type="email" name="email" placeholder="Your E-Mail *">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form_box">
										<input type="text" name="subject" placeholder="Subject *">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form_box">
										<input type="text" name="phone" placeholder="Phone *">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="quote_button">
										<button class="btn" type="submit">SENS NOW <i class="bi bi-arrow-right"></i></button>
									</div>
								</div>
							</div>
						</form> --}}
                        @include('frontend.common-form.commonForm')
					<div id="status" class="error"></div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="contact-box">
					<div class="contact-video-icon">
						<a class="video-vemo-icon venobox vbox-item" data-vbtype="youtube" data-autoplay="true" href="https://www.youtube.com/watch?v=Wx48y_fOfiY">Play</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--==================================================-->
<!-- end solutek contact Area -->
<!--==================================================-->




<!--==================================================-->
<!-- Start solutek google map area-->
<!--==================================================-->
{{-- <div class="google-map">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233667.9067777347!2d90.11481839453124!3d23.780840500000014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x63e259d796515e63%3A0x8b68319aae711aa1!2sIT%20Park%20BD!5e0!3m2!1sen!2sbd!4v1716707554611!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
		</div>
	</div>
</div> --}}
<!--==================================================-->
<!--End solutek google map area-->
<!--==================================================-->




<!--==================================================-->
<!-- Start solutek address Area -->
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
