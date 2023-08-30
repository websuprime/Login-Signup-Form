<!DOCTYPE html>
<html>

<head>
  <title>Reset Password</title>
  <style>
    .error {
      color: red;
      font-size: 12px;
    }
  </style>
  <script>
    function togglePasswordVisibility() {
      var passwordInput = document.getElementById("new_password");
      if (passwordInput.type === "password") {
        passwordInput.type = "text";
      } else {
        passwordInput.type = "password";
      }
    }

    function validatePassword(password) {
      // Password should have at least 8 characters
      return password.length >= 8;
    }

    function sanitizeInput(input) {
      // Perform any necessary input sanitization here
      // For example, you could trim the input to remove leading/trailing spaces
      return input.trim();
    }

    function sanitizePasswordInput(inputId) {
      var passwordInput = document.getElementById(inputId);
      passwordInput.value = sanitizeInput(passwordInput.value);
    }

    function validateResetPassword(form) {
      var password = form.new_password.value;
      var passwordError = document.getElementById('passwordError');

      var isValid = true;

      if (!validatePassword(password)) {
        passwordError.innerHTML = "Password should have at least 8 characters.";
        isValid = false;
      } else {
        passwordError.innerHTML = "";
      }

      return isValid;
    }
  </script>
</head>

<body>
  <h2>Reset Password</h2>
  <form action="update_password.php" method="post"
    onsubmit="sanitizePasswordInput('new_password'); return validateResetPassword(this);">
    <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>">
    <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
    <input type="password" name="new_password" id="new_password" placeholder="New Password"><br>
    <span id="passwordError" class="error"></span><br>
    <input type="checkbox" onclick="togglePasswordVisibility()"> Show Password<br>
    <button type="submit">Reset Password</button>
  </form>
</body>

</html>