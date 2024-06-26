<?php
session_start();
include_once "../Database/connection.php";

// getting email from session
$email = $_SESSION['user_email'];

$sql_select = "SELECT pet_name FROM ledgerTable WHERE email='$email' ORDER BY id DESC LIMIT 1";
$result_pet= $conn->query($sql_select);

if ($result_pet->num_rows > 0) {
    $row_pet = $result_pet->fetch_assoc();
    $petName = $row_pet['pet_name'];

    $sql_select = "SELECT pet_name, email, pet_breed FROM ledgerTable WHERE email='$email'";
    $result = $conn->query($sql_select);

    if ($result->num_rows > 0) {
        echo '<h2 style="color: orangered; font-weight: bold; text-align:center">Adopted Pets</h2>';
        echo '<div style="margin-top: 10px; overflow-x: auto;">';
        echo '<table style="width: 100%; border-collapse: collapse; background-color: #fff; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">';
        echo '<thead>';
        echo '<tr style="background-color: green; color: #fff;">';
        echo '<th style="padding: 10px;">Pet Name</th>';
        echo '<th style="padding: 10px;">Breed</th>';
        echo '<th style="padding: 10px;">Email</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr style="background-color: #fff; color: #333;">';
            echo '<td style="padding: 10px; font-size:20px; border-bottom: 1px solid #ccc;">' . htmlspecialchars($row["pet_name"]) . '</td>';
            echo '<td style="padding: 10px; font-size:20px; border-bottom: 1px solid #ccc;">' . htmlspecialchars($row["pet_breed"]) . '</td>';
            echo '<td style="padding: 10px; font-size:20px; border-bottom: 1px solid #ccc;">' . htmlspecialchars($row["email"]) . '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
        echo '
         <div style="text-align: center; margin-top: 20px;">
            <button id="goBack" style="margin-top: 20px; padding: 10px 20px; font-size: 16px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">Go Back</button>
        </div>

        <script>
            document.getElementById("goBack").addEventListener("click", function() {
                window.location.href = "../Home/home.php";   
            });
        </script>
        
        ';
    } else {
        echo '
        <body style="margin:0; font-family: Arial, sans-serif;">
            <div class="container">
                <div id="popup" style="display: block; position: fixed; z-index: 1; padding-top: 100px; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.4);">
                    <div style="background-color: #fefefe; margin: auto; padding: 20px; border: 1px solid #888; width: 80%; max-width: 500px; border-radius: 5px; text-align: center;">
                        <h2 style="color: red;">You are not adopted any pets yet!!!</h2>
                        <button id="goBack" style="margin-top: 20px; padding: 10px 20px; font-size: 16px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">Go Back</button>
                    </div>
                </div>
            </div>
            <div style="text-align: center; margin-top: 20px;">
                
            </div>
            <script>
                document.getElementById("goBack").addEventListener("click", function() {
                    window.location.href = "../Store/store.php";   
                });
            </script>
        </body>';
    }

    echo '</div>';
} else {
    echo '<p style="color: #dc3545; margin: 0;">No pet found for the given email.</p>';
}


$conn->close();
?>
