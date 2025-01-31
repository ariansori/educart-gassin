<link rel="stylesheet" href="../css/index.css" type="text/css">

<?php
session_start();
include('../php/headerdashboard.php');
// Check that cart is not empty
if (isset($_SESSION["cart"])) {
  // **Assuming you don't need database connection here (for demo)**
  // Remove commented-out lines related to database connection (lines 4-8, 18-23)

  // Variable of items to be INSERTED into database (for demo)
  $customerID = 0;
  $orderStatus = "pending";
  $orderDate = date('m/d/Y');

  echo "Customer ID: $customerID<br>";
  echo "Order Status: $orderStatus<br>";
  echo "Order Date: $orderDate<br>";

  // Loop through all products in cart and display details (for demo)
  foreach ($_SESSION["cart"] as $item) {
    $qty = $item["quantity"];
    $id = $item["ItemID"];

    echo "Quantity: $qty<br>";
    echo "Item ID: $id<br><br>";
  }

  // **Conditional for demo purposes only, remove in actual implementation**
  if ($customerID == 0) {
    echo '<h1> Thank You For Your Order! </h1>';
  } else {
    include('../php/headerdashboard.php');
    echo "<h1>Failed to Process Order</h1>";
  }
}
?>
