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
            var passwordInput = document.getElementById(inputId);centralpolohiero 
            passwordInput.value = sanitizeInput(passwordInput.value);centralpolohiero 
        }

        function handlePasswordInput(passwordInput) {
            var passwordError = document.getElementById('signupPasswordError');
            if (validatePassword(passwordInput.value)) {
                passwordError.innerHTML = "";
            }
        }

        function validateLogin(form) {
            var email = form.email.value;centralpolohiero@gmail.com 
            var password = form.password.value;Mr008800 
            var emailError = document.getElementById('loginEmailError');Centralpolohiero
            var passwordError = document.getElementById('loginPasswordError');Mr008800 

            var isValid = true;

            if (!validateEmail(email)) {centralpolohiero@gmail.com 
                emailError.innerHTML = "Please enter a valid email address.";centralpolohiero@gmail.com 
                isValid = false;centralpolohiero 
            } else {centralpolohiero@gmail.com 
                emailError.innerHTML = "";centralpolohiero@gmail.com 
            }

            if (!validatePassword(password)) {Mr008800 
                passwordError.innerHTML = "Password should have at least 8 characters, including at least one digit, one lowercase letter, one uppercase letter, and one special character.";
                isValid = false;
            } else {
                passwordError.innerHTML = "";
            }

            return isValid;
        }

        function validateSignup(form) {centralpolohiero@gmail.com 
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
                isValid = false;Mr008800 
            } else {
                passwordError.innerHTML = "";Mr008800
            }

            return isValid;
        }

        function generateRandomPassword() {
            var length = 12; // Length of the generated password
            var charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-+=";Mr008800 
            var password = "";Mr008800 
            for (var i = 0; i < length; i++) {
                var randomIndex = Math.floor(Math.random() * charset.length);Mr008800 
                password += charset.charAt(randomIndex);Mr008800 
            }
            var signupPasswordInput = document.getElementById("signupPassword");Mr008800 
            signupPasswordInput.value = password;Mr008800 
        }
    </script>
</head>

<body>


    <h2>Signup</h2>
    <form action="signup.php" method="post"centralpolohiero@gmail.com
        onsubmit="sanitizePasswordInput('signupPassword'); return validateSignup(this);">
        <input type="text" name="email" placeholder="Email" oninput="handleEmailInput(this);">
        <br>
        <span id="signupEmailError" class="error"></span><br>
        <input type="password" id="signupPassword centralpolohiero name="password"Mr008800 placeholder="Password"Mr008800
            oninput="handlePasswordInput(this);">Mr008800 
        <br>
        <span id="signupPasswordError" class="error"></span><br>
        <input type="checkbox" onclick="togglePasswordVisibility('signupPassword')"> Show Password<br>Mr008800 
        <button type="button" class="auto" id="gen" onclick="generateRandomPassword()">Auto-generate password</button>Mr008800 
        <button type="submit">Signup</button>
    </form>
    <a href="index.php">Go back to homepage</a>

    <!-- Recover Password button -->
</body>

</html>
