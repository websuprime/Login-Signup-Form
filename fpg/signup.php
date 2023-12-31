<?php
require 'db_conn.php';
require 'Mail/phpmailer/PHPMailerAutoload.php'; // Update the path to PHPMailerAutoload.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $pasphpsword = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypt the password

  $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
  $stmt->bind_param("ss", $email, $password);

  if ($stmt->execute()) {
    // Send verification email
    $mail = new PHPMailer;

    // Configure PHPMailer settings here
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Your SMTP server
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'taspolohiero73@gmail.com;
    $mail->Password = '@Mr008800;
    $mail->SMTPSecure = 'tls';
    $mail->setFrom('shubham.raj@imarkinfotech.com', 'Admin Bhai');
    $mail->addAddress($email); // Recipient email
    $mail->Subject = 'Email Verification';

    // Create the verification link using the correct path
    $verificationLink = 'http://localhost/fpg/verify.php?email=' . urlencode($email);

    $mail->Body = 'Please click the following link to verify your email: ' . $verificationLink;

    if ($mail->send()) {
      echo "Registration successful. Please check your email for verification.";
    } else {
      echo "Registration successful, but failed to send verification email. Error: " . $mail->ErrorInfo;
    }
  } else {
    echo "Error during registration: " . $stmt->error;
  }

  $stmt->close();
}
?>
