    <?php
    session_start();
    include '../connention-database/connection.php';

    if(isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $description = $_POST['description'];

        $target_dir = '../images/';
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            if ($_FILES["image"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
            } else {
                $allowed_formats = array("jpg", "jpeg", "png", "gif");
                if (!in_array($imageFileType, $allowed_formats)) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                } else {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        $stmt = $conn->prepare("INSERT INTO image_path (img) VALUES (?)");
                        $stmt->execute([$target_file]);

                        $img_id = $conn->lastInsertId();

                        $stmt = $conn->prepare("INSERT INTO users (img_id, email, password, name, description) VALUES (?, ?, ?, ?, ?)");
                        $stmt->execute([$img_id, $email, $password, $name, $description]);

//                        echo "Registration successful.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            }
        } else {
            echo "File is not an image.";
        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../Stylesheet/output.css" rel="stylesheet">
        <title>Registration</title>
    </head>

    <body class="inset-x-9  items-center flex justify-center bg-slate-700 text-black py-2 ">
    <div class="g w-112 rounded-lg p-8 ">
        <div class="p-6 rounded-lg shadmx-auto max-w-screen-lg ow-md bg-slate-500 w-96 h-90">
            <form method='post' action='' enctype='multipart/form-data'>
                <h1 class="text-2xl font-bold mb-4">Register</h1>

                <div class="p-6 rounded-lg shadow-md bg-slate-600 mt-4">
                    <label for="email" class="text-lg font-bold">Email:</label><br>
                    <input class="pb-2 py-2 px-4 mt-1 border-white rounded-lg w-full" type="email" id="email" name="email" placeholder="email" required><br>

                    <label for="password" class="text-lg font-bold">Password:</label><br>
                    <input class="pb-2 py-2 px-4 mt-1 border-white rounded-lg w-full" type="password" id="password" name="password" placeholder="password" required><br>

                    <label for="name" class="text-lg font-bold">Name:</label><br>
                    <input class="pb-2 py-2 px-4 mt-1 border-white rounded-lg w-full" type="text" id="name" name="name" placeholder="name" required><br>
                </div>

                <div class="p-6 rounded-lg shadow-md bg-slate-600  mt-4">
                    <label class="text-black font-bold" for="description">Description:</label>
                    <textarea placeholder= "Add here a description"class="rounded-lg h-20 w-full p-2" id="description" name="description" required></textarea>
                    <a class="text-white" href="../index.php">------------- ------------- ------------- ------------- </a>
                </div>

                <div class="p-6 rounded-lg shadow-md bg-slate-600  mt-4">
                    <label for="image" class="text-lg">Profile Image:</label><br>
                    <input class="pb-2 py-2 px-4 mt-1 border-white rounded-lg w-full" type="file" id="image" name="image" accept="image/*" required><br>
                    <input type='submit' value='Submit' name='submit' class="mt-4 px-6 py-2 bg-blue-600 text-black font-bold underline-offset-8  rounded-lg hover:bg-blue-700">
                </div>

            </form>
        </div>
        <div class="p-6 rounded-lg shadow-md bg-slate-600  mt-4">
            <div class="items-end -left-4 -top-10 text-blue-950" id="create-account-wrap">
                <p class="text-white font-bold">Already a member?</p>
                <a class="text-white md:underline-offset-4 font-bold" href="../index.php">Go to login</a>
            </div>
        </div>
    </div>
    </body>

    </html>






<!--///////////////-->
<!---->
<!---->
<?php
//
//session_start();
//
//include '../connention-database/connection.php';
//
//$sql = "SELECT img FROM image_path WHERE id = :id"; // Corrected table name
//$id = 1; // Assuming you want to retrieve an image with the ID 1
//$stmt = $conn->prepare($sql);
//$stmt->bindParam(':id', $id); // Corrected variable name
//$stmt->execute();
//$imageData = $stmt->fetch(PDO::FETCH_ASSOC);
//
//$stmt->closeCursor();
//
//?>
<!---->
<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!---->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <link href="../Stylesheet/output.css" rel="stylesheet">-->
<!--    <title>Registration</title>-->
<!--</head>-->
<!--<body class="inset-x-9 top-10 items-center flex justify-center bg-slate-700 text-black py-2">-->
<!--<div class="g">-->
<!--    <div class="p-6 rounded-lg shadow-md bg-slate-500 w-90 h-90">-->
<!--        <form method='post' action='' enctype='multipart/form-data'>-->
<!--            <h1>Register</h1>-->
<!--            <label for="email">Email:</label><br>-->
<!--            <input type="email" id="email" name="email" required><br>-->
<!---->
<!--            <label for="password">Password:</label><br>-->
<!--            <input type="password" id="password" name="password" required><br>-->
<!---->
<!--            <label for="name">Name:</label><br>-->
<!--            <input type="text" id="name" name="name" required><br>-->
<!---->
<!--            <label for="description">Description:</label><br>-->
<!--            <textarea id="description" name="description" required></textarea><br>-->
<!---->
<!--            <label for="image">Profile Image:</label><br>-->
<!--            <input type="file" id="image" name="image" accept="image/*" required><br>-->
<!---->
<!--            <input type='submit' value='Submit' name='submit'>-->
<!--        </form>-->
<!--    </div>-->
<!---->
<!--    <div class="items-end -left-4 -top-10 text-blue-950" id="create-account-wrap">-->
<!--        <p class="text-white">Already a member?</p>-->
<!--        <a class="text-white md:underline-offset-4" href="../index.php">Go to login</a>-->
<!--    </div>-->
<!--</div>-->
<!---->
<?php
//include "../connention-database/connection.php";
//
//if(isset($_POST['submit'])) {
//    // Retrieve form data
//    $email = $_POST['email'];
//    $password = $_POST['password'];
//    $name = $_POST['name'];
//    $description = $_POST['description'];
//    // Handle image upload
//    $target_dir = '../images/';
//    $target_file = $target_dir . basename($_FILES["image"]["name"]);
//    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//
//    // Check if image file is a actual image or fake image
//    if(isset($_POST["submit"])) {
//        $check = getimagesize($_FILES["image"]["tmp_name"]);
//        if($check !== false) {
//            // Check file size
//            if ($_FILES["image"]["size"] > 500000) {
//                echo "Sorry, your file is too large.";
//            } else {
//                // Allow only certain file formats
//                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//                    && $imageFileType != "gif" ) {
//                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//                } else {
//                    // Move uploaded file
//                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
//                        $stmt = $conn->prepare("INSERT INTO image_path (img) VALUES (?)");
//                        $stmt->execute([$target_file]);
//
//                        // Insert user data into users table
//                        var_dump($target_file);
//                        die();
//
//                        $stmt = $conn->prepare("INSERT INTO users (img_id, email, password, name, description) VALUES (?, ?, ?, ?, ?)");
//                        $stmt->execute([$target_file, $email, $password, $name, $description]);
//                        echo "Registration successful.";
//                    } else {
//                        echo "Sorry, there was an error uploading your file.";
//                    }
//                }
//            }
//        } else {
//            echo "File is not an image.";
//        }
//    }
//}
//?>
<!--</body>-->
<!---->
<!--</html>-->
<!---->
<!--</html>-->


<!--///////-->

<?php
//include __DIR__ . '/../connention-database/connection.php';
//
//$sql = "SELECT img FROM image_path WHERE id = :id"; // Assuming your table name is 'images'
//$imageId = 1; // Assuming you want to retrieve an image with the ID 1
//$stmt = $conn->prepare($sql);
//$stmt->bindParam(':id', $id);
//$stmt->execute();
//$imageData = $stmt->fetch(PDO::FETCH_ASSOC);
//
//$stmt->closeCursor();
//
//?>
<!---->
<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!---->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <link href="../Stylesheet/output.css" rel="stylesheet">-->
<!--    <link href="connention-database/connection.php" rel="connet">-->
<!--    <title>Registration</title>-->
<!--</head>-->
<!---->
<!--<body class="inset-x-9 top-10 items-center flex justify-center bg-slate-700 text-black py-2">-->
<!--<div class="g">-->
<!--    <div class="p-6 rounded-lg shadow-md bg-slate-500 w-90 h-90">-->
<!--        <form action="../connention-database/DBregister.php" method="post">-->
<!--            <label class="text-white" for="name">Name:</label>-->
<!--            <input placeholder="Name" class="rounded-lg h-10 w-full p-2" type="text" id="name" name="name" required><br>-->
<!---->
<!--            <label class="text-white" for="email">Email:</label>-->
<!--            <input placeholder="Email" class="rounded-lg h-10 w-full p-2" type="email" id="email" name="email" required><br>-->
<!---->
<!--            <label class="text-white" for="password">Password:</label>-->
<!--            <input placeholder="password" class="rounded-lg h-10 w-full p-2" type="password" id="password" name="password" required><br>-->
<!--            <input class="text-white" type="checkbox" onclick="myFunction()">Show Password-->
<!---->
<!--            <script>-->
<!--                function myFunction() {-->
<!--                    var x = document.getElementById("password");-->
<!--                    if (x.type === "password") {-->
<!--                        x.type = "text";-->
<!--                    } else {-->
<!--                        x.type = "password";-->
<!--                    }-->
<!--                }-->
<!--            </script>-->
<!---->
<!--            <div class="p-6 rounded-lg shadow-md bg-slate-600  mt-4">-->
<!--                <label class="text-white" for="description">Description:</label>-->
<!--                <textarea placeholder= "Add here a description"class="rounded-lg h-20 w-full p-2" id="description" name="description" required></textarea>-->
<!--                <input class="text-white" type="submit" value="Submit Description">-->
<!---->
<!--                <a class="text-white" href="../index.php">Go to inlog</a>-->
<!--            </div>-->
<!---->
<!--            <p class="text-white mb-4">Add some pictures </p>-->
<!---->
<!--            <div class="p-6 rounded-lg shadow-md bg-slate-600 w-90 mt-4">-->
<!--              <action ="../connection-database/vieuw.php" method="post" enctype="multipart/form-data">-->
<!--               <input type="file" name="fileToUpload" id="fileToUpload">-->
<!--               <input type="submit" name="submit">-->
<!--          </div>-->
<!--           <input class="hover:decoration-blue-900 font-medium  sm:text-left" type="submit" value="Register">-->
<!--            <h1>Upload Images</h1>-->
<!---->
<!--            <form method='post' action='../connention-database/vieuw.php'-->
<!--                  enctype='multipart/form-data'>-->
<!--                <input type='file' name='files[]' multiple />-->
<!--                <input type='submit' value='Submit' name='submit' />-->
<!--            </form>-->
<!---->
<!--            <a href="../connention-database/vieuw.php">|View Uploads|</a>-->
<!--            --><?php
//            include "../connention-database/connection.php";
//
//            if(isset($_POST['submit'])) {
//
//                // Count total files
//                $countfiles = count($_FILES['files']['name']);
//
//                // Prepared statement
//                $query = "INSERT INTO image_path (name,image) VALUES(?,?)";
//
//                $statement = $conn->prepare($query);
//
//                // Loop all files
//                for($i = 0; $i < $countfiles; $i++) {
//
//                    // File name
//                    $filename = $_FILES['files']['name'][$i];
//
//                    // Location
//                    $target_file = '../images'.$filename;
//
//                    // file extension
//                    $file_extension = pathinfo(
//                        $target_file, PATHINFO_EXTENSION);
//
//                    $file_extension = strtolower($file_extension);
//
//                    // Valid image extension
//                    $valid_extension = array("png","jpeg","jpg");
//
//                    if(in_array($file_extension, $valid_extension)) {
//
//                        // Upload file
//                        if(move_uploaded_file(
//                            $_FILES['files']['file_path'][$i],
//                            $target_file)
//                        ) {
//
//                            // Execute query
//                            $statement->execute(
//                                array($filename,$target_file));
//                        }
//                    }
//                }
//
//                echo "File upload successfully";
//            }
//            ?>
<!--            </form>-->
<!---->
<!--    </div>-->
<!---->
<!--    <div class="items-end -left-4 -top-10 text-blue-950" id="create-account-wrap">-->
<!--        <p class="text-white">Already a member?</p>-->
<!--        <a class="text-white md:underline-offset-4" href="../index.php">Go to login</a>-->
<!--    </div>-->
<!---->
<!--    <h2>Image from Database</h2>-->
<!---->
<!--    --><?php //if ($imageData && $imageData['img']): ?>
<!--        <!- Display the image if image data exists-->
<!--        <img src="data:image/jpeg;base64,--><?// //= base64_encode($imageData['img']) ?><!--" alt="Image from Database">-->
<!--    --><?php //else: ?>
<!--        <!- Display a placeholder if no image data exists-->
<!--<!-        <p>No image found.</p>-->
<!--    --><?php //endif; ?>
<!---->
<!---->
<!---->
<!--    <div class="g">-->
<!--        <div class="p-6 rounded-lg shadow-md bg-slate-500 w-90 h-90">-->
<!--            <-- Your registration form here-->
<!--        </div>-->
<!---->
<!--        <div class="items-end -left-4 -top-10 text-blue-950" id="create-account-wrap">-->
<!--            <-- Links for login-->
<!--        </div>-->
<!---->
<!--        <h2>Image from Database</h2>-->
<!---->
<!--        --><?php //if ($imageData && $imageData['img']): ?>
<!--            <!- Display the image if image data exists-->
<!--            <img src="data:image/jpeg;base64,--><?// //= base64_encode($imageData['img']) ?><!--" alt="Image from Database">-->
<!--        --><?php //else: ?>
<!--            <- Display a placeholder if no image data exists-->
<!--            <p>No image found.</p>-->
<!--        --><?php //endif; ?>
<!---->
<!--    </div>-->
<!---->
<!---->
<!---->
<!--</div>-->
<!--</body>-->
<!---->
<!--</html>-->