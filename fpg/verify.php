<?php
require 'db_conn.php';

if (isset($_GET['email'])) {
  $email = $_GET['email'];

  $stmt = $conn->prepare("UPDATE users SET is_verified = 1 WHERE email = ?");
  $stmt->bind_param("s", $email);

  if ($stmt->execute()) {
    echo "Email verification successful. You can now log in.";
  } else {
    echo "Email verification failed.";
  }

  $stmt->close();
}
?>