<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings</title>
    <style>
        table{
            margin-left:auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
<?php

require_once "config.php";
session_start();
if(!isset($_SESSION["logged_id"])){
    echo "<script>";
    echo "alert('You are not logged in.')";
    echo "</script>";
}
else{
    $id = $_SESSION["logged_id"];
    $sql = "SELECT * FROM `booking` WHERE `guest_id` = '$id'";
    $result = mysqli_query($link, $sql);
    $num = mysqli_num_rows($result);
    while($row = mysqli_fetch_assoc($result)){
        // echo var_dump($row);
        // echo "Room No. : ". $row['room_no'] ."<br>Guest No.: ". $row['guest_no'] . "<br>Amount Paid : " . $row['amount_paid'];
        // echo "<br>";
        echo "<table>";
        echo "<tr>";
        echo "<th>Check In Date : </th>" . $row['check_in'];
        echo "</tr><tr>";
        echo "<th>Check Out Date : </th>" . $row['check_out'];
        echo "</tr><tr>";
        echo "<th>Room Type : </th>" . $row['room_type'];
        echo "</tr><tr>";
        echo "<th>Number Of Guests : </th>" . $row['guest_no'];
        echo "</tr><tr>";
        echo "<th>Number of Rooms : </th>" . $row['room_no'];
        echo "</tr><tr>";
        echo "<th>Amount Paid : </th>" . $row['amount_paid'];
        echo "</tr></table>";
    }
    if($num == 0){
        echo "<script>";
    echo "alert('You do not have any bookings.')";
    echo "</script>";
    }
}

?> -->
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=>, initial-scale=1.0">
    <title>Registration</title>  
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600&display=swap" rel="stylesheet">
</head>
<style>
body {
    background-image: url("../images/r1.jpg");
    background-size: cover;
    margin:0;
    padding: 0;
    
}
h1 {
    text-align: center;
    font-family: 'Cinzel', sans-serif;
    margin-top: 5rem;
    font-weight: bolder;
}

input {
    padding-bottom: 8px;
    margin-bottom: 10px;
    width: 20%;
    border: 2px solid rgb(0, 0, 0);
    border-radius: 7px;
}
    
.name input{
    width: 35%;
    
}
.uname input{
    width: 30%;
    
}
.pwd input{
    width: 30%;
    
}
.cpwd input{
    width: 20%;
    
}
.email input{
    width: 34.5%;
    
}
.mnumber input{
    width: 24%;
    
}
input[type=submit]{
    font-family: 'Cinzel', sans-serif;
    margin-top: 5px;
    padding-top: 8px;
    font-weight:1000;
    font-size: 15px;
    cursor: pointer;
    color: darkorange;
    background-color:black
    
}

img {
    align-items: center;
    margin-left: 665px;
}
</style>
<body>

    <img src="../icons/tgt.png" alt="Hotel logo" width="200px", height="200px">

    <h1>Your Bookings</h1>
    <?php

require_once "config.php";
// session_start();
if(!isset($_SESSION["logged_id"])){
    echo "<script>";
    echo "alert('You are not logged in.')";
    echo "</script>";
}
else{
    $id = $_SESSION["logged_id"];
    $sql = "SELECT * FROM `booking` WHERE `guest_id` = '$id'";
    $result = mysqli_query($link, $sql);
    $num = mysqli_num_rows($result);
    echo "<table>";
        echo "<tr>";
            echo "<th>>Check In Date : </th><th>Check Out Date : </th><th>Room Type : </th><th>Number Of Guests : </th><th>Number of Rooms : </th><th>Amount Paid : </th>";
        echo "</tr>";
    while($row = mysqli_fetch_assoc($result)){
        // echo var_dump($row);
        // echo "Room No. : ". $row['room_no'] ."<br>Guest No.: ". $row['guest_no'] . "<br>Amount Paid : " . $row['amount_paid'];
        // echo "<br>";
        // echo "<table>";
        // echo "<tr>";
        // echo "<th>Check In Date : </th>" . $row['check_in'];
        // echo "</tr><tr>";
        // echo "<th>Check Out Date : </th>" . $row['check_out'];
        // echo "</tr><tr>";
        // echo "<th>Room Type : </th>" . $row['room_type'];
        // echo "</tr><tr>";
        // echo "<th>Number Of Guests : </th>" . $row['guest_no'];
        // echo "</tr><tr>";
        // echo "<th>Number of Rooms : </th>" . $row['room_no'];
        // echo "</tr><tr>";
        // echo "<th>Amount Paid : </th>" . $row['amount_paid'];
        // echo "</tr></table>";

        
        echo "<tr>";
        echo "<td>" . $row['check_in']."</td><td>" . $row['check_out']."</td><td>" . $row['room_type']."</td><td>".$row['guest_no']."</td><td>".$row['room_no']."</td><td>".$row["amount_paid"]."</td>";
        echo "</tr>";

    }
    echo "</table>";
    if($num == 0){
        echo "<script>";
    echo "alert('You do not have any bookings.')";
    echo "</script>";
    }
}

?>


</body>
</html>


<?php
    if(isset($_COOKIE["error"])){
        $error = $_COOKIE["error"];
        echo '<script>';
        echo "alert('".$error."')";
        echo '</script>';
    }
?>