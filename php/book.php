<?php
require_once "config.php";
// require_once "book.html";
session_start();
if(!isset($_SESSION["logged_id"])){
    header("Location: login.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION["logged_id"])) {
        $id = $_SESSION["logged_id"];
        $_SESSION['check_in'] = $_POST["check_in"];
        $_SESSION['check_out'] = $_POST["check_out"];
        $_SESSION['room_type'] = $_POST["room_type"];
        $_SESSION['guest_no'] = $_POST["guest_no"];
        $_SESSION['payment_amount'] = 0;
        header("location:payment.php");
        // $sql = "INSERT INTO `booking`(`check_in`, `check_out`, `room_type`, `guest_no`, `guest_id`, `amount_paid`) VALUES ($check_in,$check_out,$room_type,$guest_no,$id,$temp_num)";
        // $query = mysqli_query($link, $sql);
        // if ($query) {
        //     header('location:payment.php');
        // }
    }
} 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600&display=swap" rel="stylesheet">
    <title>Book Now</title>
</head>

<body>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Cinzel', sans-serif;
        }

        .heading {
            background-color: #352a24;
            margin-top: 0px;
            margin-bottom: 18px;
            margin-left: -10px;
            margin-right: -10px;
            width: 100.65%;
        }

        h1 {
            color: orange;
            font-family: 'Cinzel', sans-serif;
            padding: 15px 25px;
            padding-top: 20px;
            margin-left: 590px;
        }

        .content img {
            margin-top: -18px;
            margin-left: -8px;
            width: 100.5%;
            height: 671.5px;
        }

        .content form {
            margin-top: -450px;
            font-weight: bolder;
            color: black
        }

        input {
            margin-bottom: 20px;
        }

        select {
            margin-bottom: 20px;
        }

        .cin {
            margin-left: 620px;
            font-size: 20px;
        }

        .cin input {
            width: 200px;
            font-weight: bold;

        }

        .cout {
            margin-left: 620px;
            font-size: 20px;
        }

        .cout input {
            width: 178px;
            font-weight: bold;
        }

        .rtype {
            margin-left: 620px;
            font-size: 20px;

        }

        .rtype select {
            width: 178px;
            font-weight: bold;

        }

        .rn {
            margin-left: 620px;
            font-size: 20px;
        }

        .rn select {
            width: 153px;
            font-weight: bold;
        }

        .gn {
            margin-left: 620px;
            font-size: 20px;
        }

        .gn select {
            width: 161px;
            font-weight: bold;

        }

        .sub {
            margin-left: 680px;


        }

        .sub input {
            font-size: 20px;
            cursor: pointer;
            font-weight: bold;
            background-color: black;
            color: orange;
            padding: 10px 20px;
            border-radius: 20px;



        }
    </style>

    <div class="heading">
        <h1>The Golden Tulip</h1>
    </div>

    <div class="content">
        <img src="../images/b1.jpg" alt="">
        <form action="book.php" method="POST">
            <div class="cin">
                <label for="cin">Check In:</label>
                <input type="date" name="check_in" id="cin"><br>
            </div>
            <div class="cout">
                <label for="cout">Check Out:</label>
                <input type="date" name="check_out" id="cout"><br>
            </div>
            <div class="rtype">
                <label for="roomtype">Room Type:</label>
                <select name="room_type" id="room_type">
                    <option value="1">Single Bed</option>
                    <option value="2">Double Bed</option>
                </select><br>
            </div>
            <!-- <div class="rn">
            <label for="room no">No of Rooms:</label>
            <select id="room no">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div> -->

            <div class="gn">
                <label for="guest_no">No of Guest:</label>
                <select id="guest_no" name="guest_no">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select><br>
            </div>
            <div class="sub">

                <input type="submit" value="Book Now" id="submit">
            </div>

        </form>


    </div>



</body>

</html>