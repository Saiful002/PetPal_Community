<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetPals Community</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="../Navbar/navbar.css">
    <link rel="shortcut icon" href="https://aiapets.com/wp-content/uploads/2022/06/cropped-AIA-Pets-favicon.jpg" type="image/x-icon">
</head>

<body>
<?php include '../Navbar/navbar.php'; ?>
    <div class="overlay"></div>
    <div class="content">
        <div class="animated-text">
        Start your Journey with <br><span>PetPals <img src="../Images/cat.png" height="3%" width="3%" alt=""> Community</span>
            <p>- The greatness of a nation and its moral progress can be judged by the way its animals are treated</p>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>
