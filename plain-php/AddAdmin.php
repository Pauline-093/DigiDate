<?php
//include '../connention-database/connection.php';
//
//$name = $_POST['name'] ?? '';
//$email = $_POST['email'] ?? '';
//$role_id = $_POST['role_id'] ?? '';
//
//$sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
//
//$statement = $conn->prepare($sql);
//$statement->bindParam(':name', $name, PDO::PARAM_STR);
//$statement->bindParam(':email', $email, PDO::PARAM_STR);
//$statement->bindParam(':role_id', $role_id, PDO::PARAM_INT);
//
//$statement->execute();
//
//header('Location: ../pages/vieuwAdmin.php');
//exit;
//?>
<!---->
<?php
include '../connention-database/connection.php';

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$role_id = $_POST['role_id'] ?? '';

$sql = "INSERT INTO users (name, email, role_id, password) VALUES (:name, :email, :role_id, :password)";

$statement = $conn->prepare($sql);
$statement->bindParam(':name', $name, PDO::PARAM_STR);
$statement->bindParam(':email', $email, PDO::PARAM_STR);
$statement->bindParam(':password', $password, PDO::PARAM_STR);
$statement->bindParam(':role_id', $role_id, PDO::PARAM_INT);

$statement->execute();

header('Location: ../pages/vieuwAdmin.php');
exit;
?>
