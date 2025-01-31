<?php
session_start();
?>
<!Doctype html>
<html lang="en">
	<head>
    	<meta charset="UTF-8">
		<title>Checkout</title>

		<!-- Google fonts -->
		<link rel="preconnect" href="https://fonts.gstatic.com">
    	<link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
		<!-- End of Google fonts -->	   

    	<!-- CSS Styles -->
		<link rel="stylesheet" href="css/checkout.css" type="text/css">
		<!-- End of CSS Styles -->
	</head>
	<!-- Navigation Bar -->
	<?php include('php/headerdashboard.php'); ?>
	<!-- End of Navigation Bar -->	  	
	<body>
		<section id="container">
			<!-- Checkout Form -->
			<div class="checkOutForm">
				<h3>Confirm</h3>
				<form id="submit-form" action="process-order.php" method="post">
					<div class="customerForm">
						<?php if (isset($_SESSION['customerEmail'])) { ?>
							<input id="email" type="hidden" name="email" value="<?php echo $_SESSION['customerEmail']; ?>">
						<?php } else { ?>
							<input id="email" type="email" name="email" placeholder="Your number" required>
						<?php } ?>

						<?php if (isset($_SESSION['customerID'])) { ?>
							<input type="hidden" name="customerID" value="<?php echo $_SESSION['customerID']; ?>">
						<?php } else { ?>
							<input type="hidden" name="customerID" value="">
						<?php } ?>
					</div>
					<div id="checkout-btn">
						<input type="submit" value="Go">
					</div>
				</form>
			</div>
			<!-- End of Checkout Form -->
			
			<!-- Order Summary -->
			<div id="checkout-Container">
				<h3>Order Summary</h3>
				<?php
				require_once("dbcontroller/dbcontroller.php");
				$db_handle = new DBController();

				if(isset($_SESSION["cart"])){
					$total_quantity = 0;
					$total_price = 0;
				?>	
				<table class="checkOutTable">
					<tr>
						<th>Product</th>
						<th>Quantity</th>
						<th>Unit Price</th>
						<th>Total Price</th>
					</tr>
				<?php		
					foreach ($_SESSION["cart"] as $items){
						$item_price = $items["quantity"]*$items["Price"];
				?>
					<tr>
						<td>
							<img src="<?php echo $items["Image"]; ?>" width="100" height="110" class="cart-item-image"><?php echo $items["Name"]; ?>
						</td>
						<td><?php echo $items["quantity"]; ?></td>
						<td><?php echo "Rp. ".$items["Price"]; ?></td>
						<td><?php echo "Rp. ". number_format($item_price); ?></td>
					</tr>
				<?php
						$total_quantity += $items["quantity"];
						$total_price += ($items["Price"]*$items["quantity"]);
					}
				?>
					<tr>
						<td colspan="1" align="right">Total:</td>
						<td><?php echo $total_quantity; ?></td>
						<td align="right" colspan="3"><strong><?php echo "Rp. ".number_format($total_price); ?></strong></td>
					</tr>
				</table>
				<?php
					}
				?>
			</div>
			<!-- End of Order Summary -->
		</section>

		<script src="js/dist/sweetalert2.all.min.js"></script>
		<script src="js/checkout.js"></script>

	</body>
</html>
