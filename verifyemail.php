<?php

session_start();

include 'config.php';

if (isset($_GET['token'])) {

    $token = $_GET['token'];
    $verify_query = mysqli_query($conn, "SELECT * FROM users WHERE token = '$token'");
    if (mysqli_num_rows($verify_query) > 0) {
        $row = mysqli_fetch_assoc($verify_query);
        if ($row['verify_status'] == 0) {
            $update_query = mysqli_query($conn, "UPDATE users SET verify_status = '1' WHERE token = '{$row['token']}'");
            if ($update_query) {
                echo "<script>alert('Account Has Been Verified Successfully!!')</script>";
                echo "<script>location.href='login.php'</script>";
            } else {
                echo "<script>alert('Verification Failed!!')</script>";
                echo "<script>location.href='login.php'</script>";
            }
        } else {
            echo "<script>alert('Email Already Verified.!')</script>";
            echo "<script>location.href='login.php'</script>";
        }
    } else {
        echo "<script>alert('This token does not exist!')</script>";
        echo "<script>location.href='login.php'</script>";
    }
} else {
    echo "<script>alert('Not Allowed. Please Try Again!')</script>";
    echo "<script>location.href='login.php'</script>";
}

?>