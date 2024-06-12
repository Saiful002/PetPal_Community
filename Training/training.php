<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training Challenges - PetPals Community</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="training.css">
    <link rel="stylesheet" href="../Navbar/navbar.css">
</head>

<body>
<?php include '../Navbar/navbar.php'; ?>

    <div class="container">
        <h2 class="text-center">Pet Training Challenges</h2>
        <div class="challenge-section">
            <div class="card">
                <div class="card-header">Challenge Title</div>
                <div class="card-body">
                    <textarea name="description" id="" class="card-text">Write the description</textarea><br>
                    <a href="#" class="btn btn-primary">Participate</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
