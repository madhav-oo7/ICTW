<?php
    session_start();
    require_once "config.php";
    // require_once "payment.html";
    // if($_SERVER["REQUEST_METHOD"] == "POST"){
        $otp = rand(100000,999999);
        $sr = $_SESSION["logged_id"];
        $sql = "SELECT * FROM `account_data` WHERE `sr` = '$sr'";
        $result = mysqli_query($link, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $email = $row["email"];
            break;
        }
        $otp = rand(100000,999999);
        $subject = "OTP for payment";
        $headers = "From: hotelmanagement.noreply@gmail.com\r\n";
        if (mail($email, $subject, $otp, $headers)){
            // session_start();
            $_SESSION['otp_payment'] = $otp;
            header("location:payment_otp.php");
        } else {
        echo "ERROR";
        }
    // }
?>