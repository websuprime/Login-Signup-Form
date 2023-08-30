<?php
session_start();
require 'db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        // Successful login, set session variable and redirect
        $_SESSION['email'] = $email;
        header("Location: landing_page.php");
        exit();
    } else {
        echo "Invalid email or password.";
    }

    $stmt->close();
}
?>
