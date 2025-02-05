<?php

session_start();

include 'config.php';
$seat = implode(",", $_SESSION['seatSelect']);
if (isset($_SESSION['username'])) {
  $loggedInUser = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '{$_SESSION['username']}'");
}


$row = mysqli_fetch_assoc($loggedInUser);


$reg_email = $row['email'];
$serial = mt_rand(0, 999999);
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
$mail->Subject = 'Ticket Confirmation';
$email_template = "Thank you for confirming ticket with us.<br><br>
                  Here is your ticket information: <br>
                  Ticket serial no: $serial <br>
                  Name: {$_SESSION['fullName']}<br>
                  Movie Name: {$_SESSION['moviename']}<br>
                  Email: {$_SESSION['email']}<br>
                  Theatre: {$_SESSION['theaterSelect']}<br>
                  Date: {$_SESSION['dateSelect']}<br>
                  Time: {$_SESSION['timeSelect']}<br>
                  Seat: $seat <br><br>
                  Stay tuned with DeTa.";

$mail->Body = $email_template;

$mail->send();
// echo 'Message has been sent';

if ($mail) {
  //echo "<script>location.href='ticketinfo.php'</script>";
  echo "<script>alert('Thank You!!')</script>";
} else {
  echo "<script>alert('Faield to send OTP!!')</script>";
  echo "<script>history.back()</script>";
}

$seat = implode(",", $_SESSION['seatSelect']);
$insert_query = "INSERT INTO `ticket_info`(`serial_no`,`Movie_Title`, `Buyer Name`, `Buyer Email`, `Buyer Phone`, `Theatre`, `Date`, `time_slot`, `Seats`, `Price`) VALUES
 ('$serial','{$_SESSION['moviename']}','{$_SESSION['fullName']}','{$_SESSION['email']}','{$_SESSION['phoneNumber']}','{$_SESSION['theaterSelect']}','{$_SESSION['dateSelect']}','{$_SESSION['timeSelect']}','$seat','{$_SESSION['price']}')";

if (!mysqli_query($conn, $insert_query)) {
  die("Not Inserted!!");
} else {
  echo "<script>alert('Your review submitted Successfully!')</script>";
  //echo "<script>location.href='userReview.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Movie Ticket</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .card {
      width: 500px;
      /* standard card width */
      border: 2px solid #007bff;
      /* blue border */
      border-radius: 10px;
      /* rounded corners */
      background-color: #f8f9fa;
      /* light gray background */
      margin: 20px;
      /* add margin for spacing */

    }

    .card-img-top {
      height: 100px;
      /* standard image height */
      object-fit: cover;
    }

    .card-body {
      padding: 1.25rem;
      text-align: center;
      /* center-align content */
    }

    .card-title {
      font-size: 1.25rem;
      /* larger title font size */
      margin-bottom: 0.5rem;
    }

    .card-text {
      font-size: 0.875rem;
      /* smaller text font size */
    }

    .list-group-item {
      font-size: 0.75rem;
      /* smaller list item font size */
      border: none;
      /* remove list item borders */
      padding-left: 0;
      /* remove left padding */
    }

    .btn {
      font-size: 0.875rem;
      /* smaller button font size */
      padding: 0.375rem 1rem;
      /* smaller button padding */
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="row justify-content-center"> <!-- Center the content -->
      <div class="col-md-4">
        <div class="row justify-content-center">
          <div class="card shadow">
            <img src="image/reel.jpg" class="card-img-top" alt="Movie Poster">
            <div class="card-body">
              <h5 class="card-title">Movie Title: <?php echo $_SESSION['moviename'] ?></h5>
              <p class="card-text">Here is your ticket.. Please bring this ticket with your gf or bf else no entry!!!.</p>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Serial No: <?php echo $serial ?></li>
                <li class="list-group-item">Date:<?php echo $_SESSION['dateSelect'] ?></li>
                <li class="list-group-item">Time: <?php echo $_SESSION['timeSelect'] ?></li>
                <li class="list-group-item">Theater Name: <?php echo $_SESSION['theaterSelect'] ?></li>
                <li class="list-group-item">Seat:
                  <?php
                  $selectedSeats = $_SESSION['seatSelect'];
                  $count = count($selectedSeats);
                  foreach ($selectedSeats as $index => $selectedSeat) {
                    // Echo each selected seat
                    echo $selectedSeat;
                    // Add comma if it's not the last element
                    if ($index < $count - 1) {
                      echo ", ";
                    }
                  }
                  ?>
                </li>
              <a href="#" class="btn btn-primary mt-3" onclick="window.print();">Print Ticket</a>
              <a href="ticket.php" class="btn btn-primary mt-3">Buy another</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</body>

</html>