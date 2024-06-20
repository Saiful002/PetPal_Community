<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //getting data from form
    $title = $_POST['title'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $url = $_POST['url'];
    $content = $_POST['content'];
    

    $jsonFile = 'blog.JSON';
    $jsonData = file_get_contents($jsonFile);
    $data = json_decode($jsonData, true);

    $newData = [
        "title" =>$title,
        "description"=>$content ,
        "ref_link"=>$url ,
        "name"=> $name,
        "email"=> $email
    ];
    $data[] = $newData;

    file_put_contents($jsonFile, json_encode($data, JSON_PRETTY_PRINT));

    header("Location: resource.php");
    exit();
} else {
    echo "Invalid request method.";
}
?>
