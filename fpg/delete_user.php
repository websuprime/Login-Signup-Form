<?php
// Check if the email is provided as a query parameter
if (isset($_GET['email'])) {
  // Include the database connection file
  require_once('db_conn.php');

  $email = urldecode($_GET['email']);

  // SQL to delete user by email
  $sql = "DELETE FROM users WHERE email = '$email'";
  if ($conn->query($sql) === TRUE) {
    // Deletion successful
  } else {
    // Deletion failed
  }

  // Close the database connection
  $conn->close();

  // Redirect back to the user list page
  header("Location: user_list.php");
  exit;
} else {
  // Handle the case when no email is provided
  // Redirect back to the user list page
  header("Location: user_list.php");
  exit;
}
?>