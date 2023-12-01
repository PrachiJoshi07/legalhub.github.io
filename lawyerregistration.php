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

// echo "<pre>";
// print_r($_POST);die();
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$Location = $_POST['Location'];
$phone_number = $_POST['phone_number'];
$experience_in_areas = $_POST['experience_in_areas'];
$practice_areas = $_POST['practice_areas'];
$organisation = $_POST['organisation'];
$create_password = md5($_POST['create_password']);
$confirm_password = $_POST['confirm_password'];

$sql = "INSERT INTO `new_lawyer_registration_form` (full_name,email,`Location`,phone_number,experience_in_areas,practice_areas,organisation,create_password,confirm_password)
VALUES ('$full_name','$email','$Location','$phone_number','$experience_in_areas','$practice_areas','$organisation','$create_password','$confirm_password')";

$sql2 = "INSERT INTO `lawyer_login` (username,`password`)
VALUES ('$email', '$create_password')";

if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {

  $sql3 = "SELECT `id` from `new_lawyer_registration_form` order by `id` desc LIMIT 1";
  $result = $conn->query($sql3);
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $lawyer_id = $row['id'];
    }
  }

  if (!empty($_FILES['profile-image'])) {
    // print_r($_FILES['profile-image']);
    // die();
    $file_tmp = $_FILES['profile-image']['tmp_name'];
    if (!empty($file_tmp)) {
      $file_name = "images/profile_images/" . $lawyer_id . "-" . $_FILES['profile-image']['name'];
      $location = "C:/xampp/htdocs/legalproject";
      $file_location = $location . "/" . $file_name;

      if (!is_dir('images/profile_images/')) {
        mkdir("images/profile_images/", 0777, true);
      }

      if (move_uploaded_file($file_tmp, $file_location)) {
        chmod($file_location, 0777);
        $file_name = $lawyer_id . "-" . $_FILES['profile-image']['name'];
        $sql4 = "UPDATE `new_lawyer_registration_form` SET `profile_image` = '$file_name' WHERE `id` = $lawyer_id ";
        if (mysqli_query($conn, $sql4) === TRUE) {
          echo "profile-image uploaded successfully";
        } else {
          echo "Error";
        }
      }
    }
  }
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: http://localhost/legalproject/lawyerlogin.html");
?>