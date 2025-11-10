<!--==================================================-->
<!-- Start solutek Footer Area -->
<!--==================================================-->

<div class="footer-area">
    <div class="container">
        <div class="row footer">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="footer-widget">
                    <div class="footer-logo">
                        <a href="<?php echo e(route('home')); ?>"><img
                                src="<?php echo e(asset('public/frontend/assets/images/Artboard 1It care digital.png')); ?>"
                                class="img-fluid" alt="footer-logo"></a>
                    </div>
                    <p class="footer-widget-text">Transforming digital potential into business success through powerful
                        marketing solutions that deliver real results.</p>
                    <div class="footer-social">
                        <div class="footer-widget-social">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="footer-widget left">
                    <div class="widget-title">
                        <h2>Services</h2>
                    </div>
                    <ul>
                        <li><a href="<?php echo e(route('search-engine-optimization')); ?>">Search Engine Optimization</a></li>
                        <li><a href="<?php echo e(route('web-development')); ?>">Web Development</a></li>
                        <li><a href="<?php echo e(route('web-design')); ?>">Web Design</a></li>
                        <li><a href="<?php echo e(route('social-media-marketing')); ?>">Social Media Marketing</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer-widget left">
                    <div class="widget-title">
                        <h2>Useful links</h2>
                    </div>
                    <ul>
                        <li><a href="<?php echo e(route('home')); ?>">Home </a></li>
                        <li><a href="<?php echo e(route('about-us')); ?>">About</a></li>
                        <li><a href="<?php echo e(route('blog')); ?>"> Blog</a></li>
                        <li><a href="<?php echo e(route('contact')); ?>">Contact Us</a></li>

                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer-widget-newsletter">
                    <div class="widget-title">
                        <h2>Newsletter</h2>
                    </div>
                    <p class="newsletter-text">Globally monetize plug-and-play data it solu
                        monotonectally disseminate oriented busine
                        multifunctional mind design.</p>
                    <div class="Subscribe-form2">
                        
                        <form id="subscribe-form">
                            <?php echo csrf_field(); ?>
                            <div class="form-field2">
                                <input type="email" name="email" id="email" placeholder="Enter Your E-mail"
                                    required>
                                <button class="subscribe-button" type="submit">
                                    <i class="bi bi-send"></i>
                                </button>
                            </div>
                            <div id="success-message" class="alert mt-3" style="display: none;"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row copyright">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="-copyright-text">
                    <p>Powered by 2025 Itcare Digital</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="copyright-list">
                    <ul>
                        <li><a href="<?php echo e(route('privacy')); ?>">Privacy Policy</a></li>
                        <li><a href="<?php echo e(route('refund')); ?>">Refund policy</a></li>
                        <li><a href="<?php echo e(route('terms-condition')); ?>">Terms & Conditions</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!--==================================================-->
<!-- end solutek Footer Area -->
<!--==================================================-->





<!--==================================================-->
<!-- Start scrollup section Area -->
<!--==================================================-->
<!-- scrollup section -->
<div class="scroll-area">
    <div class="top-wrap">
        <div class="go-top-btn-wraper">
            <div class="go-top go-top-button">
                <i class="fas fa-arrow-up"></i>
                <i class="fas fa-arrow-up"></i>
            </div>
        </div>
    </div>
</div>
<!--==================================================-->
<!-- Start scrollup section Area -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#subscribe-form').on('submit', function(e) {
            e.preventDefault();

            var form = $(this);
            var formData = form.serialize();
            var messageDiv = $('#success-message');

            $.ajax({
                url: '<?php echo e(route('subscribe')); ?>',
                type: 'POST',
                data: formData,
                success: function(response) {
                    messageDiv
                        .removeClass('alert-danger')
                        .addClass('alert-success')
                        .text(response.message)
                        .fadeIn();
                    $('#email').val('');
                    setTimeout(() => messageDiv.fadeOut('slow'), 5000);
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        var errorMessage = '';
                        for (var field in errors) {
                            errorMessage += errors[field].join('<br>') + '<br>';
                        }
                        messageDiv
                            .removeClass('alert-success')
                            .addClass('alert-danger')
                            .html(errorMessage)
                            .fadeIn();
                        setTimeout(() => messageDiv.fadeOut('slow'), 5000);
                    } else {
                        messageDiv
                            .removeClass('alert-success')
                            .addClass('alert-danger')
                            .html('An error occurred. Please try again.')
                            .fadeIn();
                        setTimeout(() => messageDiv.fadeOut('slow'), 5000);
                    }
                }
            });
        });
    });
</script>
<?php /**PATH C:\xampp\htdocs\ITcaredigital_29oct\SendAnywhere_085453\itCareDigital_For_SEO_Chnages_From_Mamta\itCareDigital_For_SEO_Chnages_From_Mamta\resources\views/frontend/layouts/footer.blade.php ENDPATH**/ ?>