<?php
$servername = "localhost";
$username = "root";
$dbpassword = "@1234#";
$dbname = "petpal";

// Create connection
$conn = new mysqli($servername, $username, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>