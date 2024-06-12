<?php
session_start();

// Assuming user information is stored in session
$isLoggedIn = isset($_SESSION['user_email']);


if ($isLoggedIn) {
    // Determine which operation to perform based on query parameters
    if (isset($_GET['pet'])) {
        // Redirect to form.php if the 'pet' parameter is present
        header("Location: ../Adoption/Form/form.php?pet=" . urlencode($_GET['pet']));
    } elseif (isset($_GET['item'])) {
        // Redirect to cart.php if the 'item' parameter is present
        header("Location: ../Cart/cart.php?item=" . urlencode($_GET['item']));
    } else {
        // Default action if no specific parameter is found
        header("Location: ../Adoption/adoption.php");
    }
    exit();
}else {
    // User is not logged in, redirect to login.php
    header("Location: login.php");
    exit();
}
?>