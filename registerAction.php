<?php

include 'config.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function sendemail($r_email, $r_username, $token)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
    $mail->isSMTP(); //Send using SMTP
    $mail->SMTPAuth = true; //Enable SMTP authentication

    $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
    $mail->Username = 'detawebsite@gmail.com'; //SMTP username
    $mail->Password = 'xswvznjjjsmucday'; //SMTP passworddd

    $mail->SMTPSecure = 'ssl'; //Enable implicit TLS encryption
    $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('from@example.com', 'DeTa Website');
    $mail->addAddress($r_email); //Add a recipient

    //Content
    $mail->isHTML(true); //Set email format to HTML
    $mail->Subject = 'Email Verfification';
    $email_template = "
         <h2>You have create an account successfully</h2>
         <h4>Verify your email address using the below given Link</h4>
         <br><br>
         <a href='http://localhost/deta/verifyemail.php?token=$token'>Verification Link</a>
     ";

    $mail->Body = $email_template;

    $mail->send();

}

if (isset($_POST['signup'])) {
    $r_fname = ucwords($_POST['r_fname']);
    $r_lname = ucfirst($_POST['r_lname']);
    $r_username = $_POST['r_username'];
    $r_email = $_POST['r_email'];
    $r_pass = $_POST['r_pass'];
    $r_con_pass = $_POST['r_con_pass'];
    $r_address = $_POST['r_address'];
    $r_mobile = $_POST['r_mobile'];
    $r_city = $_POST['r_city'];
    $r_dob = $_POST['r_dob'];
    $r_gender = $_POST['gender'];
    $token = md5(rand());


    $firstName_pattern = "/^[A-Za-z .]{2,}$/";
    $lastName_pattern = "/^[A-Za-z]{2,}$/";
    $userName_pattern = "/[a-z0-9 ._]{3,30}/";
    $phoneNumber_pattern = "/(\+88)?-?01[3-9]\d{8}/";
    $email_pattern = "/^[a-z0-9_.+-]+@(gmail\.com|yahoo\.com|hotmail\.com|outlook\.com|lus\.ac\.bd)$/";
    $pass_pattern = "/(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%&*()]).{6,20}/";

    $insert_query = "INSERT INTO `users`(`firstname`, `lastname`, `username`, `email`, `pass`, `address`, `mobile`, `city`, `dob`, `gender`, `token`)
    VALUES ('$r_fname',' $r_lname',' $r_username','$r_email','$r_pass','$r_address','$r_mobile','$r_city','$r_dob','$r_gender','$token')";

    $dupelicate_username = mysqli_query($conn, "SELECT * FROM `users` WHERE username = '$r_username'");
    $dupelicate_email = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$r_email'");

    if (!preg_match($firstName_pattern, $r_fname)) { //firstName Match
        echo "<script>alert('Invalid Firstname!!')</script>";
        echo "<script>location.href='register.php'</script>";
    }else if (!preg_match($lastName_pattern, $r_lname)) { //lastName Match
        echo "<script>alert('Invalid Lastname!!')</script>";
        echo "<script>location.href='register.php'</script>";
    }else if (!preg_match($userName_pattern, $r_username)) { //userName Match
        echo "<script>alert('Invalid Username!!')</script>";
        echo "<script>location.href='register.php'</script>";
    } else if (!preg_match($email_pattern, $r_email)) { //Email Match
        echo "<script>alert('Invalid Email. Please Try Again..!!')</script>";
        echo "<script>location.href='register.php'</script>";
    } else if (!preg_match($phoneNumber_pattern, $r_mobile)) { //PhoneNumber Match
        echo "<script>alert('Invalid Phone Number.')</script>";
        echo "<script>location.href='register.php'</script>";
    } else if (!preg_match($pass_pattern, $r_pass)) { //Password check
        echo "<script>alert('Invalid Password..!!')</script>";
        echo "<script>location.href='register.php'</script>";
    } else if ($r_pass !== $r_con_pass) { //confirm password check
        echo "<script>alert('Password & Confirm Password do not match..!!')</script>";
        echo "<script>location.href='register.php'</script>";
    } else if (mysqli_num_rows($dupelicate_username) > 0) { //duplicate username check from db
        echo "<script>alert('This Username is already taken..!!')</script>";
        echo "<script>location.href='register.php'</script>";
    } else if (mysqli_num_rows($dupelicate_email) > 0) { //duplicate email check from db
        echo "<script>alert('This email is already taken..!!')</script>";
        echo "<script>location.href='register.php'</script>";
    } else {
        if (!mysqli_query($conn, $insert_query)) {
            die("Not Inserted!!");
        } else {
            sendemail("$r_email", "$r_username", "$token");
            echo "<script>alert('Account Created Successfully!')</script>";
            echo "<script>location.href='login.php'</script>";
        }
    }
} else {
    echo "<script>alert('Not Accessible!')</script>";
    echo "<script>location.href='register.php'</script>";
}

?>