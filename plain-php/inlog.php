<?php

session_start();

include 'connention-database/connection.php';

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->prepare('SELECT r.name as "role", u.name, u.password FROM users u INNER JOIN roles r on u.role_id = r.role_id WHERE email = :email;');

$stmt->bindParam(':email', $email);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['logged_in'] = true;
    $_SESSION['username'] = $user['name'];
    $_SESSION['password'] = $user['password']=true;
    $_SESSION['role'] = $user['role'];

    // Redirect to the home page or wherever you want after successful login
    header('Location: ../index.php?page=home');
    exit();
} else {
    // Redirect to the login page if authentication fails
    header('Location: ../index.php?page=inlog');
    exit();
}
?>
