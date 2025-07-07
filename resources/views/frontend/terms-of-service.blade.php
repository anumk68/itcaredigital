@extends('layouts.app')
@section('content')


<section class="breadcrumb-area about_banner_main">
    <div class="container text-center">
        <h1>Terms and Conditions 
        </h1>
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
                            <h2>Acceptance of Terms</h2>
                            <p>By accessing or using the services at All Printer Setup, you agree to comply with these Terms of Service. If you do not agree to these terms, please do not use our services.
                            </p>
                        </div>
                        <!-- <div class="pr-mainnn-hdds-img">
                            <img src="{{asset('public/images/resources/Printer(2).png')}}" alt="printer_img">
                        </div> -->
                    </div>
                    <div class="pr-mainnn-hdds-sec">
                        <h3>Service Overview</h3>
                        <p>All Printer Setup offers assistance with the installation, troubleshooting, and setup of various printers including HP, Epson, Canon, Brother, and Ricoh.</p>
                        
                    </div>
                    <ul>
                        <h2>User Responsibilities</h2>
                            <li>Users are responsible for providing accurate information when requesting support services.</li>
                            <li> Users must not misuse our services, including attempting to interfere with our systems or access information unlawfully.

                            </li>
                    
                            
                        </ul>
                    <div class="pr-mainnn-hdds-sec">
                        <h3>Limitation of Liability</h3>
                        <p>All Printer Setup is not liable for any direct, indirect, incidental, or consequential damages that may arise from using our services, including but not limited to printer setup issues, compatibility problems, or hardware malfunctions.</p>
                    </div>
                    <div class="pr-mainnn-hdds-sec">
                        <h3>Modifications to Services
                        </h3>
                        <p>We reserve the right to modify or discontinue any part of our services without prior notice.
                        </p>
                    </div>
                    <div class="pr-mainnn-hdds-sec">
                        <h3>Termination</h3>
                        <p>We may terminate or suspend your access to our services at our discretion, especially if you violate these terms</p>
                    </div>
                    <div class="pr-mainnn-hdds-sec">
                        <h3>Governing Law</h3>
                        <p>These terms are governed by and construed in accordance with the laws of the United States.
                        </p>
                    </div>
                    <div class="pr-mainnn-hdds-sec">
                        <h3>Contact Information
                        </h3>
                        <p>For any queries related to these terms, please contact us at <a href="mailto:contact@allprintersetup.com">contact@allprintersetup.com.</a>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection