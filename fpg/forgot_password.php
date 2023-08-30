<!DOCTYPE html>
<html>

<head>
  <title>Forgot Password</title>
  <style>
    .error {
      color: red;
      font-size: 12px;
    }
  </style>
  <script>
    function validateEmail(email) {
      var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailPattern.test(email);
    }

    function validateForm(form, emailErrorId) {
      var email = form.email.value;
      var emailError = document.getElementById(emailErrorId);

      var isValid = true;

      if (!validateEmail(email)) {
        emailError.innerHTML = "Please enter a valid email address.";
        isValid = false;
      } else {
        emailError.innerHTML = "";
      }

      return isValid;
    }
  </script>
</head>

<body>
  <h2>Forgot Password</h2>
  <form action="send_reset_link.php" method="post" onsubmit="return validateForm(this, 'emailError');">
    <input type="text" name="email" placeholder="Email"><br>
    <span id="emailError" class="error"></span><br>
    <button type="submit">Send Reset Link</button>
  </form>
</body>

</html>