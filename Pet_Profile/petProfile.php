<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Pet Profile - PetPals Community</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="petProfile.css">
    <link rel="stylesheet" href="../Navbar/navbar.css">
</head>

<body>
<?php include '../Navbar/navbar.php'; ?>
    <div class="container">
        <h2 class="text-center">Create Pet Profiles for give Adoption</h2>
        <form action="profileControl.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="pet-name">Pet Name</label>
                <input type="text" class="form-control" name="pet-name" id="pet-name" placeholder="Enter pet name" require>
            </div>
            <div class="form-group">
                <label for="pet-breed">Breed</label>
                <input type="text" class="form-control" name="pet-breed" id="pet-breed" placeholder="Enter breed" require>
            </div>
            <div class="form-group">
                <label for="pet-age">Age</label>
                <input type="text" class="form-control" name="pet-age" id="pet-age" placeholder="Enter age" require>
            </div>
            <div class="form-group">
                <label for="pet-age">Personality</label>
                <input type="text" class="form-control" name="pet-personality" id="pet-personality" placeholder="Enter Personality" require>
            </div>
            <div class="form-group">
                <label for="pet-photo">Photo</label>
                <input type="file" class="form-control-file" name="pet-photo" id="pet-photo" require>
            </div>
            <button type="submit" class="btn btn-success">Create Profile</button>
        </form>
    </div>
</body>

</html>
