<form id="inquiryForm_{{ $prefix }}" class="needs-validation inquiry-form" action="{{ route('commonstore.store') }}"
    method="POST">
    @csrf
    <h4>Grab Your Free Support Session Today!</h4>
    <p>Connect with our certified printer specialists for a personalized, no-cost consultation and get expert assistance
        tailored to your printer needs.</p>

    <!-- HIDDEN FIELD FOR SERVICE -->
    <input type="hidden" name="service_slug" value="{{ old('service_slug', $service->slug ?? '') }}">

    <div class="row">
        @php
            // Separate the special brand
            $specialBrand = $brands->firstWhere('brand_name', 'Installation and Troubleshooting');
            $otherBrands = $brands->reject(function ($brand) {
                return $brand->brand_name === 'Installation and Troubleshooting';
            });
        @endphp

        <div class="col-md-6 mb-3">
            <select class="form-select" name="brand">
                <option value="">Select Brand</option>

                {{-- Render all other brands --}}
                @foreach ($otherBrands as $brand)
                    <option value="{{ $brand->brand_name }}" {{ old('brand') == $brand->brand_name ? 'selected' : '' }}>
                        {{ $brand->brand_name }}
                    </option>
                @endforeach

                {{-- Render the special brand last --}}
                @if ($specialBrand)
                    <option value="{{ $specialBrand->brand_name }}" {{ old('brand') == $specialBrand->brand_name ? 'selected' : '' }}>
                        {{ $specialBrand->brand_name }}
                    </option>
                @endif
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <select class="form-select" name="issue_description">
                <option value="">Select Issues</option>
                <option>Printer Offline</option>
                <option>Printer Not Printing</option>
                <option>Printer Paper Jam</option>
                <option>Printer Setup Issue</option>
                <option>Printer Driver</option>
                <option>Printer Issue After Windows Update</option>
                <option>Printer Code Error and Messages</option>
                <option>Printer Not Connecting to Wifi</option>
                <option>Printer Job Stuck in Queue</option>
                <option>Printer in error State</option>
                <option>Printer Other Issues</option>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <input type="text" class="form-control" name="model_number" placeholder="Model Number"
                value="{{ old('model_number') }}">

        </div>
        <div class="col-md-6 mb-3">
            <input type="text" class="form-control" name="name" placeholder="Your Name" value="{{ old('name') }}">

        </div>

    </div>

    <div class="row">
        <div class="col-md-6">

            <input type="email" class="form-control email-input" name="email" placeholder="Your Email"
                value="{{ old('email') }}">
            <!-- <button type="button" class="btn btn-sm btn-secondary mt-2 send-otp-btn">Send OTP</button> -->
            <div class="otp-send-status text-info mt-1" style="min-height: 20px;"></div>



        </div>
        <div class="col-md-6 mb-3">
            <select class="form-select" name="country_code">
                <option value="" id="country_code_drop">Country Code</option>
                <option {{ old('country_code') == 'USA +1' ? 'selected' : '' }}>USA +1</option>
                <option {{ old('country_code') == 'UK +44' ? 'selected' : '' }}>UK +44</option>
                <option {{ old('country_code') == 'CA +1' ? 'selected' : '' }}>CA +1</option>
                <option {{ old('country_code') == 'AUS +61' ? 'selected' : '' }}>AUS +61</option>
                <option {{ old('country_code') == 'IND +91' ? 'selected' : '' }}>IND +91</option>
            </select>

        </div>

    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <input type="tel" class="form-control" id="country_code_number" name="phone_number"
                placeholder="Your Phone Number" value="{{ old('phone_number') }}" pattern="\d{10}">
        </div>
    </div>
    <input type="hidden" name="full_phone" class="full-phone">
    <div class="phone-validation-message text-success mt-2 d-none"></div>

    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="otp-section d-none  ">
                <input type="text" class="form-control otp-input mt-2" placeholder="Enter OTP">
                <button type="button" class="btn btn-sm btn-success mt-2 verify-otp-btn">Verify OTP</button>
                <div class="otp-status mt-1" style="min-height: 20px;"></div>
            </div>
        </div>
    </div>

    <div class="flexiable">
        <button class="btn btn-custom btn-primary" type="submit">Submit</button>
    </div>
</form>
<div id="successMessage_{{ $prefix }}" class="alert alert-success d-none" style="margin:9px; min-height: 40px;"></div>