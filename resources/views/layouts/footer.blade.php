<footer class="footer">
    <div class="container">
        <div class="row g-4">
            <!-- Logo & Description -->
            <div class="col-md-4">
                <div class="footer_logo">
                    <img src="{{ asset('public/images/all_print_logo.webp') }}" alt="Brother">

                </div>
                <p class="mt-3">
                    Do not lose your productivity. Our expert team offers troubleshooting, maintenance, and solutions
                    for all your printer-related issues.
                </p>
                <h6 class="fw-bold mt-4">Subscribe Now</h6>
                <p>Don’t miss our future updates! Get Subscribed Today!</p>
                <form id="subscribeForm" class="d-flex" action="{{ route('subscribe') }}" method="POST">
                    @csrf

                    <div class="d-flex flex-column w-100 me-2">
                        <input type="email" name="email" id="subscribeEmail" class="form-control  me-2"
                            placeholder="Your email"  >
                        <small class="text-danger d-none" id="emailError"></small>
                    </div>

                    <button type="submit" id="subscribeBtn" class="btn btn-light text-black ms-2 bt-sm">
                        <span id="btnText">Subscribe</span>
                        <span id="btnLoader" class="spinner-border spinner-border-sm d-none"></span>
                    </button>
                </form>


            </div>
            <!-- Useful Links -->
            <!-- First 8 brands -->
            <div class="col-md-2">
                <h6 class="fw-bold">Useful Links</h6>
                <ul class="list-unstyled">
                    @foreach ($brands->take(8) as $brand)
                        <li>
                            <a href="{{ route('printer', ['brand_slug' => strtolower($brand->slug)]) }}">
                                {{ strtoupper($brand->brand_name) }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Next 8 brands -->
            <div class="col-md-3">
                <h6 class="fw-bold">More Printers</h6>
                <ul class="list-unstyled">
                    <li><a href="{{ route('blogs') }}">BLOGS</a></li>
                    @php
                        $slicedBrands = $brands->slice(8, 8);
                        $specialSlug = 'installation-troubleshooting-printer';
                    @endphp

                    @foreach ($slicedBrands as $brand)
                        @if ($brand->slug !== $specialSlug)
                            <li>
                                <a href="{{ route('printer', ['brand_slug' => strtolower($brand->slug)]) }}">
                                    {{ strtoupper($brand->brand_name) }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                    @foreach ($slicedBrands as $brand)
                        @if ($brand->slug === $specialSlug)
                            <li>
                                <a href="{{ route('printer', ['brand_slug' => strtolower($brand->slug)]) }}">
                                    {{ strtoupper($brand->brand_name) }}
                                </a>
                            </li>
                        @endif
                    @endforeach

                </ul>

            </div>

            <!-- Contact Info -->
            <div class="col-md-3">
                <h6 class="fw-bold">Contact Us</h6>
                <ul class="list-unstyled">
                    <li><i class="fa-solid fa-phone"></i><a href="tel:+1 8887684674">+1 8887684674</a></li>
                    <!--<li><i class="fa-solid fa-envelope">

                    </i> <a href="mailto:support@printertouch.com">support@printertouch.com</a></li>-->
                    <li><i class="fa-solid fa-envelope"></i> <a
                            href="mailto:contact@allprintersetup.com">contact@allprintersetup.com</a></li>
                    <li><i class="fa-solid fa-location-dot"></i> 1311 Park St Alameda, CA 94501</li>
                </ul>
                <h6 class="followus">Follow Us</h6>
                <div class="follow_us">
                    <a href="https://www.youtube.com/@allprintersetup"> <i class="fa-brands fa-youtube"></i></a>

                    <a href="https://x.com/allprintersetup"><i class="fa-solid fa-x"></i></a>
                    <a href="https://www.facebook.com/allprintersetupusa/"><i class="fa-brands fa-facebook"></i></a>
                    <a href="https://www.instagram.com/allprintersetupusa/"><i class="fa-brands fa-instagram"></i></a>

                </div>
            </div>
        </div>
    </div>
    <div class="bottom_foooter">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="copyright">
                        © 2025. Printer All Rights Reserved.
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="main_bottom_content">
                        <ul>
                            <li><a href="{{ route('privacy.policy') }}">Privacy-Policy</a></li>
                            <li><a href="{{ route('terms.service') }}">Terms Condition</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


<section class="button_fixed">
    <div class="container-fluid g-0">
        <div class="btn_main_contact_us">
            <a href="javascript:void(0);" class="team-btn">Contact Us</a>
            <div class="contact-form">
                <div class="form-container">
                    @include('partials.common-form', [
                        'brands' => $brands,
                        'serviceSlug' => $service->slug ?? '',
                        'prefix' => 'service16',
                    ])
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="img_modal">
                    <img src="{{ asset('public/images/popup_modal.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal_form_contain">


                            <div class="form-container">
                                @include('partials.common-form', [
                                    'brands' => $brands,
                                    'serviceSlug' => $service->slug ?? '',
                                    'prefix' => 'service15',
                                ])
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->

<!-- jQuery and Owl Carousel JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        $(".testimonial-slider").owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            dots: true,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                }
            }
        });
    });
</script>

<script>
    document.getElementById('subscribeForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const form = this;
        const btn = document.getElementById('subscribeBtn');
        const emailInput = document.getElementById('subscribeEmail');
        const emailError = document.getElementById('emailError');
        const btnText = document.getElementById('btnText');
        const btnLoader = document.getElementById('btnLoader');

        // Reset UI
        emailError.textContent = '';
        emailError.classList.add('d-none');

        btn.disabled = true;
        btnText.classList.add('d-none');
        btnLoader.classList.remove('d-none');

        fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    email: emailInput.value,
                })
            })
            .then(async response => {
                const data = await response.json();

                if (!response.ok) {
                    throw data;
                }

                // Success
                form.reset();
                showToast(data.success, 'success');
            })
            .catch(err => {
                if (err.errors && err.errors.email) {
                    emailError.textContent = err.errors.email[0];
                    emailError.classList.remove('d-none');
                } else {
                    showToast('Something went wrong!', 'error');
                }
            })
            .finally(() => {
                btn.disabled = false;
                btnText.classList.remove('d-none');
                btnLoader.classList.add('d-none');
            });
    });

    // Toast helper
    function showToast(message, type = 'success') {
        const bg = type === 'success' ? 'bg-success' : 'bg-danger';
        const toast = document.createElement('div');
        toast.className = `toast align-items-center text-white ${bg} border-0 show position-fixed bottom-0 end-0 m-3`;
        toast.style.zIndex = 9999;
        toast.innerHTML = `
        <div class="d-flex">
            <div class="toast-body">${message}</div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
    `;
        document.body.appendChild(toast);

        setTimeout(() => toast.remove(), 3000);
    }
</script>
