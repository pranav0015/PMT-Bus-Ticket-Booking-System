<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/custom.css?date='.date("s")) ?>">
</head>
<style>
        *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
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
    width: 90px;
    margin-right: 10px;
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
.form-group input {
    margin-bottom: 30px;
}

</style>
<body style="height:1500px">
<nav class="navbar">
<div class="container-fluid">
          <img class="navbar-brand" src="assets/frontend/images/buslogo.png" alt="https://www.google.com/imgres?imgurl=https%3A%2F%2Fplay-lh.googleusercontent.com%2FgMc-e9LOPSqtCgpf2JEV5wgwyYd_chbUDd_K2nqxg0S9It0CwEzXgaovV2eUtQL3P54%3Dw600-h300-pc0xffffff-pd&tbnid=xiby9h36WipyAM&vet=10CB4QMyh1ahcKEwjg45WGoJj_AhUAAAAAHQAAAAAQAw..i&imgrefurl=https%3A%2F%2Fplay.google.com%2Fstore%2Fapps%2Fdetails%3Fid%3Dcom.pmp.econnect%26hl%3Den_US&docid=gcQ3NpFkJYYDEM&w=600&h=300&q=pmpl%20bus%20logo&ved=0CB4QMyh1ahcKEwjg45WGoJj_AhUAAAAAHQAAAAAQAw ">
          <ul>
            <li><a href="home.html">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href=Project\Omni_Web\Contact.html>Contact</a></li>
            <li><a href="admin-login.php">Admin</a></li>
            <li><a href="#">View pass</a></li>
          </ul>
          <form class="d-flex" role="search">
            <!-- <button class="btn btn-outline-primary" type="submit"><a href="Login.html" style="text-decoration: none; color: white;">Login</a></button> -->
            <button class="btn btn-outline-primary" type="submit"><a href="sign-up.html" style="text-decoration: none; color: white;">Logout</a></button>
          </form>
        </div>
      </nav>
      <div class="container" style="margin-top:100px">
        <form action="<?php echo base_url('home/booking/'.$id) ?>" method="post">
        <div class = "col-sm-12">
            <div class = "form-group">
                <label>Name</label>
                <input type = "text" name = "name" placeholder = "Enter Name" class = "form-control" required />
            </div>
        </div>
        <div class = "col-sm-12">
            <div class = "form-group">
                <label>Mobile Number</label>
                <input  type = "number" name = "mobile" placeholder = "Enter Mobile Number" class = "form-control" required />
            </div>
        </div>
        <div class = "col-sm-12">
            <div class = "form-group">
                <label>Amount </label>
                <input type = "number" name = "amount" placeholder = "Enter Amount" class = "form-control" required />
            </div>
        </div>
        <div class = "col-sm-12">
            <div class = "form-group">
                <label>Email Id </label>
                <input type = "email" name = "email" placeholder = "Enter Email Id" class = "form-control" required />
            </div>
        </div>
        <div class = "col-sm-12">
            <div class = "form-group">
                <button class="btn btn-danger" type="submit">Submit </button>
            </div>
        </div>
        
    </div>
    </div>
    </form>


    
    

         
    </div>
</body>
</html>