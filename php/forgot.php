<!DOCTYPE html>
<?php
    require_once "config.php";

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $sql = "SELECT * FROM `account_data` WHERE `username` = '$username' and `email` = '$email'";
        $result = mysqli_query($link, $sql);
        if($result){
            $otp = rand(100000,999999);

            $subject = "OTP!!!";
            $headers = "From: hotelmanagement.noreply@gmail.com\r\n";
            if (mail($email, $subject, $otp, $headers)){
                session_start();
                $_SESSION['forgot'] = $otp;
                $_SESSION['username'] = $username;
                header("location:otp1.php");
            } else {
            echo "ERROR";
            }
        }
        else{
            echo "Sorry, The data you have entered does not match with our database.";
        }
    }

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
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
    input[type=text],
    input[type=email] {
        padding: 5px;
        width: 150;
        border-radius: 7px;
        font-weight: 900;
        /* text-transform:uppercase; */
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
    </style>
</head>

<body>
    <div class="form">
    <div class="logo">
        <img src="../icons/tgt.png" alt="logo">
    </div>
    <form action="forgot.php" method="POST">
        <table>
            <tr>
                <th><label for="username">Username : </label></th>
                <td><input type="text" id="username" name="username"></td>
            </tr>
            <tr>
                <th><label for="email">Email : </label></th>
                <td><input type="email" id="email" name="email"></td>
            </tr>
            <tr>
                <th colspan="2"><input type='submit' value="Submit"></th>
            </tr>
        </table>
    </form>
    </div>
</body>

</html>