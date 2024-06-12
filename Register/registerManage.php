<?php
include_once "../Database/connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password before storing
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO userData (username, email, passwords) VALUES (?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("sss", $username, $email, $hashedPassword);
        $stmt->execute();
        $stmt->close();
        echo "Registration successful";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>