@extends('layouts.adminapp')
@section('content')
{{-- <div class="page-wrapper">
    <div class="page-content">
        <div class="container">
            <div class="row"> --}}
                <div class="contact-form">
                    <div class="title">
                        <h2>Contact Details</h2>
                    </div>
                    <form id="contact-form" name="contact_form" class="default-form" method="post"
                        action="{{ url('contact-add') }}">
                        @csrf <!-- Add CSRF token for security -->
                        <input type="hidden" name="type" value ="contact_us">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="full_name" value="" placeholder="Your Name*" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" value="" placeholder="Your Mail*" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="contact" value="" placeholder="Phone">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="subject" value="" placeholder="Subject">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <textarea name="message" placeholder="Your Message.." required></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden"
                                    value="">
                                <button class="thm-btn bg-1" type="submit" data-loading-text="Please wait...">Send
                                    Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        {{-- </div>
    </div>
</div> --}}
@endsection