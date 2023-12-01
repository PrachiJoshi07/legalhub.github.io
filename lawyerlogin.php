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
$password = $_POST['Password'];

$sql = "SELECT * FROM lawyer_login WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if (md5($password) == $row['password']) {
       
        echo "Login successful";
    } else {
       
        echo "Invalid password";
    }
} else {
   
    echo "Username not found";
}

$conn->close();
header("Location: http://localhost/legalproject");
?>
