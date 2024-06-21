<?php
session_start();
include_once "../Database/connection.php";

//getting email from session
$email = $_SESSION['user_email'];

$sql_select = "SELECT item_name, item_price FROM cart WHERE email='$email'";
$result = $conn->query($sql_select);

echo '<div style="padding: 20px; background-color: #f8f9fa; border-radius: 10px;">';

if ($result->num_rows > 0) {
    echo '<h2 style="color: #007bff; text-align:center">Your Cart Items</h2>';
    echo '<table style="width: 100%; border-collapse: collapse; background-color: #fff; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">';
    echo '<thead>';
    echo '<tr style="background-color: green; color: #fff;">';
    echo '<th style="padding: 10px;">Item Name</th>';
    echo '<th style="padding: 10px;">Price ($)</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr style="background-color: #fff; color: #333;">';
        echo '<td style="padding: 10px; font-size:30px; border-bottom: 1px solid #ccc;">' . $row["item_name"] . '</td>';
        echo '<td style="padding: 10px; font-size:30px; border-bottom: 1px solid #ccc;">' . $row["item_price"] . "  $".'</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
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
                    <h2 style="color: red;">The cart is empty!!!!</h2>
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

$conn->close();
?>
