<?php
require 'db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $token = $_POST['token'];
  $newPassword = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

  // Check if the reset token matches the one stored in the database
  $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND reset_token = ?");
  $stmt->bind_param("ss", $email, $token);
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();

  if ($user) {
    // Update the password and clear the reset token
    $stmt = $conn->prepare("UPDATE users SET password = ?, reset_token = NULL WHERE email = ? AND reset_token = ?");
    $stmt->bind_param("sss", $newPassword, $email, $token);

    if ($stmt->execute()) {
      echo "Password updated successfully. You can now log in with your new password.";
    } else {
      echo "Password update failed.";
    }
  } else {
    echo "Invalid email or token. Please try again.";
  }

  $stmt->close();
}
?>