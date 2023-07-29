<?php
include "config.php";
//require_once "config.php";
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty(trim($_POST["username"]))) {
        $username_err = "Username cannot be blank";
    } else {
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = trim($_POST['username']);
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken";
                } else {
                    $username = trim($_POST['username']);
                }
            } else {
                echo "Something went Wrong";
            }
        }
    }
    mysqli_stmt_close($stmt);

    //Check for password
    if (empty(trim($_POST['password']))) {
        $password_err = "Password cannot be blank";
    } elseif (strlen(trim($_POST['password'])) < 8) {
        $password_err = "Password cannot be less than 8 characters";
    } else {
        $password = trim($_POST['password']);
    }
    if (trim($_POST['password']) != trim($_POST['confirm_password'])) {
        $password_err = "Password should match";

    }
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
        $sql = "INSERT INTO users(username,password) VALUES (?,?)";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            if (mysqli_stmt_execute($stmt)) {
                header("location: login.php");

            } else {
                echo "Something went wrong...... cannot redirect!!";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Omni website</title>
    <link rel="icon" href="images/favicon.ico">
    <link rel="stylesheet" href="stylereg.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="main">
        <div class="nav">
            <div class="icon">
                <img class="logo" src="images/buslogo.png" alt="bus-logo">
            </div>
            <div class="menu">
                <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="#">ADMIN</a></li>
                    <li><a href="#">PASS</a></li>
                    <li><a href="#">ABOUT</a></li>
                    <li><a href="#">CONTACT</a></li>
                </ul>
            </div>
            <div class="buttons">
            <button type="button" class="btn btn-outline-info">Login</button>
            <button type="button" class="btn btn-outline-info">sign-up</button>
            </div>
        </div>
        <form action="" method="post">
            <div class="form" >
                <h2>Sign up Here</h2>
                <input type="text" name="name" placeholder="Full Name">
                <!--<input type="radio" placeholder = "Gender">-->
                <input type="email" name="username" placeholder="Enter Email Here">
                <input type="password" name="password" placeholder="Enter Password Here">
                <input type="password" name="confirm_password" placeholder="Re-enter Password">
                <input type="number" name="PhoneNumber" placeholder="Phone Number">
                <button class="btnn"><a href="#">Sign up</a></button> 
                <p class="link">If already have an account<br>
                <a href="login.php">Sign up </a> here</a></p>         
            </div>
        </form>  
            </div>   
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>   
</body>
</html>