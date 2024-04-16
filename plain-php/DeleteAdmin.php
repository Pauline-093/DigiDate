<?php

include '../connention-database/connection.php';

$id = $_POST['id'];

$sql = 'DELETE FROM users
        WHERE id = :id';

$statement = $conn->prepare($sql);
$statement->bindParam(':id', $id, PDO::PARAM_INT);
$statement->execute();
$_SESSION['deleted'] = true;

header('location: ../pages/vieuwAdmin.php');


if (isset($_GET['id'])) {

    $book_id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM `users` WHERE `id`=:id");
    $stmt->bindParam(":id", $id);

    if ($stmt->execute()) {

        header('location: ../pages/vieuwAdmin.php');

    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
}
?>
<?php

