<?php
session_start();

//the email is stored in session
$isLoggedIn = isset($_SESSION['user_email']);


if ($isLoggedIn) {
    header("Location: ../Home/home.php");
    exit();
}else {
    header("Location: login.php");
    exit();
}
?>