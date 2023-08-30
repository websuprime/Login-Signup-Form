<!DOCTYPE html>
<html>

<head>
    <title>Signup</title>
    <style>
        .error {
            color: red;
            font-size: 12px;
        }
    </style>
    <script>
        function togglePasswordVisibility(inputId) {
            var input = document.getElementById(inputId);
            if (input.type === "password") {
                input.type = "text";
            } else {
                input.type = "password";
            }
        }

        function validateEmail(email) {
            // A simple email validation regex
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailPattern.test(email);
        }

        function validatePassword(password) {
            var regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
            return regex.test(password);
        }

        function sanitizeInput(input) {
            // Perform any necessary input sanitization here
            // For example, you could trim the input to remove leading/trailing spaces
            return input.trim();
        }
        function handleEmailInput(emailInput) {
            var emailError = document.getElementById('signupEmailError');
            if (validateEmail(emailInput.value)) {
                emailError.innerHTML = "";
            }
        }

        function sanitizePasswordInput(inputId) {
            var passwordInput = document.getElementById(inputId);
            passwordInput.value = sanitizeInput(passwordInput.value);
        }

        function handlePasswordInput(passwordInput) {
            var passwordError = document.getElementById('signupPasswordError');
            if (validatePassword(passwordInput.value)) {
                passwordError.innerHTML = "";
            }
        }

        function validateLogin(form) {
            var email = form.email.value;
            var password = form.password.value;
            var emailError = document.getElementById('loginEmailError');
            var passwordError = document.getElementById('loginPasswordError');

            var isValid = true;

            if (!validateEmail(email)) {
                emailError.innerHTML = "Please enter a valid email address.";
                isValid = false;
            } else {
                emailError.innerHTML = "";
            }

            if (!validatePassword(password)) {
                passwordError.innerHTML = "Password should have at least 8 characters, including at least one digit, one lowercase letter, one uppercase letter, and one special character.";
                isValid = false;
            } else {
                passwordError.innerHTML = "";
            }

            return isValid;
        }

        function validateSignup(form) {
            var email = sanitizeInput(form.email.value);
            var password = form.password.value;
            var emailError = document.getElementById('signupEmailError');
            var passwordError = document.getElementById('signupPasswordError');

            var isValid = true;

            if (!validateEmail(email)) {
                emailError.innerHTML = "Please enter a valid email address.";
                isValid = false;
            } else {
                emailError.innerHTML = "";
            }

            if (!validatePassword(password)) {
                passwordError.innerHTML = "Password should have at least 8 characters, including at least one digit, one lowercase letter, one uppercase letter, and one special character.";
                isValid = false;
            } else {
                passwordError.innerHTML = "";
            }

            return isValid;
        }

        function generateRandomPassword() {
            var length = 12; // Length of the generated password
            var charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-+=";
            var password = "";
            for (var i = 0; i < length; i++) {
                var randomIndex = Math.floor(Math.random() * charset.length);
                password += charset.charAt(randomIndex);
            }
            var signupPasswordInput = document.getElementById("signupPassword");
            signupPasswordInput.value = password;
        }
    </script>
</head>

<body>


    <h2>Signup</h2>
    <form action="signup.php" method="post"
        onsubmit="sanitizePasswordInput('signupPassword'); return validateSignup(this);">
        <input type="text" name="email" placeholder="Email" oninput="handleEmailInput(this);">
        <br>
        <span id="signupEmailError" class="error"></span><br>
        <input type="password" id="signupPassword" name="password" placeholder="Password"
            oninput="handlePasswordInput(this);">
        <br>
        <span id="signupPasswordError" class="error"></span><br>
        <input type="checkbox" onclick="togglePasswordVisibility('signupPassword')"> Show Password<br>
        <button type="button" class="auto" id="gen" onclick="generateRandomPassword()">Auto-generate password</button>
        <button type="submit">Signup</button>
    </form>
    <a href="index.php">Go back to homepage</a>

    <!-- Recover Password button -->
</body>

</html>