<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{!! str_replace('&amp;', '&', $metaTitle ?? 'Default Title') !!}</title>
    <meta name="description" content="{!! str_replace('#039;', '&', $metaDescription ?? 'Default description') !!}">
    <meta name="keywords" content="{{ $metaKeywords ?? 'default, keywords, here' }}">
    <meta name="author" content="All Printer Setup">
    <meta name="google-site-verification" content="ZLscNK6KbaJO2HaiGM0CEGpAPM8OQI3lzVsZHxSl7SI" />
    <meta name="msvalidate.01" content="83535CD83D702C0B8F2B7396CE36A283" />
    <!-- Google tag (gtag.js) -->
    <script src="https://www.googletagmanager.com/gtag/js?id=G-Z6P08LYK84"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-Z6P08LYK84');
    </script>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="og:title" content="{{ $metaTitle ?? 'Default Title' }}">
    <meta property="og:description" content="{!! str_replace('#039;', '&', $metaDescription ?? 'Default description') !!}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image"
        content="{{ $ogImage ?? 'https://allprintersetup.com/public/images/resources/all-printer-setup-logo.png' }}">
    <meta property="og:site_name" content="All Printer Setup">
    <meta property="og:locale" content="en_US">

    <link rel="canonical" href="{{ url()->current() }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('public/images/favicon/apple-touch-icon.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" href="{{ asset('public/images/favicon/favicon-32x32.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('public/images/favicon/favicon-16x16.png') }}" sizes="16x16">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
    @yield('head')
    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "Organization",
          "name": "All Printer Setup",
          "alternateName": "All Printer Setup",
          "url": "https://allprintersetup.com/",
          "logo": "https://allprintersetup.com/public/images/resources/all-printer-setup-logo.png",
          "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+1 8882785406",
            "contactType": "customer service",
            "contactOption": "TollFree",
            "areaServed": "US",
            "availableLanguage": "en"
          }
        }
        </script>
</head>

<body>

    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="popup-content">
                    <div class="main_popup_form">
                        <div class="form-container">
                            @include('partials.common-form', [
                                'brands' => $brands,
                                'serviceSlug' => $service->slug ?? '',
                                'prefix' => 'service14',
                            ])
                        </div>
                    </div>
                    <div class="close_new_btn">
                        <button type="button" class data-dismiss="modal">X</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        window.__lc = window.__lc || {};
        window.__lc.license = 18071466;
        window.__lc.integration_name = "manual_channels";
        window.__lc.product_name = "livechat";;
        (function(n, t, c) {
            function i(n) {
                return e._h ? e._h.apply(null, n) : e._q.push(n)
            }
            var e = {
                _q: [],
                _h: null,
                _v: "2.0",
                on: function() {
                    i(["on", c.call(arguments)])
                },
                once: function() {
                    i(["once", c.call(arguments)])
                },
                off: function() {
                    i(["off", c.call(arguments)])
                },
                get: function() {
                    if (!e._h) throw new Error("[LiveChatWidget] You can't use getters before load.");
                    return i(["get", c.call(arguments)])
                },
                call: function() {
                    i(["call", c.call(arguments)])
                },
                init: function() {
                    var n = t.createElement("script");
                    n.async = !0, n.type = "text/javascript", n.src = "https://cdn.livechatinc.com/tracking.js",
                        t.head.appendChild(n)
                }
            };
            !n.__lc.asyncInit && e.init(), n.LiveChatWidget = n.LiveChatWidget || e
        }(window, document, [].slice))
    </script>
    <noscript><a href="https://www.livechat.com/chat-with/18071466/" rel="nofollow">Chat with us</a>, powered by <a
            href="https://www.livechat.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript>

    <script>
        window.LiveChatWidget.on('ready', function() {
            setTimeout(function() {
                LiveChatWidget.call('maximize');
            }, 8000);
        });
    </script>

    @yield('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('blogSearch');
            const suggestionsBox = document.getElementById('suggestions');

            if (!searchInput || !suggestionsBox) return; // safety check

            searchInput.addEventListener('keyup', function() {
                const query = this.value.trim();

                if (query.length < 2) {
                    suggestionsBox.innerHTML = '';
                    return;
                }

                fetch(`/blog-search/${encodeURIComponent(query)}`)
                    .then(response => response.json())
                    .then(data => {
                        let html = '';
                        data.forEach(item => {
                            html +=
                                `<a href="${item.url}" class="list-group-item list-group-item-action">${item.title}</a>`;
                        });
                        suggestionsBox.innerHTML = html;
                    });
            });

            document.addEventListener('click', function(e) {
                if (!searchInput.contains(e.target)) {
                    suggestionsBox.innerHTML = '';
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            let isServicesMenuOpen = false;

            $('#toggleServicesMenu').on('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                const $submenu = $(this).closest('.custom-dropdown').find('.services-submenu');
                const $icon = $(this).find('.toggle-icon');

                if (!isServicesMenuOpen) {
                    $('.services-submenu').slideUp();
                    $('.toggle-icon').removeClass('rotate-up'); // reset others

                    $submenu.stop(true, true).slideDown();
                    $icon.addClass('rotate-up');
                    isServicesMenuOpen = true;
                } else {
                    $submenu.stop(true, true).slideUp();
                    $icon.removeClass('rotate-up');
                    isServicesMenuOpen = false;
                }
            });

            $(document).on('click', function() {
                $('.services-submenu').slideUp();
                $('.toggle-icon').removeClass('rotate-up');
                isServicesMenuOpen = false;
            });

            $('.services-submenu').on('click', function(e) {
                e.stopPropagation();
            });
        });
    </script>


    <script>
        function toggleFAQ(button) {
            const answer = button.nextElementSibling;
            const icon = button.querySelector('.icon');
            const isOpen = answer.style.maxHeight && answer.style.maxHeight !== "0px";

            // Close all
            document.querySelectorAll('.faq-answer').forEach(a => {
                a.style.maxHeight = null;
                a.previousElementSibling.querySelector('.icon').textContent = '+';
            });

            // Open the selected one
            if (!isOpen) {
                answer.style.maxHeight = answer.scrollHeight + "px";
                icon.textContent = '−';
            }
        }
    </script>

    <script>
        // Button toggle active class manually for cleaner Bootstrap control
        const brandButtons = document.querySelectorAll('.brand-btn');
        brandButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                brandButtons.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
            });
        });
    </script>
    <!------------------------------------------services_detail_banner--------------------------------------------->
        {{-- <script>
            (() => {
                'use strict';
                const forms = document.querySelectorAll('.needs-validation');
                Array.from(forms).forEach(form => {
                    form.addEventListener('submit', event => {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            })();
        </script> --}}
    <script>
        let currentStep = 1;

        function showStep(step) {
            document.querySelectorAll('.step').forEach((el) => {
                el.classList.remove('active');
            });
            document.getElementById(`step${step}`).classList.add('active');
            currentStep = step;
        }

        function nextStep() {
            if (currentStep < 4) {
                showStep(currentStep + 1);
            }
        }

        function prevStep() {
            if (currentStep > 1) {
                showStep(currentStep - 1);
            }
        }

        function selectOption(btn, group) {
            // Only target buttons within the same step
            const step = btn.closest('.step');
            const allButtons = step.querySelectorAll('.btn-option');

            allButtons.forEach(el => el.classList.remove('active'));

            btn.classList.add('active');
        }
    </script>

    <script>
        $(document).ready(function() {
            $(".review-carousel").owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                dots: true,
                nav: false,
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('inquiryForm');
            form.addEventListener('submit', function(e) {
                e.preventDefault(); // prevent normal submission

                const formData = new FormData(form);
                const submitButton = form.querySelector('button[type="submit"]');
                submitButton.disabled = true;
                submitButton.textContent = 'Submitting...';

                // Clear previous messages
                document.getElementById('successMessage').classList.add('d-none');
                document.getElementById('errorMessages').classList.add('d-none');
                document.getElementById('errorMessages').innerHTML = '';

                fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json',
                        },
                        body: formData
                    })
                    .then(response => {
                        submitButton.disabled = false;
                        submitButton.textContent = 'Submit';
                        if (!response.ok) {
                            // If Laravel returns a 422 Unprocessable Entity for validation errors
                            return response.json().then(errors => {
                                throw errors;
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        form.reset();
                        document.getElementById('successMessage').textContent = data.message;
                        document.getElementById('successMessage').classList.remove('d-none');
                    })
                    .catch(errors => {
                        if (errors.errors) {
                            let errorHtml = '<ul>';
                            Object.values(errors.errors).forEach(msgArray => {
                                msgArray.forEach(msg => {
                                    errorHtml += `<li>${msg}</li>`;
                                });
                            });
                            errorHtml += '</ul>';
                            const errorBox = document.getElementById('errorMessages');
                            errorBox.innerHTML = errorHtml;
                            errorBox.classList.remove('d-none');
                        } else {
                            alert('Something went wrong. Please try again.');
                        }
                    });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#searchInput').on('keyup', function() {
                let query = $(this).val();
                if (query.length > 0) {
                    $.ajax({
                        url: '{{ route('search.suggestions') }}',
                        type: 'GET',
                        data: {
                            q: query
                        },
                        success: function(data) {
                            $('#searchDropdown').html(data).show();
                        }
                    });
                } else {
                    $('#searchDropdown').hide();
                }
            });

            // Hide dropdown when clicking outside
            $(document).click(function(e) {
                if (!$(e.target).closest('#searchInput').length) {
                    $('#searchDropdown').hide();
                }
            });
        });
    </script>
<script>
    $(document).ready(function () {
        $('.inquiry-form').on('submit', function (e) {
            e.preventDefault();

            let form = $(this);
            let formId = form.attr('id');
            let formPrefix = formId.split('_')[1];
            let actionUrl = form.attr('action');
            let formData = form.serialize();
            let submitButton = form.find('button[type="submit"]');

            // Clear previous errors and messages
            form.find('.text-danger').remove();
            form.find('.is-invalid').removeClass('is-invalid');
            $('#successMessage_' + formPrefix).addClass('d-none').text('');
            $('#errorMessages_' + formPrefix).addClass('d-none').text('');

            // Disable the submit button
            submitButton.prop('disabled', true).text('Submitting...');

            $.ajax({
                url: actionUrl,
                method: 'POST',
                data: formData,
                success: function (response) {
                    $('#successMessage_' + formPrefix)
                        .removeClass('d-none')
                        .text(response.message);
                    form[0].reset();
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function (field, messages) {
                            let input = form.find('[name="' + field + '"]');
                            input.addClass('is-invalid');
                            input.after('<div class="text-danger">' + messages[0] + '</div>');
                        });
                    } else {
                        $('#errorMessages_' + formPrefix)
                            .removeClass('d-none')
                            .text('An error occurred. Please try again.');
                    }
                },
                complete: function () {
                    // Always re-enable the button
                    submitButton.prop('disabled', false).text('Submit');
                }
            });
        });
    });
</script>

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
    <!-- /*---------member dropdown cards-------------*/ -->

    <!-- <script>
        document.querySelectorAll('.show-more').forEach(button => {
            button.addEventListener('click', function() {
                const moreFeatures = this.nextElementSibling;


                if (moreFeatures.style.maxHeight) {
                    moreFeatures.style.maxHeight = null;
                    this.textContent = "Show More Features ▼";
                } else {
                    moreFeatures.style.maxHeight = moreFeatures.scrollHeight + "px";
                    this.textContent = "Hide Features ▲";
                }
            });
        });
    </script>
    <script>
        function toggleList(el) {
            const list = el.nextElementSibling;
            list.classList.toggle('show');
            el.textContent = list.classList.contains('show') ? "Hide More Features" : "Show More Features";
        }
    </script> -->
  
<script>
  let allOpen = false;

  document.querySelectorAll('.toggle-btn').forEach(button => {
    button.addEventListener('click', () => {
      const allWrappers = document.querySelectorAll('.feature-wrapper');
      const allButtons = document.querySelectorAll('.toggle-btn');

      if (!allOpen) {
        // Open all
        allWrappers.forEach(wrapper => {
          wrapper.style.height = wrapper.scrollHeight + 'px';
          wrapper.addEventListener('transitionend', function setAutoHeight() {
            wrapper.style.height = 'auto';
            wrapper.removeEventListener('transitionend', setAutoHeight);
          });
        });
        allButtons.forEach(btn => btn.textContent = "Hide More Features ▲");
        allOpen = true;
      } else {
        // Close all
        allWrappers.forEach(wrapper => {
          wrapper.style.height = wrapper.scrollHeight + 'px'; // Force recalc
          requestAnimationFrame(() => {
            wrapper.style.height = '0px';
          });
        });
        allButtons.forEach(btn => btn.textContent = "Show More Features ▼");
        allOpen = false;
      }
    });
  });
</script>
    <!-- -----------------------------------header dropdown close---------------------- -->
    <script>
        // Optional: Hide dropdown if clicked outside
        document.addEventListener('click', function(e) {
            const dropdown = document.getElementById('hoverDropdown');
            if (!dropdown.contains(e.target)) {
                const menu = dropdown.querySelector('.dropdown-menu');
                menu.classList.remove('show');
            }
        });

        // Handle hover manually to add Bootstrap’s show class (if needed for some cases)
        const hoverDropdown = document.getElementById('hoverDropdown');
        hoverDropdown.addEventListener('mouseenter', function() {
            this.querySelector('.dropdown-menu').classList.add('show');
        });
        hoverDropdown.addEventListener('mouseleave', function() {
            this.querySelector('.dropdown-menu').classList.remove('show');
        });
    </script>

    <script>
        const dropdown = document.getElementById('hoverDropdown');
        const menu = dropdown.querySelector('.dropdown-menu');

        dropdown.addEventListener('mouseenter', () => {
            menu.classList.add('show');
        });

        dropdown.addEventListener('mouseleave', () => {
            menu.classList.remove('show');
        });

        document.addEventListener('click', (e) => {
            if (!dropdown.contains(e.target)) {
                menu.classList.remove('show');
            }
        });
    </script>

    <!-- feedback users -->
    <script>
        const yesBtn = document.getElementById("yesBtn");
        const noBtn = document.getElementById("noBtn");
        const yesResponse = document.getElementById("yesResponse");
        const noResponse = document.getElementById("noResponse");
        const buttonGroup = document.getElementById("buttonGroup");

        yesBtn.addEventListener("click", function() {
            yesResponse.style.display = "block";
            noResponse.style.display = "none";
            buttonGroup.style.display = "none"; // 🔴 Hide buttons
        });

        noBtn.addEventListener("click", function() {
            noResponse.style.display = "block";
            yesResponse.style.display = "none";
            buttonGroup.style.display = "none"; // 🔴 Hide buttons
        });
    </script>

    <!-- add -->

<script>
    const boxes = document.querySelectorAll('.popupBox');
    let currentIndex = 0;

    function showPopup(index) {
        boxes.forEach((box, i) => {
            box.style.display = 'none';
        });

        const currentBox = boxes[index];
        currentBox.style.display = 'block';
        currentBox.classList.add('show');

        setTimeout(() => {
            currentBox.classList.remove('show');
            currentBox.style.display = 'none';
        }, 8000);
    }

    // Start after 2s
    setTimeout(() => {
        showPopup(currentIndex);

        setInterval(() => {
            currentIndex = (currentIndex + 1) % boxes.length;
            showPopup(currentIndex);
        }, 8000);
    }, 3000);
</script>




<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggleBtn = document.getElementById('toggleContactForm');
    const closeBtn = document.getElementById('closeContactForm');
    const contactForm = document.getElementById('contactForm');

    toggleBtn.addEventListener('click', function() {
        contactForm.classList.toggle('active');
    });

    closeBtn.addEventListener('click', function() {
        contactForm.classList.remove('active');
    });

    // Close when clicking outside
    document.addEventListener('click', function(e) {
        if (!contactForm.contains(e.target) && e.target !== toggleBtn) {
            contactForm.classList.remove('active');
        }
    });
});
</script>
<!-- from hardeep sir -->

<meta name="csrf-token" content="{{ csrf_token() }}">

<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
    $(document).ready(function () {
    $('.inquiry-form').each(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        const form = $(this);
        const submitBtn = form.find('button[type="submit"]');
        const successBox = $('#successMessage_' + form.attr('id').split('_')[1]);

        submitBtn.prop('disabled', true);

        // OTP SEND
        form.find('.email-input').on('blur', function () {
            const email = $(this).val().trim();
            const otpSection = form.find('.otp-section');
            const otpStatus = form.find('.otp-status');
            const sendingStatus = form.find('.otp-send-status');

            if (!email || form.data('otp-sent') === email) return;

            sendingStatus.text('Sending OTP...').removeClass('text-danger text-success').show();

            $.post("{{ route('send.otp.email') }}", { email }, function (res) {
                form.data('otp-sent', email);
                otpSection.removeClass('d-none');
                otpStatus.text('');
                showMessage(sendingStatus, res.message, 'text-success');
            }).fail(function (xhr) {
                const msg = xhr.responseJSON?.message || 'Failed to send OTP.';
                showMessage(sendingStatus, msg, 'text-danger');
            });
        });

        // VERIFY OTP
        form.find('.verify-otp-btn').on('click', function () {
            const email = form.find('.email-input').val().trim();
            const otp = form.find('.otp-input').val().trim();
            const otpStatus = form.find('.otp-status');

            if (!otp) {
                showMessage(otpStatus, 'Please enter OTP.', 'text-danger');
                return;
            }

            $.post("{{ route('verify.otp.mail') }}", { email, otp }, function (res) {
                showMessage(otpStatus, res.message, 'text-success');
                // submitBtn.prop('disabled', false); // Uncomment if OTP also required to enable submit
            }).fail(function (xhr) {
                const msg = xhr.responseJSON?.message || 'Invalid OTP.';
                showMessage(otpStatus, msg, 'text-danger');
                // submitBtn.prop('disabled', true);
            });
        });

        // FORM SUBMIT
        form.on('submit', function (e) {
            e.preventDefault();

            const formData = form.serialize();
            submitBtn.prop('disabled', true).text('Submitting...');
            successBox.addClass('d-none').text('');
            form.find('.invalid-feedback').text('');
            form.find('.form-control, .form-select').removeClass('is-invalid');

            $.post(form.attr('action'), formData)
                .done(function (res) {
                    showMessage(successBox, res.message, 'text-success');
                    form[0].reset();
                    form.find('.otp-section').addClass('d-none');
                    form.find('.otp-status').text('');
                    form.removeData('otp-sent');
                    form.find('.phone-validation-message').addClass('d-none').text('');
                    submitBtn.prop('disabled', true).text('Submit');
                })
                .fail(function (xhr) {
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        $.each(errors, function (field, msgs) {
                            const input = form.find(`[name="${field}"]`);
                            input.addClass('is-invalid');
                            input.siblings('.invalid-feedback').text(msgs[0]);
                        });
                    } else {
                        showMessage(successBox, 'Something went wrong. Please try again.', 'text-danger');
                    }
                    submitBtn.prop('disabled', false).text('Submit');
                });
        });

        // Clear validation on change
        form.find('.form-control, .form-select').on('input change', function () {
            $(this).removeClass('is-invalid');
            $(this).siblings('.invalid-feedback').text('');
        });

        // -------------------------------
        // PHONE NUMBER VALIDATION ADDED
        // -------------------------------
        const phoneInput = form.find('input[name="phone_number"]');
        const countryCodeSelect = form.find('select[name="country_code"]');
        const phoneValidationMessage = form.find('.phone-validation-message');
        const fullPhoneHidden = form.find('.full-phone');

        function getNumericCountryCode(value) {
            const match = value.match(/\+(\d+)/);
            return match ? match[1] : '';
        }

        function validatePhoneNumberAndControlSubmit() {
            const rawCode = countryCodeSelect.val();
            const code = getNumericCountryCode(rawCode);
            const phone = phoneInput.val().trim();

            submitBtn.prop('disabled', true);
            phoneValidationMessage.addClass('d-none').removeClass('text-danger text-success').text('');

            if (!code || phone.length < 6) return;

            const fullNumber = code + phone;
            fullPhoneHidden.val(fullNumber);

            const apiKey = 'a068b3f64311bb9c8fae73ec84ce36b9';
            const apiUrl = `http://apilayer.net/api/validate?access_key=${apiKey}&number=${fullNumber}`;

            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    if (data.valid) {
                        phoneValidationMessage
                            .removeClass('text-danger')
                            .addClass('text-success')
                            .text('Number verified successfully.')
                            .removeClass('d-none');

                        submitBtn.prop('disabled', false);
                    } else {
                        phoneValidationMessage
                            .removeClass('text-success')
                            .addClass('text-danger')
                            .text('Invalid phone number.')
                            .removeClass('d-none');

                        submitBtn.prop('disabled', true);
                    }
                })
                .catch(() => {
                    phoneValidationMessage
                        .removeClass('text-success')
                        .addClass('text-warning')
                        .text('⚠️ Failed to validate number. Try again later.')
                        .removeClass('d-none');

                    submitBtn.prop('disabled', true);
                });
        }

        // Trigger validation on blur/change
        phoneInput.on('blur', validatePhoneNumberAndControlSubmit);
        countryCodeSelect.on('change', validatePhoneNumberAndControlSubmit);
    });

    // Reusable message function
    function showMessage(el, message, cls) {
        el.removeClass('text-success text-danger text-warning d-none')
            .addClass(cls)
            .text(message)
            .show();
    }
});
</script>

</body>

</html>
