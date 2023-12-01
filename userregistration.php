<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "legal";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$email = $_POST['email'];
$Create_Password = md5($_POST['Create_Password']);
$confirm_password = $_POST['confirm_password'];


$sql = "INSERT INTO `user_registration` (username,email)
VALUES ('$username', '$email')";

$sql2 = "INSERT INTO `user_login` (username,`password`)
VALUES ('$username', '$Create_Password')";


if ($conn->query($sql) === TRUE) {
  echo "Registered succesfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

if ($conn->query($sql2) === TRUE) {
  echo "Login added succesfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
die();
header("Location: http://localhost/legalproject/userlogin.html");
?>