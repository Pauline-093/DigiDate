<?php
//
//$servername = "localhost";
//$username = "pauline";
//$password = "root";
//$dbname = "digidate";
//
//try {
//    $conn = new PDO("mysql:host=$servername;digidate", $username, $password);
//    // set the PDO error mode to exception
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Connected successfully";
//} catch(PDOException $e) {
//    echo "Connection failed: " . $e->getMessage();
//}
//?>
<?php
$servername = "localhost";
$username = "pauline";
$password = "root";
$dbname = "digidate";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Optional: Set the character set if needed
    $conn->exec("SET NAMES 'utf8'");
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
