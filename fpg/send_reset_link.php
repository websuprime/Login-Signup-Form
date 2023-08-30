<?php
require 'db_conn.php';
require 'Mail/phpmailer/PHPMailerAutoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];

  $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();

  if ($user) {
    $resetToken = bin2hex(random_bytes(32)); // Generate a random reset token

    // Store reset token in the database
    $stmt = $conn->prepare("UPDATE users SET reset_token = ? WHERE email = ?");
    $stmt->bind_param("ss", $resetToken, $email);
    $stmt->execute();

    // Send password reset email
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Your SMTP server
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'shubham.raj@imarkinfotech.com';
    $mail->Password = '@Nokia123';
    $mail->SMTPSecure = 'tls';

    $mail->setFrom('shubham.raj@imarkinfotech.com', 'Admin');
    $mail->addAddress($email);
    $mail->Subject = 'Password Reset';

    $resetLink = 'http://localhost/fpg/reset_password.php?email=' . urlencode($email) . '&token=' . urlencode($resetToken);
    $mail->Body = 'Click the following link to reset your password: ' . $resetLink;

    if ($mail->send()) {
      echo "Password reset link sent. Please check your email.";
    } else {
      echo "Failed to send password reset link. Error: " . $mail->ErrorInfo;
    }
  } else {
    echo "No user found with that email.";
  }

  $stmt->close();
}
?>