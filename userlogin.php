<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "legal";


$conn = mysqli_connect($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$username = $_POST['Username']; 
$password = md5($_POST['Password']); 

// $sql = "INSERT INTO `user_login` (username, password)
// VALUES ('$username', '$password')";
$sql = "SELECT * from  `user_login` WHERE username = '$username' and `password` = '$password'";

$result = $conn->query($sql);
if (!empty($result)) {
    echo "User Login successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
// die();
$conn->close();
header("Location: http://localhost/legalproject");
?>
