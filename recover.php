<?php
include "config.php";
if (isset($_POST['submit'])) {
  
    // Connect to the database
    
    // Get the email address from the form
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    
    // Check if the email exists in the database
    $sql = "SELECT username FROM users WHERE username='$username'";
    $query = mysqli_query($conn, $sql);
    $emailcount = mysqli_num_rows($query);

    if($emailcount){
        $userdata = mysqli_fetch_array($sql);
        $userdata = $userdata['username'];
        $token = $userdata['token'];
        $subject = "Password Reset";
        $body = "Hi, $username. Click here too reset your password 
        http://localhost/Omni_Web/reset_password.php?token=$token";
        $sender_email = "From: oomniticket@gmail.com";

        if(mail($username, $subject, $body, $sender_email)) {
            $_SESSION['msg'] = "check you mail to reset your password $username";
            header("location: login.php");

        }else{
            echo " Email sending failed....";
        }

    }
    
    // If the email exists, generate a new password
    /*if (mysqli_num_rows($result) == 1) {
      $new_password = bin2hex(random_bytes(10));
      
      // Hash the new password
      $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
      
      // Update the password in the database
      $query = "UPDATE users SET password='$hashed_password' WHERE username='$username'";
      mysqli_query($conn, $query);
      */
      // Send an email with the new password to the user
      /*$to = $username;
      $subject = 'Your new password';
      $message = 'Your new password is: ' . $new_password;
      $headers = 'From: noreply@example.com';
      mail($to, $subject, $message, $headers);
      
      // Show a success message
      echo 'Your password has been reset. Please check your email for the new password.';
    } else {
      // Show an error message
      echo 'The email address you entered does not exist in our records.';
    }
    
    // Close the database connection
    mysqli_close($conn);*/
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        *{
    margin: 0;
    padding: 0;
}

.main{
    width: 100%;
    background: linear-gradient(to top, rgba(0,0,0,0.5)50%,rgba(0,0,0,0.5)50%), url(images/bg_4.png);
    background-position: center;
    background-size: cover;
    height: 100vh;
}
.navbar{
    width: 1200px;
    height: 75px;
    margin: auto;
}

.icon{
    width: 200px;
    float: left;
    height: 70px;
}

.logo{
    height: 70px;
    width: 80px;
    padding-left: 20px;
    float: left;
    padding-top: 10px;
    margin-top: -5px
}
.menu{
    width: 400px;
    float: left;
    height: 70px;
}

ul{
    
    float: left;
    display: flex;
    justify-content: center;
    align-items: center;
}

ul li{
    
    list-style: none;
    margin-left: 62px;
    margin-top: 27px;
    font-size: 14px;
}

ul li a{
    text-decoration: none;
    color: #fff;
    font-family: Arial;
    font-weight: bold;
    transition: 0.4s ease-in-out;
}

ul li a:hover{
    color: aqua;
}
.buttons{
    width: 330px;
    margin-top: -50px;
    margin-left: 1100px;
}

.content{
    margin-top: -50px;
    margin-left: 30px;
    width: 1200px;
    height: auto;
    margin-bottom: 70px;
    color: #fff;
    position: relative;
}
.content .par{
    padding-left: 20px;
    padding-bottom: 25px;
    font-family: Arial;
    letter-spacing: 1.2px;
    line-height: 30px;
}
.content h1{
    font-family: 'Times New Roman';
    font-size: 50px;
    padding-left: 20px;
    margin-top: 9%;
    letter-spacing: 2px;
}

.content .cn{
    width: 160px;
    height: 40px;
    background: #ff7200;
    border: none;
    margin-bottom: 10px;
    margin-left: 20px;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    transition: .4s ease;
    
}
.content .cn a{
    text-decoration: none;
    color: #000;
    transition: .3s ease;
}

.cn:hover{
    background-color: #fff;
}

.content span{
    color: #ff7200;
    font-size: 65px
}
.form{
    
    width: 290px;
    height: 350px;
    background: linear-gradient(to top, rgba(0,0,0,0.8)50%,rgba(0,0,0,0.8)50%);
    position: absolute;
    top: 150px;
    left: 485px;
    transform: translate(0%,-5%);
    border-radius: 10px;
    padding: 25px;
}

.form h2{
    width: 220px;
    font-family: sans-serif;
    text-align: center;
    color: #ff7200;
    font-size: 22px;
    background-color: #fff;
    border-radius: 10px;
    margin: 2px;
    padding: 8px;
}

.form input{
    width: 240px;
    height: 35px;
    background: transparent;
    border-bottom: 1px solid #ff7200;
    border-top: none;
    border-right: none;
    border-left: none;
    color: #fff;
    font-size: 15px;
    letter-spacing: 1px;
    margin-top: 30px;
    font-family: sans-serif;
} 

.form input:focus{
    outline: none;
}

::placeholder{
    color: #fff;
    font-family: Arial;
}

.btnn{
    width: 240px;
    height: 40px;
    background: #ff7200;
    border: none;
    margin-top: 30px;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    color: #fff;
    transition: 0.4s ease;
}
.btnn:hover{
    background: #fff;
    color: #ff7200;
}
.btnn a{
    text-decoration: none;
    color: #000;
    font-weight: bold;
}
.form .link{
    color: #fff;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 17px;
    padding-top: 20px;
    text-align: center;
}
.form .link a{
    color: #fff;
    text-decoration: none;
    color: #ff7200;
}
.liw{
    color: #fff;
    padding-top: 15px;
    padding-bottom: 10px;
    text-align: center;
}
.icons a{
    margin-left: 9px;
    text-decoration: none;
    color: #fff;
}
.icons ion-icon{
    color: #fff;
    font-size: 30px;
    padding-left: 14px;
    padding-top: 5px;
    transition: 0.3s ease;
}
.icons ion-icon:hover{
    color: #ff7200;
}
        </style>
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
                <h2>Recover Your Password</h2>
                <input type="email" name="username" placeholder="Enter Email Here">
                <p class="link">Have an account?<br>
                    <a href="login.php">Login Here</p>
                <button type= "submit" name= "submit"  class="btnn"><a href="#">Send Mail</a></button>          
            </div>
        </form>
            </div>   

    

    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>   
</body>
</html>