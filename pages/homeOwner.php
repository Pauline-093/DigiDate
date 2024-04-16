<?php
//// Error reporting and database connection
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
//include '../connention-database/connection.php';
//
//// Fetch image data from database
//$imageId = 1; // Assuming you have a specific image ID here
//$sql = "SELECT img FROM image_path WHERE id = :id";
//$stmt = $conn->prepare($sql);
//$stmt->bindParam(':id', $imageId);
//$stmt->execute();
//$imageData = $stmt->fetch(PDO::FETCH_ASSOC);
//$stmt->closeCursor();
//?>
<!---->
<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <title>Home Page</title>-->
<!--    <link href="../Stylesheet/output.css" rel="stylesheet">-->
<!--    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">-->
<!--</head>-->
<!--<body class="bg-slate-700 items-center justify-center">-->
<!--<div class="w-80 mx-auto py-6 sm:px-6 lg:px-8 bg-slate-600 rounded-lg ">-->
<!--    <div class="bg-slate-400 overflow-hidden shadow-sm sm:rounded-lg">-->
<!--        <div class="p-6 bg-white border-b border-gray-200">-->
<!--            <table class="min-w-full divide-y divide-gray-200">-->
<!--                <thead class="bg-gray-50">-->
<!--                <tr>-->
<!--                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">-->
<!--                        Name-->
<!--                    </th>-->
<!--                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">-->
<!--                        Description-->
<!--                    </th>-->
<!--                </tr>-->
<!--                </thead>-->
<!--                <tbody class="bg-white divide-y divide-gray-200">-->
<!--                --><?php
//                session_start();
//
//                try {
//                    if(isset($_SESSION['id'])) {
//                        $globalid = $_SESSION['id'];
//                        $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
//                        $stmt->bindValue(1, $globalid);
//                        $stmt->execute();
//                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//                        foreach ($result as $row) {
//                            echo "<tr>";
//                            echo "<td class='px-6 py-4 whitespace-nowrap'>" . $row['name'] . "</td>";
//                            echo "<td class='px-6 py-4 whitespace-wrap break-words'><textarea class='w-full'>" . $row['description'] . "</textarea></td>";
//                            echo "</tr>";
//                        }
//
//                        if (empty($result)) {
//                            echo "<tr><td colspan='2' class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>No data found</td></tr>";
//                        }
//                    } else {
//                        echo "<tr><td colspan='2' class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>Session ID not set</td></tr>";
//                    }
//                } catch (PDOException $e) {
//                    echo "<tr><td colspan='2' class='px-6 py-4 whitespace-nowrap text-sm text-red-500'>Query failed (database failed): " . $e->getMessage() . "</td></tr>";
//                }
//                ?>
<!--                </tbody>-->
<!--            </table>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    <div class="eerste_div">-->
<!--        <h2 class="font-medium text0 text-white">Images from Database...</h2>-->
<!--        --><?php //if ($imageData && $imageData['img']): ?>
<!--            <img src="--><?//= $imageData['img'] ?><!--" alt="Image from Database">-->
<!--        --><?php //else: ?>
<!--            <p>No image found.</p>-->
<!--        --><?php //endif; ?>
<!--    </div>-->
<!---->
<!--    <div class="eerste_div">-->
<!--        <h2 class="font-medium text0 text-white">Images from Directory...</h2>-->
<!--        --><?php
//        // Directory where images are stored
//        $imageDirectory = "../images/";
//        // Fetch image file names from the directory
//        $imageFiles = glob($imageDirectory . "*");
//        // Iterate through each image file
//        foreach ($imageFiles as $imageFile): ?>
<!--            <img src="--><?//= $imageFile ?><!--" alt="Image" class="border-black py-2 h-24s">-->
<!--        --><?php //endforeach; ?>
<!--    </div>-->
<!--</div>-->
<!---->
<!--<button class="bg-pink-700 border-black bottom-10 left-2.5 hover:bg-cyan-950" type="button">Go back to login-->
<!--    <a class="text-white" href="../index.php"></a>-->
<!--</button>-->
<!---->
<!--</body>-->
<!--</html>-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="../Stylesheet/output.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-slate-700 flex items-center justify-center h-screen">

<div class="absolute inset-x-0 top-0 h-16 bg-[url('../background/th-3091870912.jpg')] bg-slate-900 bg-cover bg-center flex items-center justify-center">
    <ul class="flex items-center justify-start w-full pl-4">
        <!-- Adjusted the structure to make it valid -->
        <!-- <li><a class="bg-black text-white"href="../pages/homeOwner.php">Home</a></li> -->
        <li><a class="bg-black py-2 px-4 text-white rounded-md hover:bg-cyan-950" href="../index.php">Go back to login</a></li>
    </ul>
</div>


<script src="
    https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js
    "></script>
<link href="
    https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css
    " rel="stylesheet">

<?php
    session_start();
//    include '../pages/nav.php';
//      include '../pages/header.php';
?>


<div class="grid grid-cols-1 md:grid-cols-2 gap-4 max-w-7xl mx-auto py-6 sm:px-6 lg:px-8 bg-[url('background/hero-paterns')]">
    <div class="">
<!--        'hero-pattern': "url('background/th-1738543166.jpg')",}-->
<x></x>

        <div class="bg-slate-600 border-black border-2 rounded-lg p-6 mb-3">
        <div class="bg-slate-400 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Name
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    <?php
                    include '../connention-database/connection.php';
                    try {
                        if(isset($_SESSION['id'])) {
                            $globalid = $_SESSION['id'];
                            $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
                            $stmt->bindValue(1, $globalid);
                            $stmt->execute();
                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result as $row) {
                                echo "<tr>";
                                echo "<td class='px-6 py-4 whitespace-nowrap'>" . $row['name'] . "</td>";
                                echo "</tr>";
                            }
                            if (empty($result)) {
                                echo "<tr><td colspan='2' class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>No data found</td></tr>";
                            }
                        } else {
                            echo "<tr><td colspan='2' class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>Session ID not set</td></tr>";
                        }
                    } catch (PDOException $e) {
                        echo "<tr><td colspan='2' class='px-6 py-4 whitespace-nowrap text-sm text-red-500'>Query failed (database failed): " . $e->getMessage() . "</td></tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="grid grid-rows-2 gap-4">
        <div class="bg-slate-600 border-2 border-black rounded-lg p-6">
            <div class="eerste_div">
                <table class="min-w-full divide-y divide-gray-200">

                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="bg-blue-50 p-1 rounded-lg mb-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Description
                        </th>
                    </tr>
                    <?php
                    echo "<tr>";
                    echo "<td class='px-6 py-4 mt-4 border-black bg-slate-900 whitespace-wrap break-words rounded-lg'><textarea class='w-full rounded-lg text-white bg-slate-700 text-center'>" . $row['description'] . "</textarea></td>";
                    echo "</tr>";
                    ?>
                    </thead>
                </table>

                <?php if (isset($imageData) && $imageData && isset($imageData['img'])): ?>
                    <img src="<?= $imageData['img'] ?>" alt="Image from Database" class="mt-4">
                <?php else: ?>
<!--                    <p class="mt-4">No image found.</p>-->
                <?php endif; ?>
            </div>
        </div>
<!---->
<!---->
<!---->
<!--        <div class="bg-slate-600 rounded-lg p-6">-->
<!--            <div class="eerste_div">-->
<!--                <h2 class="font-medium text-white">Images from Directory...</h2>-->
<!--                --><?php
//                $imageDirectory = "../images/";
//                $imageFiles = glob($imageDirectory . "*");
//                foreach ($imageFiles as $imageFile): ?>
<!--                    <img src="--><?//= $imageFile ?><!--" alt="Image" class="border-black py-2 h-24">-->
<!--                --><?php //endforeach; ?>
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
            <div class="bg-slate-600 border-black border-2 rounded-lg p-6">
                <div class="eerste_div ">
                    <h2 class="font-medium text-white">Images from Directory...</h2>
                    <div class="grid grid-cols-3 gap-4">
                        <?php
                        $imageDirectory = "../images/";
                        $imageFiles = glob($imageDirectory . "*");
                        foreach ($imageFiles as $imageFile): ?>
                            <div class="diagonal-border-container">
                                <img src="<?= $imageFile ?>" alt="Image" class="diagonal-border">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>


    </div>
<!--<button class="bg-pink-700 border-black bottom-10 left-2.5 hover:bg-cyan-950 fixed">-->
<!--    <a class="text-white" href="../index.php"> go back to login</a>-->
<!--</button>-->
</body>
</html>
