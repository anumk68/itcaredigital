<form id="dreamit-form" novalidate>
    <?php echo csrf_field(); ?>
    <div class="row">
        <!-- Name -->
        <div class="col-lg-6">
            <div class="form_box">
                <input type="text" name="name" id="name" placeholder="Your Name *" required>
                <small class="error" id="nameError"></small>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form_box">
                <input type="email" name="email" id="email" placeholder="Your E-Mail *" required>
                <small class="error" id="emailError"></small>
                <div id="otpSection" style="display:none; margin-top:5px;">
                    <input type="text" id="otpInput" placeholder="Enter OTP" class="mt-2">
                    <button type="button" id="verifyOtpBtn" class="btn btn-sm btn-primary mt-1 mb-2">Verify OTP</button>
                    <small id="otpMsg"></small>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form_box">
                <select name="service" id="service" class="custom-select" required>
                    <option value="">Select a Service*</option>
                    <option value="Web Design">Web Design</option>
                    <option value="Web Development">Web Development</option>
                    <option value="Digital Marketing">Digital Marketing</option>
                    <option value="SEO Optimization">SEO Optimization</option>
                    <option value="Graphic Design">Graphic Design</option>
                    <option value="App Development">App Development</option>
                </select>
                <small class="error" id="serviceError"></small>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form_box">
                <input type="text" name="phone" id="phone" placeholder="Phone *" required>
                <small class="error" id="phoneError"></small>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="quote_button text-center">
                <button class="btn" type="submit" id="submitBtn" disabled>
                    SEND NOW <i class="bi bi-arrow-right"></i>
                </button>
                <div id="successMsg" style="display:none; color:green; margin-top:10px;"></div>
            </div>
        </div>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(function() {

        let isVerified = false;
        function checkAllFilled() {
            const name = $('#name').val().trim();
            const email = $('#email').val().trim();
            const service = $('#service').val();
            const phone = $('#phone').val().trim();
            if (name && email && service && phone && isVerified) {
                $('#submitBtn').prop('disabled', false);
            } else {
                $('#submitBtn').prop('disabled', true);
            }
        }
        $('#name, #email, #service, #phone').on('input change', checkAllFilled);
        $('#email').on('blur', function() {
            const email = $(this).val().trim();
            if (email === '') return;
            if (!validateEmail(email)) {
                $('#emailError').text('Enter a valid email address');
                return;
            }
            $('#emailError').text('');
            $('#otpSection').show();
            $('#otpMsg').text('Sending OTP...').css('color', 'black');
            $.ajax({
                url: "<?php echo e(route('send.otp')); ?>",
                method: "POST",
                data: {
                    email,
                    _token: "<?php echo e(csrf_token()); ?>"
                },
                success: function(res) {
                    if (res.status === 'success') {
                        $('#otpMsg').css('color', 'green').text(res.message);
                    } else {
                        $('#otpMsg').css('color', 'red').text(res.message);
                    }
                },
                error: function() {
                    $('#otpMsg').css('color', 'red').text('Error sending OTP');
                }
            });
        });
        $('#verifyOtpBtn').on('click', function() {
            const otp = $('#otpInput').val().trim();
            if (otp === '') {
                $('#otpMsg').css('color', 'red').text('Please enter OTP');
                return;
            }
            $('#otpMsg').text('Verifying...').css('color', 'black');
            $.ajax({
                url: "<?php echo e(route('verify.otp')); ?>",
                method: "POST",
                data: {
                    otp,
                    _token: "<?php echo e(csrf_token()); ?>"
                },
                success: function(res) {
                    if (res.status === 'success') {
                        $('#otpMsg').css('color', 'green').text(res.message);
                        isVerified = true;
                        checkAllFilled();
                    } else {
                        $('#otpMsg').css('color', 'red').text(res.message);
                    }
                }
            });
        });
        $('#dreamit-form').on('submit', function(e) {
            e.preventDefault();

            if (!isVerified) {
                $('#otpMsg').css('color', 'red').text('Please verify your email first');
                return;
            }

            let valid = true;
            $('.error').text('');

            const name = $('#name').val().trim();
            const email = $('#email').val().trim();
            const service = $('#service').val();
            const phone = $('#phone').val().trim();

            if (name === '') {
                $('#nameError').text('Name is required');
                valid = false;
            }
            if (email === '' || !validateEmail(email)) {
                $('#emailError').text('Valid email required');
                valid = false;
            }
            if (service === '') {
                $('#serviceError').text('Please select a service');
                valid = false;
            }
            if (phone === '' || !validatePhone(phone)) {
                $('#phoneError').text('Enter a valid phone number');
                valid = false;
            }

            if (!valid) return;

            $('#submitBtn').html('Please wait...').prop('disabled', true);

            $.ajax({
                url: "<?php echo e(route('store.contact')); ?>",
                method: "POST",
                data: {
                    name,
                    email,
                    service,
                    phone,
                    _token: "<?php echo e(csrf_token()); ?>"
                },
                success: function(res) {
                    if (res.status === 'success') {
                        $('#successMsg').text(res.message).fadeIn();
                        setTimeout(() => {
                            $('#successMsg').fadeOut();
                        }, 5000);
                        $('#dreamit-form')[0].reset();
                        $('#otpSection').hide();
                        $('#otpMsg').text('');
                        isVerified = false;
                        $('#submitBtn').html('SEND NOW').prop('disabled', true);
                    } else {
                        $('#successMsg').css('color', 'red').text(res.message).fadeIn();
                        setTimeout(() => {
                            $('#successMsg').fadeOut();
                        }, 5000);
                        $('#submitBtn').html('SEND NOW').prop('disabled', false);
                    }
                },
                error: function() {
                    $('#successMsg').css('color', 'red').text('Something went wrong')
                        .fadeIn();
                    setTimeout(() => {
                        $('#successMsg').fadeOut();
                    }, 5000);
                    $('#submitBtn').html('SEND NOW').prop('disabled', false);
                }
            });
        });
        function validateEmail(email) {
            const pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return pattern.test(email);
        }

        function validatePhone(phone) {
            const pattern = /^[0-9]{10,15}$/;
            return pattern.test(phone);
        }
    });
</script>
<?php /**PATH C:\xampp\htdocs\151025itcaredigital\itcaredigitalforadmin_backend\itcaredigitalforadmin_backend\resources\views/frontend/common-form/commonForm.blade.php ENDPATH**/ ?>