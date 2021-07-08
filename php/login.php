<?php
    if(($_SERVER["REQUEST_METHOD"] == "POST")){
        require_once "config.php";
        $sql = "SELECT * FROM `account_data` WHERE `username` = ? AND `password` = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $username, $password);
            $username = $_POST['username'];
            $password = $_POST['password'];
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
        
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    session_start();
                    $_SESSION['logged_id'] = $row['sr'];
                    header("Location:../html/home.html");
                } else{
                    // URL doesn't contain valid id parameter. Redirect to error page
                    // header("location: error.php");
                    echo "<script>";
                    echo "alert('Sorry, username or password does not match with our data.')";
                    echo "</script>";
                    exit();
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Golden Tulip | Login</title>
</head>
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

    body {
        background-image: url(../images/2.jpg);
        background-size: cover;
        background-repeat: no-repeat;
    }

    .form {
        height: max-content;
        width: max-content;
        background-color: rgb(29, 26, 26, 0.55);
        margin-right: auto;
        margin-left: auto;
        padding: 30px;
        border-radius: 12px;
        margin-top: 30px;
    }

    table tr {
        color: gold;
    }

    h2 {
        color: gold;
        padding-bottom: 40px;
        font-size: 40px;
    }

    table,
    tr,
    th,
    td {
        margin-left: auto;
        margin-right: auto;
        padding: 10px;
    }

    input[type=text],
    input[type=password] {
        padding: 5px;
        width: 150;
        border-radius: 7px;
        font-weight: 900;
        /* text-transform: uppercase; */
        background-color: navajowhite;
        border: 3px solid black;
    }

    .tag {
        font-size: 25px;
    }

    input[type=submit] {
        padding: 10px 40px;
        margin: 28px 0px 0px 0px;
        border-radius: 10px;
        background-color: navajowhite;
    }

    input[type=submit]:hover {
        background-color: rgb(248, 206, 142);
        opacity: 0.8;
        transition-duration: 0.3s;
    }

    input[value=login] {
        font-size: 20px;
        border: 3px solid black;
        font-weight: 700;
    }

    input[value=login]:hover {
        color: black;
        opacity: 1;
    }

    .logo {
        /* background-color: rgb(248, 248, 255); */
        margin-left: auto;
        margin-right: auto;
        display: flex;
        justify-content: center;
    }

    td>a{
        color:gold;
        padding-left: 55px;
        text-decoration: none;
    }

    td>a:hover{
        color:orange;
        transition:.3s ease;
    }
</style>

<body>
    <div class="form">
        <div class="logo"><img src="../icons/tgt.png" style="height:250px;"></div>
        <h2>Welcome to The Golden Tulip</h2>
        <form action="" method="POST">

            <table class="t1">
                <tr>
                    <th class="tag">Username : </th>
                    <td><input type="text" id="username" name="username" required></td>
                </tr>
                <tr>
                    <th class="tag">Password : </th>
                    <td><input type="password" id="password" name="password" required></td>
                </tr>
                <tr>
                    <th colspan="2"><input type='submit' value="login"></th>
                </tr>
                <tr>
                    <td><a href="forgot.php">Forgot password</a></td>
                    <td><a href="../php/registration_page.php">Sign up</a></td>
                </tr>
            </table>
        
        </form>
    </div>
</body>
</html>



