<?php
session_start();
include_once "../Database/connection.php";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT email, passwords FROM userData WHERE email = ?");
    if (!$stmt) {
        die("Prepare statement failed: " . $conn->error);
    }
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($db_email, $db_password);
    $stmt->fetch();

    if ($stmt->num_rows > 0) {
        if (password_verify($password, $db_password)) {
            // Store email in session and local storage
            $_SESSION['user_email'] = $db_email;
            
            // Output the script to store the email in local storage
            echo "<script>
                    localStorage.setItem('user_email', '" . htmlspecialchars($db_email, ENT_QUOTES, 'UTF-8') . "');
                    window.location.href = '../Adoption/adoption.php';
                  </script>";
            exit();
        } else {
            $error = "Invalid email or password";
        }
    } else {
        echo '<div style="display: flex; align-items: center; justify-content: center; height: 100vh; background-color: #f8f9fa;">
        <div style="max-width: 400px; width: 100%; padding: 20px; background-color: #fff; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); border-radius: 10px;">
            <div style="text-align: center; margin-bottom: 20px;">
                <div style="padding: 15px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 5px;">
                    Username or password is incorrect
                </div>
            </div>
            <a href="login.php" style="display: block; text-align: center; text-decoration: none; color: #007bff; margin-top: 10px;">Back to Login</a>
        </div>
      </div>';
    }

    $stmt->close();
    $conn->close();
}
?>
