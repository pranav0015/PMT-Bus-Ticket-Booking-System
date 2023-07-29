<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve payment details from the Razorpay response
    $name = $_POST['name'];
    $email = $_POST['email'];
    $paymentId = $_POST['razorpay_payment_id'];
    $paymentDate = $_POST['date'];

    // Add 30 days to the payment date
    $newPaymentDate = date('Y-m-d', strtotime($paymentDate . '+30 days'));

    // Display the payment details
    echo "<h2>Payment Successful!</h2>";
    echo "<p>Name: " . htmlspecialchars($name) . "</p>";
    echo "<p>Email: " . htmlspecialchars($email) . "</p>";
    echo "<p>Payment ID: " . htmlspecialchars($paymentId) . "</p>";
    echo "<p>Payment Date: " . htmlspecialchars($paymentDate) . "</p>";
    echo "<p>New Payment Date: " . htmlspecialchars($newPaymentDate) . "</p>";
} else {
    echo "Invalid request!";
}
?>
