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
    <title>Omni</title>
    <link rel="stylesheet" href="sign-up.css">
    <link rel="icon" href="images/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&family=Montserrat:wght@100&family=Sacramento&display=swap" rel="stylesheet">
    
    
</head>
<body>

    <nav class="navbar">
        <div class="container-fluid">
          <img class="navbar-brand" src="images/buslogo.png" alt="Bus logo">
          <ul>
            <li><a href="home.html">Home</a></li>
            <li><a href="About.html">About</a></li>
            <li><a href="Contact.html">Contact</a></li>
            <li><a href="Admin.html">Admin</a></li>
            <li><a href="#">View pass</a></li>
          </ul>
          <form class="d-flex" role="search">
            <button class="btn btn-outline-primary" type="submit"><a href="login.php" style="text-decoration: none; color: white;">Login</a></button>
            <button class="btn btn-outline-primary" type="submit"><a href="Register.php" style="text-decoration: none; color: white;">Sign-up</a></button>
          </form>
        </div>
      </nav>

      <div class="main">
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
                      
          </div>
      </form>
    </div>

<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>    
</body>
</html>