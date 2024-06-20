<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //getting data from the form
    $petName = $_POST['pet-name'];
    $petBreed = $_POST['pet-breed'];
    $petAge = $_POST['pet-age'];
    $petPersonality = $_POST['pet-personality'];

    //uploading image
    $targetDir = "../Adoption/uploads/";
    $targetFile = $targetDir . basename($_FILES["pet-photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["pet-photo"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    if ($_FILES["pet-photo"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }


    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Sorry, only JPG, JPEG, and PNG files are allowed.";
        $uploadOk = 0;
    }


    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["pet-photo"]["tmp_name"], $targetFile)) {
            $jsonFile = '../Adoption/petsData.JSON';
            if (file_exists($jsonFile)) {

                $jsonData = file_get_contents($jsonFile);
                $data = json_decode($jsonData, true);
            } else {
                $data = [];
            }
        
            // post json format
            $newPet = [
                "name" => $petName,
                "breed" => $petBreed,
                "age" => $petAge,
                "personality" => $petPersonality,
                "image_url" => $targetFile
            ];
            $data[] = $newPet;
        
            file_put_contents($jsonFile, json_encode($data, JSON_PRETTY_PRINT));
            echo '
            <body style="margin:0; font-family: Arial, sans-serif;">
                <div class="container">
                    <div id="popup" style="display: block; position: fixed; z-index: 1; padding-top: 100px; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.4);">
                        <div style="background-color: #fefefe; margin: auto; padding: 20px; border: 1px solid #888; width: 80%; max-width: 500px; border-radius: 5px; text-align: center;">
                            <h2 style="color: #4CAF50;">Profile Created Successfully !!!</h2>
                            <p style="margin-top: 20px; font-size: 16px;">Now your pet is ready for adopt</p>
                            <button id="goBack" style="margin-top: 20px; padding: 10px 20px; font-size: 16px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">Go Back</button>
                        </div>
                    </div>
                </div>
                <div style="text-align: center; margin-top: 20px;">
                    
                </div>
                <script>
                    document.getElementById("goBack").addEventListener("click", function() {
                        window.location.href = "../Adoption/adoption.php";   
                    });
                </script>
            </body>';
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
} else {
    echo "Invalid request method.";
}
?>
