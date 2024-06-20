<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Pet Accessories Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="store.css">
    <link rel="stylesheet" href="../Navbar/navbar.css">
    <link rel="stylesheet" href="../Footer/footer.css">
    <script src="https://kit.fontawesome.com/836f975668.js" crossorigin="anonymous"></script>
</head>

<body>

<?php include '../Navbar/navbar.php'; ?>

<div class="container">
        <h2 class="text-center">Virtual Pet Accessories Store!</h2>
        <div id="pets-container" class="row">
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="store.js"></script>
    <?php include '../Footer/footer.php'; ?>
</body>

</html>
