<?php
session_start();

// Debugging: Print the $_POST array to see what data is being received
echo '<pre>';
print_r($_POST);
echo '</pre>';

// Get customerID and email from POST request
$customerID = $_POST['customerID'] ?? null;
$email = $_POST['email'] ?? null;

// Check if customerID and email are set
if (!$customerID) {
    echo 'Customer ID is missing!';
    // You can exit the script or handle the error as needed
    exit;
}

if (!$email) {
    echo 'Email is missing!';
    // You can exit the script or handle the error as needed
    exit;
}

// Continue with the order processing logic
// Include the database controller
require_once("dbcontroller/dbcontroller.php");
$db_handle = new DBController();

// Example order processing logic
// You might want to save the order to the database here
// Assuming you have an orders table with customerID and email columns

$orderData = [
    'customerID' => $customerID,
    'email' => $email,
    // Add more order details as needed
];

$query = "INSERT INTO orders (customerID, email) VALUES (?, ?)";
$params = [$orderData['customerID'], $orderData['email']];
$result = $db_handle->insert($query, $params);

if ($result) {
    echo 'Order has been processed successfully.';
} else {
    echo 'Error processing order.';
}

// Redirect or display a success message
// header('Location: order-success.php');
?>
