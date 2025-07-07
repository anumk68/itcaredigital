@extends('layouts.app')
@section('content')


<section class="breadcrumb-area about_banner_main">
    <div class="container text-center">
        <h1>Privacy Policy</h1>
    </div>
</section>
<section class="button_fixed">
    <div class="container-fluid g-0">
        <div class="btn_main_contact_us">
            <a href="javascript:void(0);" class="team-btn">Contact Us</a>
            <div class="contact-form">
                <div class="title">
                    <h2>Contact Details</h2>
                </div>
        <div class="form_popup_class">
            <form id="contact-form" name="contact_form" class="default-form" method="post" action="{{ url('contact-add') }}">
                @csrf <!-- Add CSRF token for security -->
                <input type="hidden" name="type" value="contact_us">
                <div class="row">
                    <div class="col-md-6">
                        <select name="brand" id="brand">
                            <option value="volvo">Brand</option>
                            <option value="saab">HP</option>
                            <option value="mercedes">Epson</option>
                            <option value="audi">Brother</option>
                            <option value="audi">Canon</option>
                            <option value="audi">Other</option>
                          </select>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="" placeholder="Model No">
                    </div>
                    <div class="col-md-6">

                        <input type="text" name="full_name" value="{{ old('full_name') }}" placeholder="Your Name*" required>
                        @error('full_name')
                            <div class="error-message" style="color:red;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Your Mail*" required>
                        @error('email')
                            <div class="error-message" style="color:red;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <input type="text" name="contact" value="{{ old('contact') }}" placeholder="Phone" minlength=10 maxlength=10 oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
                        @error('contact')
                            <div class="error-message" style="color:red;">{{ $message }}</div>
                        @enderror
                    </div>
             
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <textarea name="message" placeholder="Describe issue" required>{{ old('message') }}</textarea>
                        @error('message')
                            <div class="error-message" style="color:red;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                        <button class="thm-btn bg-1" type="submit" data-loading-text="Please wait...">Send Message</button>
                    </div>
                </div>

                <!-- Success message alert -->
            </form>
        </div>

            </div>
        </div>
    </div>
  </section>
<section class="privacy-policy-sect">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xl-12 col-sm-12">
                <div class="pr-main-head">
                    <div class="pr-mainnn-hd">
                        <div class="pr-mainnn-hdds">
                            <h2>Introduction</h2>
                            <p>At All Printer Setup, we prioritize your privacy. This Privacy Policy outlines how we collect, use, and protect your personal information when you use our website and services.
                            </p>
                        </div>
                        <!-- <div class="pr-mainnn-hdds-img">
                            <img src="public/images/resources/Printer(2).png" alt="Printer_img">
                        </div> -->
                    </div>
      
                    <div class="pr-mainnn-hdds-sec">
                    <h2>Information We Collect</h2>
                        <h3>Personal Information:</h3>
                        <p>We collect personal information such as your name, email address, phone number, and address when you contact us for support or services.
                        </p>
                    </div>
                    <div class="pr-mainnn-hdds-sec">
                        <h3>Non-Personal Information:</h3>
                        <p>This includes data such as browser type, operating system, and website usage data to improve user experience.
                        </p>
                    </div>
                    <div class="pr-mainnn-hdds-sec">
                        <h3>Cookies: </h3>
                        <p>Our website may use cookies to enhance your browsing experience.
                        </p>
                    </div>
           
                    <ul>
                        <h2>How We Use Your Information</h2>
                            <li>To provide support and services for printer setup and troubleshooting. </li>
                            <li> To respond to inquiries and customer service requests.
                            </li>
                            <li> To improve our website functionality and services.
                            </li>
                            
                        </ul>

                        <div class="pr-mainnn-hdds-sec">
                        <h3>Sharing Your Information</h3>
                        <p>We do not sell, trade, or rent your personal information to others. We may share your information with third-party service providers to help with our services, but only with your consent.
                        </p>
                    </div>
                    
                    <div class="pr-mainnn-hdds-sec">
                        <h3>Data Security
                        </h3>
                        <p>We implement secure measures to protect your information from unauthorized access or disclosure. However, no method of data transmission over the internet is 100% secure.

                        </p>
                    </div>
                    
                    <div class="pr-mainnn-hdds-sec">
                        <h3>Your Rights
                        </h3>
                        <p>You have the right to request access to, correct, or delete your personal information. Please contact us if you wish to exercise any of these rights.

                        </p>
                    </div>
                    
                    <div class="pr-mainnn-hdds-sec">
                        <h3>Changes to This Privacy Policy
                        </h3>
                        <p>We may update this policy occasionally. We encourage you to review it regularly to stay informed of any changes.

                        </p>
                    </div>
                    <div class="pr-mainnn-hdds-sec">
                        <h3>Contact Us

                        </h3>
                        <p>For any questions regarding this policy, please contact us at <a href="mailto:contact@allprintersetup.com">contact@allprintersetup.com</a>


                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection