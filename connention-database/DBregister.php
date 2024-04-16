<?php
//
//$servername = "localhost";
//$username = "pauline";
//$password = "root";
//$dbname = "digidate";
//
//include __DIR__ . '/../connention-database/connection.php';
//
//try {
//    if ($_SERVER["REQUEST_METHOD"] == "POST") {
//        $name = $_POST['name'];
//        $email = $_POST['email'];
//        $description = $_POST['description'];
//        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
//
//        $stmt = $conn->prepare('INSERT INTO users (name, email, password, description, role_id) VALUES (:name, :email, :password, :description, :role_id)');
//
//        $role_id = 1;
//
//        $stmt->bindParam(':name', $name);
//        $stmt->bindParam(':email', $email);
//        $stmt->bindParam(':password', $password);
//        $stmt->bindParam(':description', $description);
//        $stmt->bindParam(':role_id', $role_id);
//
//        if (empty($_POST["comment"])) {
//            $comment = "";
//        } else {
//            $comment = input($_POST["comment"]);
//        }
//
//        // Execute the query
//        if ($stmt->execute()) {
//            echo "Registration successful"; ?>
<!---->
<!--            <a href="../pages/index.php">Go to inlog</a>--><?php
//        } else {
//            // Registration failed
//            echo "Registration failed. Please try again.";
//        }
//    } else {
//        // Invalid request method
//        echo "Invalid request method";
//    }
//} catch (PDOException $e) {
//    // Handle PDO exceptions (database errors)
//    echo "Error: " . $e->getMessage();
//}
//
//
//
//$target_dir = "./uploads/";
//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//$uploadOk = 1;
//
//$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
//if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == UPLOAD_ERR_OK) {
//    // Your file upload code here
//} else {
//    echo "No file uploaded.";
//}
//
//
//if (isset($_FILES["fileToUpload"]["tmp_name"]) && !empty($_FILES["fileToUpload"]["tmp_name"])) {
//    // Check if the uploaded file is an image
//    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//    if ($check !== false) {
//        echo "File is an image - " . $check["mime"] . ".";
//        $uploadOk = 1;
//
//
//        try {
//
//            include '../connention-database/connection.php';
//
//            // Prepare SQL statement to insert the image into the database
//            $stmt = $conn->prepare("INSERT INTO image_path (img) VALUES (:file_path)");
//
//            // Bind parameters
//            $stmt->bindParam(':file_path', $target_file);
//
//            // Execute the statement
//            $stmt->execute();
//
//            file_put_contents($target_file, $_FILES['fileToUpload']);
//
//
//            echo "Image uploaded successfully and inserted into the database.";
//
//        } catch (PDOException $e) {
//            echo "Connection failed: " . $e->getMessage();
//        }
//
//    } else {
//        echo "File is not an image.";
//        $uploadOk = 0;
//    }
//} else {
//    echo "No file uploaded.";
//    $uploadOk = 0;
//}
//
//// Rest of your code for handling file upload...
//
//
////$servername = "localhost";
////$username = "root";
////$password = "";
////$dbname = "bos";
////
////$role="2";
////$email=$_POST['addEmail'];
////
////
////try {
////    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
////    // set the PDO error mode to exception
////    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
////    echo "Connected successfully";
////} catch (PDOException $e) {
////    echo "Connection failed: " . $e->getMessage();
////}
////
////try {
////    $sql = "INSERT INTO users (
////                   role_id,
////                   users,
////                   email,
////                   password,
////            ) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
////    $sth = $conn->prepare($sql);
////    $sth->execute(
////        [$role_id, $users, $email, $password]
////    );
////    header("Location: ../index.php");
////} catch(PDOException $e) {
////    echo $sql . "<br>" . $e->getMessage();
////    $sql="";
////    $sth="";
////}
////
////$conn = null;
////
/////*
////phpinfo();
////apache on
////*/
//
//
////session_start();
////
////include '../connention-database/connection.php';
////
////
////if ($_SERVER["REQUEST_METHOD"] == "POST") {
////    $name = $_POST['name'];
////    $email = $_POST['email'];
////    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
////
////    // Assuming your users table has columns like name, email, password, and role_id
////    $stmt = $conn->prepare('INSERT INTO users (name, email, password, role_id) VALUES (:name, :email, :password, :role_id)');
////
////    // You may set a default role_id for new users, adjust this according to your roles structure
//////    $role_id = 1;
////
////    $stmt->bindParam(':name', $name);
////    $stmt->bindParam(':email', $email);
////    $stmt->bindParam(':password', $password);
////    $stmt->bindParam(':role_id', $role_id);
////
////    if ($stmt->execute()) {
////        // Registration successful
////        $_SESSION['registration_success'] = true;
////        header('Location: login.html'); // Redirect to the login page
////        exit();
////    } else {
////        // Registration failed
////        $_SESSION['registration_error'] = "Registration failed. Please try again.";
////        header('Location: register.html'); // Redirect back to the registration form
////        exit();
////    }
////} else {
////    // Invalid request method
////    header('Location: register.html'); // Redirect back to the registration form
////    exit();
////}




// Include database connection
include __DIR__ . '/../connention-database/connection.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Function to sanitize input data
function input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Variables from the form
    $name = input($_POST['name']);
    $email = input($_POST['email']);
    $description = input($_POST['description']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role_id = 1; // Assuming default role is 1

    // Prepare SQL statement for user registration
    $stmt = $conn->prepare('INSERT INTO users (name, email, password, description, role_id) VALUES (:name, :email, :password, :description, :role_id)');

    // Bind parameters
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':role_id', $role_id);

    if ($stmt->execute()) {
        echo "Registration successful";
        ?>
        <a href="../index.php">Go to inlog</a>
        <?php

        // Handle file upload only if user registration was successful
        if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == UPLOAD_ERR_OK) {
            $target_dir = "./images/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

            // Check if the uploaded file is an image
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                // Move uploaded file to target directory
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    // Insert file path into the database
                    $stmt = $conn->prepare("INSERT INTO image_path (img, user_id) VALUES (:file_path, LAST_INSERT_ID())");
                    $stmt->bindParam(':file_path', $target_file);
                    if ($stmt->execute()) {
                        echo "Image uploaded successfully and inserted into the database.";
                    } else {
                        echo "Error inserting image path into the database.";
                    }
                } else {
                    echo "Error uploading file.";
                }
            } else {
                echo "File is not an image.";
            }
        } else {
            echo "No file uploaded.";
        }
    } else {
        // Registration failed
        echo "Registration failed. Please try again.";
    }
} else {
    // Registration failed
    echo "u suck. skill issue thb";
}

// Directory where images are stored
$imageDirectory = "images/";
echo 'file found';

// Fetch image file names from the directory
$imageFiles = glob($imageDirectory . "*");

// Iterate through each image file
foreach ($imageFiles as $imageFile) {
    // Output an <img> tag for each image
    echo '<img src="' . $imageFile . '" alt="Image">';
}


?>
