<?php
session_start();
if (isset($_POST['signin'])) {
    
    include 'config.php';

    $l_email = $_POST['l_email'];
    $l_pass = $_POST['l_pass'];


    $result = mysqli_query($conn, "SELECT * FROM `users` 
            WHERE email = '$l_email' AND BINARY pass = '$l_pass' AND verify_status = '1'");

    if (mysqli_num_rows($result) > 0) {

        $_SESSION['username'] = $l_email;
       // $_SESSION['email'] = $userEmail;
        echo "<script>location.href='home.php'</script>";
    } else {
        $result1 = mysqli_query($conn, "SELECT * FROM `users` 
            WHERE email = '$l_email' AND BINARY pass = '$l_pass' AND verify_status = '0'");
        if (mysqli_num_rows($result1) > 0) {
            echo "<script>alert('Your Account has not been verified yet !!')</script>";
            echo "<script>location.href='login.php'</script>";
        } else {
            echo "<script>alert('Invalid Email or Password.Please Try Again!')</script>";
            echo "<script>location.href='login.php'</script>";
        }
    }
    
} else {
    echo "<script>alert('Not Accessible!')</script>";
    echo "<script>location.href='login.php'</script>";
}

?>