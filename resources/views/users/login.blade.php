<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Include Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />

    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
        }

        .error {
            color: red;
        }

        input::placeholder {
            color: #555;
            opacity: 1;
        }
    </style>
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%;">
            <h3 class="text-center mb-4" id="form-title">Login</h3>

            <!-- Login Form -->
            <div id="login-form">
                <form id="login-form-elem" action="{{ route('login') }}" onsubmit="return validateLogin()"
                    method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                        <div class="error" id="login-email-error" style="display: none;"></div>
                    </div>
                    <div class="mb-1">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <div class="error" id="login-password-error" style="display: none;"></div>
                    </div>

                    <!-- Thêm Flexbox cho Remember Me và Forgot Password? -->
                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="remember-me" name="remember_me">
                            <label class="form-check-label small" for="remember-me">Remember Me</label>
                        </div>
                        <a href="#" class="small" onclick="alert('Forgot Password functionality')">Forgot
                            Password?</a>
                    </div>

                    <div class="d-grid mt-3">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                </form>

                <div class="text-center mt-3">
                    <small>Don't have an account? <a href="#" onclick="toggleForms()">Sign Up</a></small>
                    <br>
                    <small><a href="#" onclick="goBack()">Go Back Homepage</a></small>
                </div>
            </div>

            <!-- Sign Up Form -->
            <div id="signup-form" style="display: none;">
                <form id="signup-form-elem" onsubmit="return validateSignup()" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="signup-email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="signup-email" name="email">
                        <div class="error" id="signup-email-error" style="display: none;"></div>
                    </div>
                    <div class="mb-3">
                        <label for="signup-password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="signup-password" name="password">
                        <div class="error" id="signup-password-error" style="display: none;"></div>
                    </div>
                    <div class="mb-3">
                        <label for="confirm-password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm-password" name="confirm_password">
                        <div class="error" id="confirm-password-error" style="display: none;"></div>
                    </div>
                    <div class="d-grid mt-3">
                        <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                    </div>
                </form>
                <div class="text-center mt-3">
                    <small>Already have an account? <a href="#" onclick="toggleForms()">Login</a></small>
                    <br>
                    <small><a href="#" onclick="goBack()">Go Back Homepage</a></small>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        // Function to toggle between forms
        function toggleForms() {
            const loginForm = document.getElementById('login-form');
            const signupForm = document.getElementById('signup-form');
            const formTitle = document.getElementById('form-title');
            const title = document.querySelector('title');

            if (loginForm.style.display === 'none') {
                loginForm.style.display = 'block';
                signupForm.style.display = 'none';
                formTitle.textContent = 'Login';
                title.textContent = "Login";

                // Clear Sign-Up form fields and error messages when switching to Login
                document.getElementById('signup-form-elem').reset();
                clearErrors('signup');
            } else {
                loginForm.style.display = 'none';
                signupForm.style.display = 'block';
                formTitle.textContent = 'Sign Up';
                title.textContent = "Sign Up";

                // Clear Login form fields and error messages when switching to Sign-Up
                document.getElementById('login-form-elem').reset();
                clearErrors('login');
            }
        }

        // Function to clear error messages
        function clearErrors(formType) {
            if (formType === 'login') {
                document.getElementById('login-email-error').style.display = 'none';
                document.getElementById('login-password-error').style.display = 'none';
            } else if (formType === 'signup') {
                document.getElementById('signup-email-error').style.display = 'none';
                document.getElementById('signup-password-error').style.display = 'none';
                document.getElementById('confirm-password-error').style.display = 'none';
            }
        }

        // Function to go back to the previous page
        function goBack() {
            window.history.back(); // Go back to the previous page
        }

        // Function to validate the login form
        function validateLogin() {
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            let isValid = true;

            // Clear previous error messages
            document.getElementById('login-email-error').style.display = 'none';
            document.getElementById('login-password-error').style.display = 'none';

            if (!email) {
                document.getElementById('login-email-error').textContent = 'Email is required.';
                document.getElementById('login-email-error').style.display = 'block';
                isValid = false;
            }

            if (!password) {
                document.getElementById('login-password-error').textContent = 'Password is required.';
                document.getElementById('login-password-error').style.display = 'block';
                isValid = false;
            }

            return isValid; // Allow or prevent form submission
        }

        // Function to validate the sign-up form
        function validateSignup() {
            const email = document.getElementById('signup-email').value;
            const password = document.getElementById('signup-password').value;
            const confirmPassword = document.getElementById('confirm-password').value;
            let isValid = true;

            // Clear previous error messages
            document.getElementById('signup-email-error').style.display = 'none';
            document.getElementById('signup-password-error').style.display = 'none';
            document.getElementById('confirm-password-error').style.display = 'none';

            if (!email) {
                document.getElementById('signup-email-error').textContent = 'Email is required.';
                document.getElementById('signup-email-error').style.display = 'block';
                isValid = false;
            }

            if (!password) {
                document.getElementById('signup-password-error').textContent = 'Password is required.';
                document.getElementById('signup-password-error').style.display = 'block';
                isValid = false;
            }

            if (!confirmPassword) {
                document.getElementById('confirm-password-error').textContent = 'Confirm Password is required.';
                document.getElementById('confirm-password-error').style.display = 'block';
                isValid = false;
            } else if (password !== confirmPassword) {
                document.getElementById('confirm-password-error').textContent = 'Passwords do not match.';
                document.getElementById('confirm-password-error').style.display = 'block';
                isValid = false;
            }

            if (isValid) {
                toastr.success('Sign Up successful!'); // Show toastr on successful sign up
                clearSignupForm(); // Clear signup form after success
                setTimeout(() => {
                    toggleForms(); // Go back to login form after 2 seconds
                }, 1000);
            }
            return isValid; // Allow or prevent form submission
        }

        // Function to clear the signup form
        function clearSignupForm() {
            document.getElementById('signup-form-elem').reset();
        }
    </script>
</body>

</html>
