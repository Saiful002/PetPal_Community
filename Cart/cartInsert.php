<?php
session_start();
include_once "../Database/connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $itemName = $_POST['itemName'];
    $itemPrice = $_POST['itemPrice'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO cart (email, item_name, item_price) VALUES (?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("sss", $email, $itemName, $itemPrice);
        if ($stmt->execute()) {
            header("Location: cartSelect.php");
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
