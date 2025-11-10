<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-container h2 {
            margin-bottom: 20px;
            font-weight: 600;
            text-align: center;
        }

        .login-container .form-group {
            margin-bottom: 15px;
        }

        .login-container .btn-primary {
            width: 100%;
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>


    <div class="container">
        <div class="col-md-6 mx-auto">
            <div class="login-container">
                <div class="login-logo-sec text-center">
                    <img src="{{ asset('public/images/resources/Printer(2).webp') }}"  style="width:175px"
                        alt="logo icon">
                </div>

                <h2 id="form-title">Sign In</h2>

                <form id="auth-form">
                    @csrf
                    <input type="hidden" id="is_register" value="0">
                    <input type="hidden" id="is_forgot_password" value="0">

                    <div class="form-group" id="name-group" style="display: none;">
                        <label>Name:</label>
                        <input type="text" id="name" class="form-control">
                    </div>

                    <div class="form-group" id="email-group">
                        <label>Email:</label>
                        <input type="email" id="email" class="form-control">
                    </div>

                    <div class="form-group" id="password-group">
                        <label>Password:</label>
                        <input type="password" id="password" class="form-control">
                    </div>

                    <div class="form-group" id="confirm-password-group" style="display: none;">
                        <label>Confirm Password:</label>
                        <input type="password" id="password_confirmation" class="form-control">
                    </div>

                    <div class="form-group" id="otp-group" style="display: none;">
                        <label>OTP:</label>
                        <input type="text" id="otp" class="form-control">
                    </div>

                    <div class="form-group" id="new-password-group" style="display: none;">
                        <label>New Password:</label>
                        <input type="password" id="new_password" class="form-control">
                    </div>

                    <div class="form-group" id="confirm-new-password-group" style="display: none;">
                        <label>Confirm New Password:</label>
                        <input type="password" id="new_password_confirmation" class="form-control">
                    </div>

                    <button type="submit" id="submit-btn" class="btn btn-primary btn-block">Login</button>
                </form>

                <div class="d-flex justify-content-between mt-3">
                    <a href="#" id="toggle-register">Register</a>
                    <a href="#" id="forgot-password-link">Forgot Password?</a>
                </div>

                <div id="message" class="mt-3" style="color:green;"></div>
            </div>
        </div>
    </div>


    <script>
        let otpStage = false;
        let forgotPasswordStage = false;

        document.getElementById('toggle-register').addEventListener('click', function (e) {
            e.preventDefault();

            // If we are in forgot password mode, just reset to login
            if (document.getElementById('is_forgot_password').value === "1") {
                document.getElementById('is_forgot_password').value = "0";
                document.getElementById('is_register').value = "0";
                document.getElementById('form-title').innerText = "Sign In";
                document.getElementById('submit-btn').innerText = "Login";
                document.getElementById('toggle-register').innerText = "Register";
                document.getElementById('name-group').style.display = "none";
                document.getElementById('confirm-password-group').style.display = "none";
                document.getElementById('email-group').style.display = "block";
                document.getElementById('password-group').style.display = "block";
                document.getElementById('otp-group').style.display = "none";
                document.getElementById('new-password-group').style.display = "none";
                document.getElementById('confirm-new-password-group').style.display = "none";
                otpStage = false;
                forgotPasswordStage = false;
                document.getElementById('message').innerText = "";
                return;
            }

            // Normal toggle between Login and Register
            const isRegister = document.getElementById('is_register').value === "1";
            document.getElementById('is_register').value = isRegister ? "0" : "1";
            document.getElementById('is_forgot_password').value = "0";
            document.getElementById('form-title').innerText = isRegister ? "Sign In" : "Register";
            document.getElementById('submit-btn').innerText = isRegister ? "Login" : "Register";
            document.getElementById('toggle-register').innerText = isRegister ? "Register" : "Login";
            document.getElementById('name-group').style.display = isRegister ? "none" : "block";
            document.getElementById('confirm-password-group').style.display = isRegister ? "none" : "block";
            otpStage = false;
            forgotPasswordStage = false;
            document.getElementById('otp-group').style.display = "none";
            document.getElementById('email-group').style.display = "block";
            document.getElementById('password-group').style.display = "block";
            document.getElementById('new-password-group').style.display = "none";
            document.getElementById('confirm-new-password-group').style.display = "none";
            document.getElementById('message').innerText = "";
        });

        document.getElementById('forgot-password-link').addEventListener('click', function (e) {
            e.preventDefault();
            document.getElementById('is_forgot_password').value = "1";
            document.getElementById('is_register').value = "0";
            document.getElementById('form-title').innerText = "Reset Password";
            document.getElementById('submit-btn').innerText = "Send OTP";
            document.getElementById('toggle-register').innerText = "Login";
            document.getElementById('name-group').style.display = "none";
            document.getElementById('password-group').style.display = "none";
            document.getElementById('confirm-password-group').style.display = "none";
            document.getElementById('email-group').style.display = "block";
            document.getElementById('otp-group').style.display = "none";
            document.getElementById('new-password-group').style.display = "none";
            document.getElementById('confirm-new-password-group').style.display = "none";
            otpStage = false;
            forgotPasswordStage = true;
            document.getElementById('message').innerText = "";
        });

        document.getElementById('auth-form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const submitBtn = document.getElementById('submit-btn');
            const originalBtnText = submitBtn.innerText;
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...';

            const isRegister = document.getElementById('is_register').value === "1";
            const isForgotPassword = document.getElementById('is_forgot_password').value === "1";

            try {
                if (isForgotPassword) {
                    // Forgot Password Flow
                    if (!otpStage) {
                        const response = await fetch("{{ route('forgot.password.send.otp') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": document.querySelector('input[name=_token]').value,
                                "Accept": "application/json"
                            },
                            body: JSON.stringify({
                                email: document.getElementById('email').value
                            })
                        });
                        const data = await response.json();
                        if (!response.ok || !data.success) {
                            showError(data.message || "Failed to send OTP");
                            return;
                        }

                        otpStage = true;
                        document.getElementById('otp-group').style.display = "block";
                        document.getElementById('email-group').style.display = "none";
                        submitBtn.innerText = "Verify OTP";
                        document.getElementById('message').style.color = 'green';
                        document.getElementById('message').innerText = "OTP sent to your email.";
                        document.getElementById('otp').value = "";
                    } else if (document.getElementById('new-password-group').style.display === "block") {
                        // Reset Password
                        const response = await fetch("{{ route('forgot.password.reset') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": document.querySelector('input[name=_token]').value,
                                "Accept": "application/json"
                            },
                            body: JSON.stringify({
                                email: document.getElementById('email').value,
                                otp: document.getElementById('otp').value,
                                new_password: document.getElementById('new_password').value,
                                new_password_confirmation: document.getElementById('new_password_confirmation').value
                            })
                        });
                        const data = await response.json();
                        if (!response.ok || !data.success) {
                            showError(data.message || "Password reset failed");
                            document.getElementById('new_password').value = "";
                            document.getElementById('new_password_confirmation').value = "";
                            return;
                        }

                        document.getElementById('message').style.color = 'green';
                        document.getElementById('message').innerText = "Password updated successfully. Redirecting to login...";
                        setTimeout(() => {
                            window.location.href = "{{ route('admin.login') }}";
                        }, 2000);
                    } else {
                        // Verify OTP for forgot password
                        const response = await fetch("{{ route('forgot.password.verify.otp') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": document.querySelector('input[name=_token]').value,
                                "Accept": "application/json"
                            },
                            body: JSON.stringify({
                                email: document.getElementById('email').value,
                                otp: document.getElementById('otp').value
                            })
                        });
                        const data = await response.json();
                        if (!response.ok || !data.success) {
                            showError(data.message || "Invalid OTP");
                            document.getElementById('otp').value = "";
                            return;
                        }

                        document.getElementById('otp-group').style.display = "none";
                        document.getElementById('new-password-group').style.display = "block";
                        document.getElementById('confirm-new-password-group').style.display = "block";
                        submitBtn.innerText = "Reset Password";
                        document.getElementById('message').style.color = 'green';
                        document.getElementById('message').innerText = "OTP verified. Please enter new password.";
                        document.getElementById('otp').value = "";
                    }
                } else if (!otpStage) {
                    // Send OTP for login/register
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sending OTP...';

                    try {
                        const response = await fetch("{{ route('send.otp') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": document.querySelector('input[name=_token]').value,
                                "Accept": "application/json"
                            },
                            body: JSON.stringify({
                                email: document.getElementById('email').value,
                                password: document.getElementById('password').value,
                                name: document.getElementById('name').value,
                                is_register: isRegister ? 1 : 0
                            })
                        });
                        const data = await response.json();
                        if (data.success) {
                            if (data.is_register) {
                                document.getElementById('message').innerText = "OTP sent to your email.";
                            } else {
                                document.getElementById('message').innerText = "OTP request received. Please contact with admin.";
                            }

                            otpStage = true;
                            document.getElementById('otp-group').style.display = "block";
                            document.getElementById('email-group').style.display = "none";
                            document.getElementById('password-group').style.display = "none";
                            document.getElementById('confirm-password-group').style.display = "none";
                            document.getElementById('name-group').style.display = "none";
                            submitBtn.innerText = "Verify OTP";
                            document.getElementById('message').style.color = 'green';
                            document.getElementById('otp').value = "";
                        }
                    } catch (err) {
                        console.error("OTP error:", err);
                        showError("Failed to send OTP. Please try again.");
                    } finally {
                        submitBtn.disabled = false;
                    }

                } else {
                    // Verify OTP for login/register
                    const route = isRegister ? "{{ route('verify.register') }}" : "{{ route('verify.login') }}";
                    const response = await fetch(route, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('input[name=_token]').value,
                            "Accept": "application/json"
                        },
                        body: JSON.stringify({
                            email: document.getElementById('email').value,
                            otp: document.getElementById('otp').value
                        })
                    });
                    const data = await response.json();
                    if (!response.ok || !data.success) {
                        showError(data.message || "Invalid OTP");
                        document.getElementById('otp').value = "";
                        return;
                    }

                    window.location.href = "{{ route('dashboard') }}";
                }
            } catch (error) {
                showError("An error occurred. Please try again.");
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnText;
            }
        });

        function showError(message) {
            const messageEl = document.getElementById('message');
            messageEl.style.color = 'red';
            messageEl.innerText = message;
        }
    </script>


 
    <!-- Include Bootstrap JS and dependencies (optional, for additional functionality) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>