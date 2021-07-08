<?php
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        require_once "config.php";
        $time = time() + 10;
        // From line no. 7 to line no. 47 code for validation.
        if($_POST["username"] == "")
        {
            // die("Please enter a username.");
            setcookie("error", "Please enter a username.", $time);
                    header("Location:registration_page.php");
                    die();
        }
        else
        {
            $pattern = "/\W/";
            if(preg_match($pattern, $_POST["username"]))
            {
                // die("Username must contain only alphabets and integers.");
                setcookie("error", "Username must contain only alphabets and integers.", $time);
                header("Location:registration_page.php");
                die();
            }
        }
        if(empty($_POST["password"]))
        {
            // die("Password field can not be empty.");
            setcookie("error", "Password field can not be empty.", $time);
            header("Location:registration_page.php");
            die();
        }
        if($_POST["password"] != $_POST["confirm_password"])
        {
            // die("Both passwords must be same.");
            setcookie("error", "Both passwords must be same.", $time);
            header("Location:registration_page.php");
            die();
        }
        else{
            $password = $_POST["password"];
            if (strlen($_POST["password"]) <= 8) {
                // die("Your Password Must Contain At Least 8 Characters!");
                setcookie("error", "Your Password Must Contain At Least 8 Characters!", $time);
                header("Location:registration_page.php");
                die();
            }
            elseif(!preg_match("#[0-9]+#",$password)) {
                // die("Your Password Must Contain At Least 1 Number!");
                setcookie("error", "Your Password Must Contain At Least 1 Number!.", $time);
                header("Location:registration_page.php");
                die();
            }
            elseif(!preg_match("#[A-Z]+#",$password)) {
                // die("Your Password Must Contain At Least 1 Capital Letter!");
                setcookie("error", "Your Password Must Contain At Least 1 Capital Letter!", $time);
                header("Location:registration_page.php");
                die();
            }
            elseif(!preg_match("#[a-z]+#",$password)) {
                // die("Your Password Must Contain At Least 1 Lowercase Letter!");
                setcookie("error", "Your Password Must Contain At Least 1 Lowercase Letter!", $time);
                header("Location:registration_page.php");
                die();
            }
        }
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            // die("Please enter a valid email.");
            setcookie("error", "Please enter a valid email.", $time);
            header("Location:registration_page.php");
            die();
        }
        if(strlen($_POST["number"]) != 10){
            // die("Mobile nuber must be of length 10.");
            setcookie("error", "Mobile nuber must be of length 10.", $time);
            header("Location:registration_page.php");
            die();
        }
        $sql1 = "SELECT * FROM  `account_data`";
        $result = mysqli_query($link, $sql1);
        if($result){
            while($row = mysqli_fetch_assoc($result)){
                if($row['username'] == $_POST['username']){
                    // die("Sorry, Username already taken.");
                    setcookie("error", "Sorry, Username already taken.", $time);
                    header("Location:registration_page.php");
                    die();
                }
                if($row['email'] == $_POST['email']){
                    // die("Sorry, you have already registered from this email.");
                    setcookie("error", "Sorry, you have already registered from this email.", $time);
                    header("Location:registration_page.php");
                    die();
                }
            }
        }
        else{
            // die("Did not connect to database table.");
            setcookie("error", "Did not connect to database table.", $time);
            header("Location:registration_page.php");
            die();
        }
        if(!isset($_COOKIE["error"]))
        $sql = "INSERT INTO `account_data` (`username`, `password`, `email`, `mobile`, `verified`, `name`) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($link, $sql);
        if($stmt){
            mysqli_stmt_bind_param($stmt, "sssiis", $username, $password, $email, $number, $var, $name);
            $username = $_POST["username"];
            $password = $_POST["password"];
            $email = $_POST["email"];
            $number = $_POST["number"];
            $var = FALSE;
            $name = $_POST["name"];
            if(mysqli_stmt_execute($stmt)){
            header("Location:otp.php");
                // echo "The record has been inserted successfully successfully!<br>";
            }
            else{
                die( "Sorry, your data has not been added.");
            }

        }
            
        $otp = rand(100000,999999);

        $subject = "OTP!!!";
        $headers = "From: hotelmanagement.noreply@gmail.com\r\n";
        if (mail($email, $subject, $otp, $headers)){
            session_start();
            $_SESSION['otp'] = $otp;
            $_SESSION['username'] = $username;
            header("Location: otp.php");
        } else {
        echo "ERROR";
        }
    }
    else{
        echo "Something went wrong";
    }
?>