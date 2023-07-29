<?php
session_start();
if(isset($_SESSION['username'])){
   header("location: welcome.php");
   exit;
}
require_once "config.php";
$username = $password = "";
$err = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty(trim($_POST['username'])) || empty(trim($_POST['password']))) {
        $err = "Please enter username + password";
    }
    else{
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

    }
    if (empty($err)) {
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        $param_username = $username;
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt); {
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            session_start();
                            $_SESSION["username"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;
                            header("location: welcome.php");
                        }
                    }
                }
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
    <title>Omni</title>
    <link rel="stylesheet" href="Login.css">
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
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Admin</a></li>
            <li><a href="#">View pass</a></li>
          </ul>
          <form class="d-flex" role="search">
            <!--<button class="btn btn-outline-primary" type="submit"><a style="text-decoration: none; color: white;">Login</a></button>
            <button class="btn btn-outline-primary" type="submit"><a href="sign-up.html" style="text-decoration: none; color: white;">Sign-up</a></button>-->
          </form>
        </div>
      </nav>
      <div class="main">
        <form action="" method="post">
            <div class="form">
                <h2>Login Here</h2>
                <input type="email" name="username" placeholder="Enter Username Here">
                <input type="password" name="password" placeholder="Enter Password Here">
                <button class="btnn"><a href="#">Login</a></button>
                    <p class="link">Forget your password<br>
                    <a href="recover.php">Click Here</p>
                    <p class="link">Don't have an account<br>
                    <a href="Register.php">Sign up </a> here</a></p>
            </div>
        </form>
        </div>

</div>
        





<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>    
</body>
</html>
    