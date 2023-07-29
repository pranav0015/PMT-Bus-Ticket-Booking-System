<?php
require 'razorpay-php/Razorpay.php';

use Razorpay\Api\Api;

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
        // Generate order and payment ID
        $api = new Api('rzp_test_VUvt0v9GvFPHXA', '6CfQENoMeZR6IS8Xw8p4YyY6');

        $orderData = [
            'receipt' => 'bus_pass_receipt', // Replace with your own receipt ID or logic
            'amount' => 50000, // Amount in paisa (e.g., 50000 for ₹500)
            'currency' => 'INR', // Replace with your desired currency
            'payment_capture' => 1, // Auto-capture payment
        ];

        $order = $api->order->create($orderData);

        $orderId = $order['id'];
        $amount = $order['amount'];

        // Redirect to Razorpay payment page
        echo '<script src="https://checkout.razorpay.com/v1/checkout.js"></script>';
        echo '<script>
                var options = {
                    "key": "rzp_test_VUvt0v9GvFPHXA",
                    "amount": "' . $amount . '",
                    "currency": "INR",
                    "name": "Bus Pass",
                    "description": "Bus Pass Payment",
                    "image": "buslogo.png",
                    "order_id": "' . $orderId . '",
                    "handler": function (response) {
                        // Handle Razorpay response here
                        alert(response.razorpay_payment_id);
                        alert(response.razorpay_order_id);
                        alert(response.razorpay_signature);
                    
                        // Redirect to success.php with payment details
                        var paymentDetails = {
                            name: "<?php echo addslashes($name); ?>",
                            email: "<?php echo addslashes($email); ?>",
                            date: "<?php echo addslashes($date); ?>",
                            razorpay_payment_id: response.razorpay_payment_id
                        };
                    
                        var form = document.createElement("form");
                        form.setAttribute("method", "post");
                        form.setAttribute("action", "success.php");
                    
                        for (var key in paymentDetails) {
                            if (paymentDetails.hasOwnProperty(key)) {
                                var field = document.createElement("input");
                                field.setAttribute("type", "hidden");
                                field.setAttribute("name", key);
                                field.setAttribute("value", paymentDetails[key]);
                                form.appendChild(field);
                            }
                        }
                    
                        document.body.appendChild(form);
                        form.submit();
                    },
                    
                    
                    
                    "prefill": {
                        "name": "' . $name . '",
                        "email": "' . $email . '",
                        "contact": "' . $mobile . '"
                    },
                    "notes": {
                        "address": "Address"
                    },
                    "theme": {
                        "color": "#F37254"
                    }
                };
                var rzp1 = new Razorpay(options);
                rzp1.open();
            </script>';

    } else {
        echo "Error inserting data: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
