<?php
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session.
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <script>
        // Remove user_email from localStorage
        localStorage.removeItem('user_email');

        // Redirect to the home page after localStorage is cleared
        window.location.href = '../Home/home.php';
    </script>
</head>
<body>
    Logging out...
</body>
</html>
