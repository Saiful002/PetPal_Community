<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption Center - PetPals Community</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="adoption.css">
    <link rel="stylesheet" href="../Navbar/navbar.css">
</head>
<body>
<?php include '../Navbar/navbar.php'; ?>
<div class="container">
        <h2 class="text-center">Virtual Pet Adoption Center</h2>
        <div id="pets-container" class="row">
        </div>
    </div>
    <script src="adoption.js"></script>
</body>

</html>
