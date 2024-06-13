<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $title = $_POST['title'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $url = $_POST['url'];
    $content = $_POST['content'];
    

    // Load existing data from JSON file
    $jsonFile = 'blog.JSON';
    $jsonData = file_get_contents($jsonFile);
    $data = json_decode($jsonData, true);

    // Add new data
    $newData = [
        "title" =>$title,
        "description"=>$content ,
        "ref_link"=>$url ,
        "name"=> $name,
        "email"=> $email
    ];
    $data[] = $newData;

    // Save updated data to JSON file
    file_put_contents($jsonFile, json_encode($data, JSON_PRETTY_PRINT));

    // Redirect back to resource.php
    header("Location: resource.php");
    exit();
} else {
    echo "Invalid request method.";
}
?>
