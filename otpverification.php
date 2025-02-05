<?php
session_start();
if (!isset($_SESSION['otp'])) {
    echo "<script>alert('Not Accessible!')</script>";
    echo "<script>location.href='buyticket.php'</script>";
}

include 'config.php';

// Check if form is submitted for OTP verification
if (isset($_POST['verifyBtn'])) {
    $otp = $_POST['otp'];
    // Compare user inputted OTP with stored OTP
    if ($otp == $_SESSION['otp']) {
        echo "<script>alert('OTP verified successfully!')</script>";
        echo "<script>location.href='ticketinfo.php'</script>";

    } else {
        echo "<script>alert('Incorrect OTP! Please try again.')</script>";
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OPT Verification</title>
     <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        /* Add custom styles here */
        .container {
            max-width: 500px;
            margin: 50px auto;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 0px 50px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #ffffff;
            /* White color */
            color: #333;
            /* Dark gray text color */
            text-align: center;

        }


        .btn-verify:hover {
            background-color: #555;
            /* Slightly darker gray on hover */
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <img src="image/otp.jpg" alt="otp Logo" class="otp-logo" style="height: 150px ; width: 200px">

            </div>
            <div class="card-body">
                <form action="otpverification.php" method="POST">
                    <div class="form-group">
                        <label for="otp">OTP</label>
                        <input type="number" class="form-control" name="otp" placeholder="Enter OTP">
                    </div>
                    <button type="submit" name="verifyBtn" class="btn btn-lg btn-block btn-verify">VERIFY</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>