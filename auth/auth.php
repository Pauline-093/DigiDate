<?php
//session_start();

$servername = "localhost";
$username = "pauline";
$password = "root";
$dbname = "digidate";


try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/*Always have set PDO::ATTR_ERRMODE to PDO::ERRMODE_EXCEPTION in your PDO connection code. It will let the database tell you what the actual problem is*/

echo " ";
} catch (PDOException $e) {
echo "Connection failed: " . $e->getMessage();
}


session_start();
$stmt = $conn->prepare("
SELECT email, password FROM users
WHERE email = :email
AND password = :password
");
$stmt->bindValue(":email", $_POST['email']);
$stmt->bindValue(":password", $_POST['password']);
$stmt->execute();
echo 1;


//
//$user = $stmt->fetch(PDO::FETCH_OBJ);
//$q= $conn->prepare("SELECT uuid, role FROM users
//                          WHERE email = :email
//                          AND password = :password
//                          ");
//$q->bindValue(":email", $_POST['email']);
//$q->bindValue(":password", $_POST['password']);
//$q->execute();
//$uuid = $q->fetchColumn();

$UserPrep = $conn -> prepare("SELECT * FROM users WHERE email = :email AND password = :password;");
$UserPrep -> bindValue(':email', $_POST['email']);
$UserPrep -> bindValue(':password', $_POST['password']);
$UserPrep -> execute();
$user = $UserPrep ->fetch(PDO::FETCH_BOTH);



if ($user) {
// login successful
$_SESSION["logged_in"] = true;
if ($user['role_id'] == 1) {
$_SESSION['id'] = $user['id'];
$_SESSION['admin'] = true;
$_SESSION['user'] = false;
header("Location: ../pages/homeOwner.php");
echo 1;
} else if ($user['role_id'] == 2){
$_SESSION['id'] = $user['id'];
$_SESSION['admin'] = false;
$_SESSION['user'] = true;
    header("Location: ../pages/MainAdmin.php");
echo 2;
}
exit;
} else {
// login failed
header("Location: ../index.php");
}

/*
phpinfo();
apache on
*/

/////////////////////////////-->
//<?php
//session_start();
//
//$servername = "localhost";
//$username = "pauline";
//$password = "root";
//$dbname = "digidate";
//
//try {
//$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//echo "<a href='../pages/homeOwner.php'>Go to your home page</a>";
//} catch (PDOException $e) {
//echo "Connection failed: " . $e->getMessage();
//}
//
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
//$email = $_POST['email'];
//
//$stmt = $conn->prepare("SELECT U.id, U.email, U.password, U.name, R.role FROM users U INNER JOIN roles R ON U.role_id = R.id WHERE email = :email");
//$stmt->bindValue(":email", $email);
//$stmt->execute();
//
//
//$user = $stmt->fetch(PDO::FETCH_ASSOC);
//
//if ($user) {
//    if (password_verify($_POST['password'], $user['password'])) {
//    $_SESSION["logged_in"] = true;
//    $_SESSION["id"] = $user['id'];
//    $_SESSION['name'] = $user['name'];
//    $_SESSION['role'] = $user['role'];
//
//if ($user['role'] == 'admin') {
//    $_SESSION['admin'] = true;
//    $_SESSION['user'] = false;
//}
//else {
//
//    $_SESSION['admin'] = false;
//    $_SESSION['user'] = true;
//    function customError($errno, $errstr) {
//    set_error_handler("Wrong inlog... try again!");
//    echo "<b>Error:</b> [$errno] $errstr";}
//
//}
//header("Location: ../../pages/homeOwner.php");
//
//exit;
//} else {
//header("Location: ../index.php");
//
//exit;
//}
//} else {
//header("Location: ../index.php");
//exit;
//}
//} else {
//header("Location: ../index.php");
//exit;
//}
//?>
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<?php
////$servername = "localhost";
////$username = "pauline";
////$password = "root";
////$dbname = "digidate";
////
////
////
////try {
////    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
////    // set the PDO error mode to exception
////    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
////
////    echo ""; ?>
<!--<!--    <a href="../pages/homeOwner.php">Go to ur home page</a>-->-->
<!--<!---->-->
<!--<!--    -->--><?php
////} catch (PDOException $e) {
////    echo "Connection failed: " . $e->getMessage();
////}
////
////
////session_start();
////$stmt = $conn->prepare("
////    SELECT U.email, U.password, U.name, R.role FROM users U
////        INNER JOIN roles R
////        ON U.role_id = U.role_id
////        WHERE email = :email
////");
////
////$stmt->bindValue(":email", $_POST['email']);
////$stmt->execute();
////
////$user = $stmt->fetch(PDO::FETCH_ASSOC);
////
//////password_verify($_POST['password'], $hash);
////
/////*
////$user = $stmt->fetch(PDO::FETCH_OBJ);
////$q= $conn->prepare("SELECT role FROM users
////                          WHERE email = :email
////                          ");
////$q->bindValue(":email", $_POST['email']);
////$q->bindValue(":password", $_POST['password']);
////$q->execute();
////$uuid = $q->fetchColumn();
////*/
////
////if ($user) {
////    // login successful
////    $_SESSION["logged_in"] = true;
////    if ($user->role == 'admin') {
////        $role_id =$role;
////        $_SESSION['role'] = $role;
////        $_SESSION['admin'] = true;
////        $_SESSION['user'] = false;
////        header("Location: ../pages/homeOwner.php");
////    } else if ($user->role_name == 'customer'){
////        $role_id =$role;
////        $_SESSION['role'] = $role;
////        $_SESSION['admin'] = false;
////        $_SESSION['user'] = true;
////        header("Location: ../pages/homeOwner.php");
////    }
////    exit;
////} else {
////    // login failed
////    header("Location: ../index.php");
////}
////
////
/////*
//// *
//// *
//// *
//// *
//// *
//// *
//// *
//// *
//// *
//// *
//// *
//// *
////phpinfo();
////apache on
////*/
////
//////
//////session_start();
//////
//////include 'connention-database/connection.php';
//////
//////if ($_SERVER["REQUEST_METHOD"] == "POST") {
//////    $name = $_POST['name'];
//////    $email = $_POST['email'];
//////    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
//////
//////    // Assuming your users table has columns like name, email, password, and role_id
//////    $stmt = $conn->prepare('INSERT INTO users (name, email, password, FK_role_id) VALUES (:name, :email, :password, :role_id)');
//////
//////    // You may set a default role_id for new users, adjust this according to your roles structure
//////    $defaultRoleId = 1;
//////
//////    $stmt->bindParam(':name', $name);
//////    $stmt->bindParam(':email', $email);
//////    $stmt->bindParam(':password', $password);
//////    $stmt->bindParam(':role_id', $defaultRoleId);
//////
//////    if ($stmt->execute()) {
//////        // Registration successful
//////        $_SESSION['registration_success'] = true;
//////        header('Location: login.html'); // Redirect to the login page
//////        exit();
//////    } else {
//////        // Registration failed
//////        $_SESSION['registration_error'] = "Registration failed. Please try again.";
//////        header('Location: register.html'); // Redirect back to the registration form
//////        exit();
//////    }
//////} else {
//////    // Invalid request method
//////    header('Location: register.html'); // Redirect back to the registration form
//////    exit();
//////}
//////
//////
//////
