
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
* {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
        font-family: 'Quicksand', sans-serif;
        font-family: 'Raleway', sans-serif;
        /* font-family: 'Cinzel Decorative', cursive; */
        --webkit-font-smoothing: antialiased:
    }
        body{
            background-image: url(../images/2.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        }
        .logo img {
            text-align: center;
            margin-left: auto;
            margin-right: auto;
            display: flex;
            justify-content: center;
        }

        table,th,tr,td {
            margin-left: auto;
            margin-right: auto;
            padding: 10px;
        }
        table{
            border:2px solid black;
        }
        input[type=submit] {
        padding: 10px 40px;
        margin: 28px 0px 0px 0px;
        border-radius: 10px;
        background-color: navajowhite;
    }
    table tr {
        color: gold;
        text-transform: uppercase;
    }

    input[type=submit]:hover {
        background-color: rgb(248, 206, 142);
        opacity: 0.8;
        transition-duration: 0.3s;
    }
    input[type=text] {
        padding: 5px;
        width: 150;
        border-radius: 7px;
        font-weight: 900;
        text-transform:uppercase;
        background-color: navajowhite;
        border: 3px solid black;
    }
    .form{
        height: max-content;
        width: max-content;
        background-color: rgb(29, 26, 26, 0.55);
        margin-right: auto;
        margin-left: auto;
        padding: 30px;
        border-radius: 12px;
        margin-top: 30px;
    }
    .head{
        color:gold;
        font-size:40px;
        text-align:center;
    }
    </style>
<form method="POST" action="payment_otp.php" class="form">
    <table>
    <img src="../icons/tgt.png" alt="logo" class="logo">
        <h2 class="head">Payment Verification</h2>
        <tr>
            <th>OTP: </th>
            <td><input type="text" name="otp"></td>
        </tr>
        <tr>
            <td><input type="submit" value = "Submit" name="submit"></td>
        </tr>
    </table>
</form>