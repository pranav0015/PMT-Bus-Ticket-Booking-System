<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/custom.css?date='.date("s")) ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
   
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
.info-content{
        margin-bottom: 1rem;
    }

    .info-content .num{
        font-size: 1.5rem;
    }
#info-num{
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    #info-num figure{
        flex-basis: 30%;
        padding: 2rem 0;
        text-align: center;
        border-radius: 5px;
    }

    #info-num figcaption{
        margin-top: 1rem;
        text-transform: uppercase;
    }

    #info-num .num{
        display: block;
        margin-bottom: 0.3rem;
        font-size: 1.2rem;
        font-weight: 800;
    }
    #about{
        text-align: center;
        padding: 3rem 0;
        background-color: #e5e5e5;
        height: auto;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    #about h1{
        margin: 0;
    }

    #about p{
        line-height: 26px;
    }
    footer{
        padding: 1rem 0;
        text-align: center;
        font-weight: bold;
    }

    footer p{
        margin: 0;
    }


</style>
<body style="height:1500px">
<nav class="navbar">
        <div class="container-fluid">
          <img class="navbar-brand" src="assets/frontend/images/buslogo.png" alt="" >
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
    
    <div style="background:url('<?php echo base_url('assets/frontend/images/slider_1.webp') ?>');height:500px">
       <div class="form-container">
            <form action="<?php echo base_url("/") ?>" method="get">
                <div class="row inner-container">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="bold">Select From Location</label>
                            <select name="start" class="form-control" required>
                                <option value="">Select From Location</option>
                                <?php 
                                foreach($locations as $loc) {
                                ?>
                                    <option value="<?php echo $loc['id'] ?>"><?php echo $loc['name'] ?></option>
                                <?php 
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="bold">Select To Location</label>
                            <select name="end" class="form-control" required>
                                <option value="">Select To Location</option>
                                <?php 
                                foreach($locations as $loc) {
                                ?>
                                    <option value="<?php echo $loc['id'] ?>"><?php echo $loc['name'] ?></option>
                                <?php 
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="bold">Time</label>
                            <input type="time" name="time" min="06:00" max="22:00" class="form-control" reuired />
                        </div>
                    </div>
                    <div class="col-sm-1 pt-4">
                        <div class="form-group pt-2 pr-2">
                            <button type="submit" class="btn btn-info btn-block">Search</button>
                        </div>
                    </div>

                </div>
            </form>
       </div>
    </div>
    <?php 
    ?>
    
    <div class="container" style="margin-top:80px">
                                <?php
                                if(count($schedules) > 0) {
                                foreach ($schedules as $schedule ) {
                                ?>
                                <div class="card custom-card">
                                    <div style="padding-top: 34px;padding-left: 34px;display:flex">
                                        <div style="width:30%"><h3><?php echo $schedule['bus_number'] ?> </h3>
                                        <p><?php echo $schedule['time'] ?></p></div>
                                        <div style="width:15%">From: <?php
                                            foreach($locations as $loc) {
                                                if($loc['id'] == $schedule['start']) {
                                                echo $loc['name'];
                                                }
                                        } ?></div>
                                        <div style="width:15%">To:  <?php
                                            foreach($locations as $loc) {
                                                if($loc['id'] == $schedule['end']) {
                                                echo $loc['name'];
                                                }
                                        } ?></div>
                                        <div style="width:20%"><?php echo $schedule['amount'] ?></div>
                                        <div style="width:20%"><a href="<?php echo  base_url("home/booking/".$schedule['id']) ?>" class="btn btn-danger">Book Now</a></div>
                                    </div>
                                </div>
                                <?php

                                } } else {
                                ?>
                                <div class="card custom-card">
                                <div style="padding-top: 34px;padding-left: 34px;text-align:center">
                                    <h3>No Results Found | Please Serarch Location for More Results</h3>
                                </div>
                                <?php 
                                    }
                                ?>
    

         
    </div>

    <div id="block">
        <section id="info-num">
            <figure>
                <img src="assets/frontend/images/route.svg" alt="Bus Route Icon" width="100px" height="100px">
                <figcaption>
                    <span class="num counter">4</span>
                    <span class="icon-name">routes</span>
                </figcaption>
            </figure>
            <figure>
                <img src="assets/frontend/images/bus.svg" alt="Bus Icon" width="100px" height="100px">
                <figcaption>
                    <span class="num counter">4</span>
                    <span class="icon-name">bus</span>
                </figcaption>
            </figure>
            <figure>
                <img src="assets/frontend/images/customer.svg" alt="Happy Customer Icon" width="100px" height="100px">
                <figcaption>
                    <span class="num counter">5</span>
                    <span class="icon-name">happy customers</span>
                </figcaption>
            </figure>
            <figure>
                <img src="assets/frontend/images/ticket.svg" alt="Instant Ticket Icon" width="100px" height="100px">
                <figcaption>
                    <span class="num"><span class="counter">3</span> SEC</span> 
                    <span class="icon-name">Instant Tickets</span>
                </figcaption>
            </figure>
        </section>
        
        <section id="about">
            <div>
                <h1>About Us</h1>
                <h4>Wanna know were it all started?</h4>
                <p>
                    As we all know people usually prefer bus to travel to their job, hometown etc. usually people has to sand in queue for a very long time and they waste their precious time so by looking at this problem we has created a omni bus ticket booking website which will help people to book bus tickets online no need to go to terminal or stand in queue can also book their seats
                </p>
            </div>
        </section>
        <!-- <section id="contact">
            <div id="contact-form">
                <h1>Contact Us</h1>
                <form action="">
                    <div>
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name">
                    </div>
                    <div>
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email">
                    </div>
                    <div>
                        <label for="message">Message</label>
                        <textarea name="message" id="message" cols="30" rows="10"></textarea>
                    </div>
                    <div></div>
                </form>
            </div>
        </section> -->
        <footer>
        <p>
            <i class="far fa-copyright"></i>- Omni Bus Ticket Booking System | Made with by MIT Academy of Engineering
        </p>
        </footer>
    </div>
    <!-- <script>
        function openNewPage() {
            // Redirect to the new page using JavaScript
            window.location.href = "Contact.html";
        }
    </script> -->
    
</body>
</html>