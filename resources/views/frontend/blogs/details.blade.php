@extends('layouts.app')
@section('content')



 <section class="banner_about py_8"
    style="background: linear-gradient(rgb(31 191 255 / 52%), rgb(31 191 255 / 52%)),
           url(public/images/about_bannner.png);">
    <div class="container text-center">
        <h1>{{ $blog->title }}</h1>
    </div>
</section>


    <!--section blogs front banner ============================================================ start-->

    <section class="blogs-front spac ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contct_info text-center">
                        <div class="links text-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--section blogs front banner ============================================================ end-->


    <section class="blog-content_hero-wrapper spac py_8 pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="blog_inqury">
                        <div class="container">
                            <div class="row justify-content-center">

                                <div class="col-lg-8 col-md-12  col-sm-12">
                                    <div class="single_blog">
                                        <img class="img-fluid tips single_blog_injury single-bloged-opens"
                                            src="{{ asset('public/' . $blog->banner) }}" alt="{{ $blog->banner_alt }}">
                                        <p class="mt-3"> {!! $blog->description !!}</p>
                                    </div>
                                        <div class="feedback-container">
                                            <p><strong>Was this article helpful?</strong></p>
                                        <div id="buttonGroup">
                                        <button id="yesBtn" class="btn feedback-btn"><i class="fa-solid fa-check"></i> Yes</button>
                                        <button id="noBtn" class="btn feedback-btn">✘ No</button>
                                        </div>

                                            <div id="yesResponse" class="response-box response-success">
                                            Thanks 👍 for your feedback
                                            </div>

                                            <div id="noResponse" class="response-box response-error">
                                            Watch detailed video here (https://youtu.be/JIDRK9gzTO0)
                                            </div>
                                        </div>
                                    <div class="flex_detail_blog_btn">
                                        <div class="btn_header_callnow text-center">
                                            <a href="tel:8888752997" class="btn w-100">Contact Us</a>
                                        </div>
                                        <div class="btn_header_callnow text-center">
                                            <a href="javascript:void(0);" onclick="parent.LiveChatWidget.call('maximize')"
                                                class="btn w-100">Live Chat</a>
                                        </div>
                                        <div class="btn_header_callnow text-center">
                                            <a href="{{ route('virtual_chat') }}" class="btn w-100">Virtual Assistance</a>
                                        </div>
                                        <div class="btn_header_callnow text-center">
                                            <a href="javascript:void(0);"
                                                onclick="openIframeModal('{{ route('iframe_index') }}');"
                                                class="btn w-100">Download Drivers</a>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-lg-4 col-md-4">

                                    <div class="sticky_bar">
                                        <div class="recent-blog-box">
                                            <div class="blog-header">
                                                <span class="menu-icon">&#9776;</span>
                                                <h2>Recent Blogs</h2>
                                            </div>
                                            <ul class="blog-list">

                                                @foreach ($blogs as $bl_title)
                                                    <li style="display:flex;font-size:15px;align-items:center;"><img
                                                            class="mr-2" src="{{ asset('public/' . $bl_title->banner) }}"
                                                            alt="img"
                                                            style="height:76px;width:96px;border-radius:10px;margin-right:8px;">
                                                        <a href="{{ route('blog.blog_details', $bl_title->slug) }}">
                                                            <h4> {{ Str::words($bl_title->title ?? '', 5, '...') }} </h4>
                                                        </a>
                                                    </li>
                                                @endforeach


                                            </ul>
                                        </div>
                                    </div>

                                    <div class="sticky_bar">
                                        <div class="recent-blog-box">
                                            <img src="{{ asset('public/blog_image/How to connect Brother Printer with WIFI (1)_1728455153.png') }}"
                                                alt="img">
                                        </div>
                                    </div>

                                    <div class="sticky_bar">
                                        <div class="recent-blog-box" style="padding:20px;">
                                            <h3 class="text-start mb-3">Contact Form</h3>
                                            @include('partials.common-form', [
                                                'brands' => $brands,
                                                'serviceSlug' => $service->slug ?? '',
                                                'prefix' => 'service11',
                                            ])
                                        </div>
                                    </div>

                                    <!-- //thankyou modal -->
                                    <!-- Modal -->
                                    <div class="modal fade" id="thankYouModal" role="dialog">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content text-center p-4">
                                                <h5 class="modal-title" id="thankYouModalLabel">Thanks For Contacting Us
                                                </h5>
                                                <p>We will connect you soon...</p>
                                                <button type="button" class="btn btn-primary mt-2"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="sticky_bar p-3 bg-light rounded shadow">
                                        <div class="recent-blog-box all_botton_bg" style="padding:20px;">
                                            <table style="width: 100%; table-layout: fixed; border-collapse: collapse;">
                                                <tr>
                                                    <td class="p-1" style="border: none;">
                                                        <div class="btn_header_callnow text-center">
                                                            <a href="tel:8888752997" class="btn w-100">Contact Us</a>
                                                        </div>
                                                    </td>
                                                    <td class="p-1" style="border: none;">
                                                        <div class="btn_header_callnow text-center">
                                                            <a href="javascript:void(0);"
                                                                onclick="parent.LiveChatWidget.call('maximize')"
                                                                class="btn w-100">Live Chat</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="height: 10px;"></td>
                                                </tr>
                                                <tr>
                                                    <td class="p-1" style="border: none;">
                                                        <div class="btn_header_callnow text-center">
                                                            <a href="{{ route('virtual_chat') }}" class="btn w-100">Virtual
                                                                Assistance</a>
                                                        </div>
                                                    </td>
                                                    <td class="p-1" style="border: none;">
                                                        <div class="btn_header_callnow text-center">
                                                            <a href="javascript:void(0);"
                                                                onclick="openIframeModal('{{ route('iframe_index') }}');"
                                                                class="btn w-100">Download Drivers</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="height: 10px;">&nbsp;</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- //iframe -->
                                    <div id="iframeModal"
                                        style="display:none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; 
                        background-color: rgba(0, 0, 0, 0.7); z-index: 9999; justify-content: center; align-items: center;">
                                        <div
                                            style="position: relative; width: 90%; max-width: 400px; height: 80%; background: #fff; border-radius: 10px; overflow: hidden;">
                                            <button onclick="closeIframeModal()"
                                                style="position: absolute; top: 10px; right: 10px; z-index: 10000; background: #ff5a5a; color: white; border: none; padding: 5px 10px; border-radius: 4px; cursor: pointer;">X</button>
                                            <iframe id="driversIframe" src=""
                                                style="width: 95%; height: 98%; border: none;margin-top:5%;justify-content:center;"></iframe>
                                        </div>
                                    </div>

                                    @if (request()->isMethod('post'))
                                        @php
                                            $name = request('name');
                                            $email = request('email');
                                            $phone = request('phone');
                                            $model = request('model');
                                            $feedback = request('feedback');

                                            $to = 'manpreet.digirush@gmail.com';
                                            $subject = 'New enquiry submitted';

                                            $message = "New Inquiry Details:\n\n";
                                            $message .= "Name: $name\n";
                                            $message .= "Phone Number: $phone\n";
                                            $message .= "Model Number: $model\n";
                                            $message .= "Email: $email\n";
                                            $message .= "Feedback: $feedback\n";

                                            $headers = "From: contact@getsupportguide.com\r\n";
                                            $headers .= "Reply-To: contact@getsupportguide.com\r\n";
                                            $headers .= 'X-Mailer: PHP/' . phpversion();

                                            mail($to, $subject, $message, $headers);

                                            echo json_encode(['status' => 'sent']);
                                            exit();
                                        @endphp
                                    @endif


                                    <script>
                                        function openIframeModal(url) {
                                            const modal = document.getElementById('iframeModal');
                                            const iframe = document.getElementById('driversIframe');
                                            iframe.src = url;
                                            modal.style.display = 'flex';
                                        }

                                        function closeIframeModal() {
                                            const modal = document.getElementById('iframeModal');
                                            const iframe = document.getElementById('driversIframe');
                                            iframe.src = '';
                                            modal.style.display = 'none';
                                        }

                                        //function to show thankyou modal and sending modal
                                        function contact_form_submitted(event) {
                                            event.preventDefault();
                                            const modalElement = document.getElementById('thankYouModal');
                                            const modal = new bootstrap.Modal(modalElement);
                                            modal.show();

                                            var name = document.getElementById('name').value;
                                            var email = document.getElementById('email').value;
                                            var phone = document.getElementById('phone').value;
                                            var model = document.getElementById('model').value;
                                            var feedback = document.getElementById('feedback').value;

                                            $.ajax({
                                                type: 'POST',
                                                url: '{{ url()->current() }}',
                                                data: {
                                                    name: name,
                                                    email: email,
                                                    phone: phone,
                                                    model: model,
                                                    feedback: feedback,
                                                    _token: '{{ csrf_token() }}'
                                                },
                                                success: function(response) {
                                                    console.log(response);
                                                }
                                            });
                                        }
                                    </script>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
