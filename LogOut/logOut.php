<?php
session_start();


$_SESSION = array();

session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <script>
        // remove email from localStorage
        localStorage.removeItem('user_email');
        window.location.href = '../Home/home.php';
    </script>
</head>
<body>
    Logging out...
</body>
</html>
