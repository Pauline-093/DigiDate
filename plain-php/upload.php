<?php

$target_dir = "./uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if a file has been uploaded
if(isset($_FILES["fileToUpload"]["tmp_name"]) && !empty($_FILES["fileToUpload"]["tmp_name"])) {
    // Check if the uploaded file is an image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;


        try {

            include '../connention-database/connection.php';

            // Prepare SQL statement to insert the image into the database
            $stmt = $conn->prepare("INSERT INTO image_path (img) VALUES (:file_path)");

            // Bind parameters
            $stmt->bindParam(':file_path', $target_file);

            // Execute the statement
            $stmt->execute();

            file_put_contents($target_file, $_FILES['fileToUpload']);


            echo "Image uploaded successfully and inserted into the database.";

        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
} else {
    echo "No file uploaded.";
    $uploadOk = 0;
}
?>
