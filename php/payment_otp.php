
<?php
require_once "config.php";
session_start();
// echo $_SESSION['check_in'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["otp"] == $_SESSION["otp_payment"]) {
        $sr = $_SESSION["logged_id"];
        if ($_SESSION['room_type'] == 1) {
            $_SESSION['payment_amount'] = 10000;
            $amount = 10000;
        } else {
            $_SESSION['payment_amount'] = 17000;
            $amount = 17000;
        }
        $check_in = $_SESSION['check_in'];
$check_out = $_SESSION['check_out'];
$room_type = $_SESSION['room_type'];
$guest_no = $_SESSION['guest_no'];
$id = $_SESSION['logged_id'];
$amount = $_SESSION['payment_amount'];
$sql = "INSERT INTO `booking`(`check_in`, `check_out`, `room_type`, `guest_no`, `guest_id`, `amount_paid`) VALUES ('$check_in','$check_out' ,$room_type,$guest_no,$id,$amount)";
        $query = mysqli_query($link, $sql);
        // $sql = "UPDATE `booking` SET `amount_paid`='$amount' WHERE `guest_id` = '$sr'";
        // $result = mysqli_query($link, $sql);
        $sql = "SELECT * FROM `account_data` WHERE `sr` = '$id'";
        $result = mysqli_query($link, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $email = $row["email"];
            break;
        }
        $subject = "Payment Successful";
        $headers = "From: hotelmanagement.noreply@gmail.com\r\n";
        $content = "Your Payment was successful. Your Rooms has been Booked!";
        if (mail($email, $subject, $content, $headers)) {
            header("location:../html/home.html");
        } else {
            echo "ERROR";
        }
    }
}

?>
<style>

    </style>
<form method="POST" action="">
    <table>
        <h4>Payment Verification</h4>
        <tr>
            <th>OTP: </th>
            <td><input type="text" name="otp"></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit"></td>
        </tr>
    </table>
</form>