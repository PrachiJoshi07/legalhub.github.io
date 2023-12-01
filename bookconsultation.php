<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

$servername = "localhost";
$username = "root";
$password = "";
$database = "legal";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (!empty($_POST)) {

  $lawyer_id = $_POST['lawyer_id'];
  $name = $_POST['Name'];
  $email = $_POST['Email'];
  $state = $_POST['State'];
  $city = $_POST['City'];
  $pincode = $_POST['pincode'];
  $address = $_POST['Enter_your_adress'];
  $day = $_POST['day'];
  $time = $_POST['Time'];
  $legal_domain = $_POST['legal-domain'];
  $problem_description = $_POST['problem-description'];

  $sql = "INSERT INTO `book_consultation` (client_name, email, `state`, city, pincode, `address`, `day`, `datetime`, `legal_domain`, problem_description, user_id)
  VALUES ('$name', '$email', '$state', '$city', '$pincode', '$address', '$day', '$time', '$legal_domain', '$problem_description', 1)";

  if ($conn->query($sql) === TRUE) {
    $result = $conn->query("SELECT full_name, email FROM new_lawyer_registration_form WHERE `id` = $lawyer_id ");
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Mailer = "smtp";
        //Server settings
        $mail->SMTPDebug = 1;
        $mail->SMTPAuth = TRUE;
        $mail->SMTPSecure = "tls";
        $mail->Port = 587;
        $mail->Host = "smtp.gmail.com";
        $mail->Username = "legalresourceshub@gmail.com";
        $mail->Password = "uozn wzit mdoh ihjb"; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->IsHTML(true);
        $mail->AddAddress($row['email']);
        $mail->SetFrom("legalresourceshub@gmail.com", "Legal Resources Hub");
        $mail->Subject = "Consultation Booking Request";
        $content = "<b>Dear " . $row['full_name'] . "</b><br>
        We are pleased to inform you that $name has requesting for booking a consultation with you.<br> 
        Details of $name are as follows - <br>
        <ul>
        <li>Full Name : $name</li>
        <li>Email : $email</li>
        <li>Address : $address, $city, $state</li>
        <li>Requested Schedule : <br>$day, " . date('d/m/Y G:i:s', strtotime($time)) . "</li>
        <li>Problem Domain : $legal_domain</li>
        <li>Problem Description : $problem_description</li>
        </ul>";
        $mail->MsgHTML($content);
        if (!$mail->Send()) {
          echo "Email sent Failed";
        } else {
          echo "Email sent successfully";
        }
      }
    }


  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

}

// $conn->close();
?>
<script>
  window.location.href = 'http://localhost/legalproject/chatwithlawyers.php?success=true';
</script>