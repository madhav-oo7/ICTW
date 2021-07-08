<?php
require_once "config.php";
session_start();
if(isset($_SESSION["forgot"])){
    if($_SESSION["forgot"] == $_POST["otp"]){
    if(empty($_POST["password"]))
        {
            die("Password field can not be empty.");
        }
        if($_POST["password"] != $_POST["re_password"])
        {
            die("Both passwords must be same.");
        }
        else{
            $password = $_POST["password"];
            if (strlen($_POST["password"]) <= '8') {
                die("Your Password Must Contain At Least 8 Characters!");
            }
            elseif(!preg_match("#[0-9]+#",$password)) {
                die("Your Password Must Contain At Least 1 Number!");
            }
            elseif(!preg_match("#[A-Z]+#",$password)) {
                die("Your Password Must Contain At Least 1 Capital Letter!");
            }
            elseif(!preg_match("#[a-z]+#",$password)) {
                die("Your Password Must Contain At Least 1 Lowercase Letter!");
            }
        }
        $username = $_SESSION["username"];
        $sql = "UPDATE `account_data` SET `password` = '$password' WHERE `username` = '$username'";
        $result = mysqli_query($link, $sql);
        if($result){
            echo "Password updated successfully";
        }
        else{
            echo "Password wasn't updated";
        }
    }
    else{
        echo '<script type="text/javascript">';
        echo ' alert("Enter proper username / password")';
        echo '</script>';
    }
}
else{
    echo "Sorry";
}


?>