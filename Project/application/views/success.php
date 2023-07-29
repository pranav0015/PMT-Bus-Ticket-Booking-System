<?php
// Razorpay API credentials
$razorpayKey = 'rzp_test_VUvt0v9GvFPHXA';
$razorpaySecret = '6CfQENoMeZR6IS8Xw8p4YyY6';

// Include the Razorpay library
require_once('razorpay-php/Razorpay.php');

use Razorpay\Api\Api;

// Initialize the Razorpay API object
$api = new Api($razorpayKey, $razorpaySecret);

// Get the order ID from the URL query parameters
$orderId = $_GET['order_id'];

// Retrieve the order details
$order = $api->order->fetch($orderId);

// Get the payment ID from the order details
$paymentId = $order->payments()['entities'][0]['id'];

// Retrieve the payment details
$payment = $api->payment->fetch($paymentId);

// Extract relevant information
$amount = $payment->amount / 100;
$name = $payment->notes['name'];
$email = $payment->email;

// Display success message with payment details
echo "Payment Successful!<br>";
echo "Order ID: " . $orderId . "<br>";
echo "Payment ID: " . $paymentId . "<br>";
echo "Amount: " . $amount . "<br>";
echo "Name: " . $name . "<br>";
echo "Email: " . $email . "<br>";
?>
