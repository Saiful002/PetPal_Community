<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Care Resources</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="../Footer/footer.css">
    <link rel="stylesheet" href="../Navbar/navbar.css">
    <link rel="stylesheet" href="resource.css">
    <script src="https://kit.fontawesome.com/836f975668.js" crossorigin="anonymous"></script>
</head>
<body>
<section>
    <?php include '../Navbar/navbar.php'; ?>
</section>
<section id="health" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4 mt-3">Pet Health</h2>
        <div class="row g-4" id="health-cards">
            <!-- Health cards will be dynamically loaded here -->
        </div>
    </div>
</section>

<section id="contribute" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4 mt-3">Contribute Your Content</h2>
        <div class="field">
            <form action="process_form.php" method="post" class="mx-auto" style="max-width: 600px;">
                <div class="form-group mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group mb-3">
                    <label for="text" class="form-label">Url:</label>
                    <input type="text" class="form-control" id="url" name="url" required>
                </div>
                <div class="form-group mb-3">
                    <label for="content" class="form-label">Content/Suggestion:</label>
                    <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="submit-btn">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
<?php include '../Footer/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="resource.js"></script>
</body>
</html>
