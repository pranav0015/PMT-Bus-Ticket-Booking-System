<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true){
    header("location: login.php");
}
else{
   // echo "Welcome";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Omni</title>
    <!--<link rel="stylesheet" href="dashboard.css">-->
    <link rel="icon" href="images/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&family=Montserrat:wght@100&family=Sacramento&display=swap" rel="stylesheet">
<style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
.parent{
    display: flex;
}
  
.child{
    display: flex;
    flex-direction: column;
    width: 100%;
}
  
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
  
.navbar-brand{
    height: 80px;
    width: 70px;
}
.container-fluid{
      margin-top: 0;
      background-color: #1e2024;
}
.navbar{
      margin-top: -8px;
      margin-bottom: -8px;
}
.btn{
    width: 100px;
    margin-right: 10px;
    border-radius: 6px;
    background-color:transparent;
    color: rgb(26, 233, 248);
    padding: 10px;
    font-size: 20px;
}
nav ul{
      display: flex;
      flex-wrap: wrap;
      list-style: none;
}
nav ul li{
      margin: 0 5px;
}
nav ul li a{
      color: #f2f2f2;
      text-decoration: none;
      font-size: 18px;
      font-weight: 500;
      padding: 8px 15px;
      border-radius: 5px;
      letter-spacing: 1px;
      transition: all 0.3s ease;
}
nav ul li a.active,
nav ul li a:hover{
      color: #111;
      background: #fff;
}
.main{
      width: 100%;
      background: url(images/bg_4.jpg);
      background-position: center;
      background-size: cover;
      height: 86.5vh;
      
}
.wrapper{
    display: flex;
    position: relative;
}
  
.wrapper .sidebar{
    width: 200px;
    height: 100%;
    background: #4b4276;
    padding: 30px 0px;
    position: fixed;
}
  
.wrapper .sidebar h2{
    color: #fff;
    text-transform: uppercase;
    text-align: center;
    margin-bottom: 30px;
}
  
.wrapper .sidebar ul li{
    padding: 15px;
    border-bottom: 1px solid #bdb8d7;
    border-bottom: 1px solid rgba(0,0,0,0.05);
    border-top: 1px solid rgba(255,255,255,0.05);
}    
  
.wrapper .sidebar ul li a{
    color: #bdb8d7;
    display: block;
}
  
.wrapper .sidebar ul li a .fas{
    width: 25px;
}
  
.wrapper .sidebar ul li:hover{
    background-color: #594f8d;
}
      
.wrapper .sidebar ul li:hover a{
    color: #fff;
}
   
.wrapper .sidebar .social_media{
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
}
  
.wrapper .sidebar .social_media a{
    display: block;
    width: 40px;
    background: #594f8d;
    height: 40px;
    line-height: 45px;
    text-align: center;
    margin: 0 5px;
    color: #bdb8d7;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
}
.wrapper .main_content{
    width: 100%;
    margin-left: 200px;
  }
  
.wrapper .main_content .header{
    padding: 20px;
    background: #fff;
    color: #717171;
    border-bottom: 1px solid #e0e4e8;
}
  
  </style>

</head>
<body>

    <nav class="navbar">
        <div class="container-fluid">
          <img class="navbar-brand" src="images/buslogo.png" alt="Bus logo">
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Admin</a></li>
            <li><a href="#">View pass</a></li>
          </ul>
          <form class="d-flex" role="search">
            <button class="btn btn-outline-primary" type="submit"><a href="logout.php" style="text-decoration: none; color: white;">log out</a></button>
          </form>
        </div>
      </nav>
        <div class="main">
          <div class="wrapper">
            <div class="sidebar" style="width: 250px;">
                <h2>dashboard</h2>
                <ul>
                    <li><a href="#">Apply for Pass</a></li>
                    <li><a href="Project/">Book ticket</a></li>
                    <li><a href="Track.html">Track Bus</a></li>
                    <li><a href="#">Pass Status</a></li>
                    <li><a href="#">Report on Pass</a></li>
                  </ul> 
                <div class="social_media">
                  <a href="#"><i class="fab fa-facebook-f"></i></a>
                  <a href="#"><i class="fab fa-twitter"></i></a>
                  <a href="#"><i class="fab fa-instagram"></i></a>
              </div>
            </div>
            <div class="main_content">
              <div class="header" style="margin-left: 50px; font-size: larger;">Welcome! User</div> 
            </div>
          </div>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>    
</body>
</html>




