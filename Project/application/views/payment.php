<?php
// Razorpay API credentials
$razorpayKey = 'rzp_test_VUvt0v9GvFPHXA';
$razorpaySecret = '6CfQENoMeZR6IS8Xw8p4YyY6';

// Include the Razorpay library
require_once('razorpay-php/Razorpay.php');

use Razorpay\Api\Api;

// Initialize the Razorpay API object
$api = new Api($razorpayKey, $razorpaySecret);

// Initialize variables
$amount = 0;
$name = '';
$email = '';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form input values
    $amount = $_POST['amount'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Validate input values (you can add more validation as per your requirements)

    // Amount should be a valid number greater than or equal to 1
    if (!is_numeric($amount) || $amount < 1) {
        echo "Invalid amount";
        exit;
    }

    // Create an order
    $order = $api->order->create(array(
        'receipt' => 'order_receipt',
        'amount' => $amount * 100, // Convert amount to paise
        'currency' => 'INR',
    ));

    // Get the order ID
    $orderId = $order->id;

    // Redirect to payment page
    header("Location: payment.php?order_id=$orderId");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Razorpay Payment Gateway Integration</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>
    <h1>Razorpay Payment Gateway Integration</h1>
    <form method="POST" action="">
        <label for="amount">Amount:</label>
        <input type="number" name="amount" id="amount" value="<?php echo $amount; ?>" required min="1"><br>

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $name; ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo $email; ?>" required><br>

        <button type="submit">Pay Now</button>
    </form>

    <script>
        document.querySelector('form').addEventListener('submit', function (e) {
            e.preventDefault();
            payWithRazorpay();
        });

        function payWithRazorpay() {
            var amount = document.getElementById('amount').value;
            var options = {
                key: "<?php echo $razorpayKey; ?>",
                amount: amount * 100, // Convert amount to paise
                currency: "INR",
                name: "Omni Web",
                description: "Purchase Description",
                handler: function (response) {
                    // Payment success callback
                    alert('Payment successful!');
                    console.log(response);
                   // window.location.href = 'success.php?order_id=$orderId' + response.razorpay_order_id;
                },
                prefill: {
                    name: "John Doe",
                    email: "john.doe@example.com",  
                    contact: "+919876543210"
                }
            };
            var rzp = new Razorpay(options);
            rzp.open();
        }
    </script>
</body>
</html>
