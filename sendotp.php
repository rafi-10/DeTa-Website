<?php
session_start();
include 'config.php';

if (isset($_SESSION['username'])) {
    $loggedInUser = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '{$_SESSION['username']}'");
}

$row = mysqli_fetch_assoc($loggedInUser);


$reg_email = $row['email'];
$_SESSION['otp'] = mt_rand(1000, 9999);

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
// $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
$mail->isSMTP(); //Send using SMTP
$mail->SMTPAuth = true; //Enable SMTP authentication

$mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
$mail->Username = 'detawebsite@gmail.com'; //SMTP username
$mail->Password = 'xswvznjjjsmucday'; //SMTP passworddd

$mail->SMTPSecure = 'ssl'; //Enable implicit TLS encryption
$mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//Recipients
$mail->setFrom('from@example.com', 'DeTa Website');
$mail->addAddress($reg_email); //Add a recipient

//Content
$mail->isHTML(true); //Set email format to HTML
$mail->Subject = 'OTP Confirmation';
$email_template = "Dear Customer,<br><br>
                   {$_SESSION['otp']} is your OTP verification code.<br>
                   Please do NOT share your OTP with others !!.";

$mail->Body = $email_template;

$mail->send();
// echo 'Message has been sent';

if ($mail) {
    echo "<script>location.href='otpverification.php'</script>";
} else {
    echo "<script>alert('Faield to send OTP!!')</script>";
    echo "<script>history.back()</script>";
}
