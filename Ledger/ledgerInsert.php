<?php
session_start();
include_once "../Database/connection.php";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $petName = $_POST['petName'] ?? null;
    $email = $_POST['email'] ?? null;
    $petBreed = $_POST['petBreed'] ?? null;

    error_log("POST data - petName: $petName, email: $email, petBreed: $petBreed"); 
 
    if (!empty($petName) && !empty($email) && !empty($petBreed)) {
        $sql = "INSERT INTO ledgerTable (pet_name, email, pet_breed) VALUES ('$petName', '$email', '$petBreed')";
        if ($conn->query($sql) === TRUE) {
    
            echo '
    <body style="margin:0; font-family: Arial, sans-serif;">
        <div class="container">
            <div id="popup" style="display: block; position: fixed; z-index: 1; padding-top: 100px; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.4);">
                <div style="background-color: #fefefe; margin: auto; padding: 20px; border: 1px solid #888; width: 80%; max-width: 500px; border-radius: 5px; text-align: center;">
                    <h2 style="color: #4CAF50;">Congratulations!!! You adopted ' . htmlspecialchars($petName) . '</h2>
                    <p style="margin-top: 20px; font-size: 16px;">Please take care of him</p>
                    <button id="goBack" style="margin-top: 20px; padding: 10px 20px; font-size: 16px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">Go Back</button>
                </div>
            </div>
        </div>
        <div style="text-align: center; margin-top: 20px;">
            
        </div>
        <script>
            document.getElementById("goBack").addEventListener("click", function() {
                window.location.href = "../Adoption/adoption.php";   
            });
        </script>
    </body>';
    
        }
    }
    else {
        echo "All fields are required.";
    }
} else {
    echo "Invalid request method.";
}

$conn->close();
?>