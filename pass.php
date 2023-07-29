<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "getpass";

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form input values
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $age = $_POST['age'];
    $date = $_POST['date'];

    // Prepare and execute SQL statement to insert data into the database
    $stmt = $conn->prepare("INSERT INTO users (name, email, mobile, age, date) VALUES (?, ?, ?, ?, ?)");

if (!$stmt) {
    die("Error in preparing the statement: " . $conn->error);
}

$stmt->bind_param("sssis", $name, $email, $mobile, $age, $date);

if ($stmt->execute()) {
    echo "Data inserted successfully!";
} else {
    echo "Error inserting data: " . $stmt->error;
}

// Close the statement
$stmt->close();
}

// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
  <title>Bus Pass Generator</title>
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: block;
            background-image: url('bg_4.png');
      background-size: cover;
      background-position: center;
            
        }
        .navbar {
            background-color: #333;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }

        .navbar-logo {
            margin-right: 10px;
            width: 70px;
            height: 80px;
        }

        .navbar-items {
            flex-grow: 1;
            text-align: center;
        }

        .navbar-items a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }
        .navbar-items a:hover {
            color: #2208e5; /* Change to desired hover color */
        }

        .navbar-buttons {
            margin-left: 10px;
        }

        .navbar-buttons button {
            background-color: #555;
            border: none;
            color: #fff;
            padding: 5px 10px;
            margin-left: 5px;
            cursor: pointer;
        }
        .container {
      background-color: #fff;
      border: 1px solid #ccc;
      padding: 20px;
      max-width: 400px;
      text-align: center;
    }
    
    h1 {
      margin-top: 0;
    }
    
    label {
      display: block;
      margin-bottom: 10px;
    }
    
    input[type="text"],
    input[type="number"] {
      width: 100%;
      padding: 5px;
      margin-bottom: 10px;
    }
    
    input[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      border: none;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      cursor: pointer;
    }

  </style>
</head>
<div>
    <div class="navbar">
        
        <img style="width: 70px; height: 80px;" src="buslogo.png" alt="Logo">
    
    <div class="navbar-items">
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
        <a href="#">Admin</a>
        <a href="#">View Pass</a>
    </div>
    <div class="navbar-buttons">
        <button type="button" class="btn btn-outline-primary">Login</button>
        <button type="button" class="btn btn-outline-primary">Register</button>
    </div>
</div>
<div class="container">
<h1 >Bus Pass Generator</h1>
<div class="form-container">
  
  
  <form action="payment.php" method="post">
    <label for="name">Full Name:</label>
    <input type="text" id="name" name="name" required><br><br>
    
    <label for="age">Age:</label>
    <input type="number" id="age" name="age" required><br><br>

    <label for="Contact">Contact No:</label>
    <input type="number" id="Contact" name="mobile" required><br><br>

    
    <label for="email">Email:</label>
    <input type="email" id="Contact" name="email" required><br><br>

    
    <label for="date">Date:</label>
    <input type="date" id="date" name="date" required><br><br>


    
    
    <input type="submit" value="Generate Bus Pass">
  </form>
</div>
</div>

  
</body>
</html>
