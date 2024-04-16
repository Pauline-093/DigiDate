<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content=
    "width=device-width, initial-scale=1.0">
</head>

<body>
<?php

include "../connention-database/connection.php";

session_start();

$stmt = $conn->prepare('select * from image_path');
$stmt->execute();
$imagelist = $stmt->fetchAll();

foreach($imagelist as $image) {
    ?>

    <img src="<?=$image['img']?>"
         title="<?=$image['name'] ?>"
         width='200' height='200'>
    <?php
}
?>
</body>

</html>
