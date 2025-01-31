<?php
session_start();
?>
<!doctype html>
<html lang="eng">

    <head>
        <meta charset="UTF-8">
	    <title>Shopping Cart</title>

        <!--CSS Styles-->
	    <link rel="stylesheet" href="css/cart.css" type="text/css">
	    <!--End of CSS Styles-->

    </head>
    <!--Navigation Bar-->
    <?php include('php/headerdashboard.php'); ?>
    <!--End of Navigation Bar-->	
   
   <body> 
	    <!--Shopping Cart -->
		<section id="shopping-cart">
			<div class="shop-heading text-light"><h2>Shopping Cart</h2></div>
			<?php
			if(isset($_SESSION["cart"])){
				$total_quantity = 0;
				$total_price = 0;
			?>	
			<div class="cart-table-container text-light">
				<table class="cart-table text-light">
					<tr>
						<th>Product</th>
						<th>Name</th>
						<th>Quanity</th>
						<th>Unit Price</th>
						<th>Total Price</th>
						<th>Remove</th>
					</tr>
					<?php		
						foreach ($_SESSION["cart"] as $item){
							//$item_price = $item["quantity"] * $item["Price"];
							
							?>
					<tr>
						<td><img src="<?php echo $item["Image"]; ?>" height="120" width="105"/></td>
						<td><?php echo $item["Name"]; ?></td>
						<td><?php echo $item["quantity"]; ?></td>
						<td><?php echo "Rp. ".$item["Price"]; ?></td>
						<td><?php echo "Rp. ". number_format($item["UnitTotal"], 2); ?></td>
						<td>
						    <a href="cart-process.php?action=remove&code=<?php echo $item["Code"]; ?>" class="btnRemoveAction">
							    <img src="img/icon-delete.png" alt="Remove Item" />
							</a>
						</td>
					</tr>
					<?php

						} //end of loop
					?>
					<tr>
						<td colspan="2"></td>
						<td><?php echo $_SESSION["totalQty"]; ?></td>
						<td colspan="3" text-align="center"><strong>Total: <?php echo "Rp. ".number_format($_SESSION["total"]); ?></strong></td>
					</tr>
				</table>
			</div>	
			
			<!--Checkout button-->
			<div class="align-right">
				<a class="btn-action" name="check_out" href="checkout.php"> Go To Checkout </a>
				<a id="btn-empty" href="cart-process.php?action=empty"> Empty Cart </a>
			</div>
			<!--Checkout button-->
			
			<?php
			} else {
			?>
			<div class="no-items text-light"><h2>Your Cart is Empty</h2></div>
			<?php 
			}
			?>

			
		</section>
		<!--End of Shopping Cart-->

		<!--Banner Product Slider-->
		<div class="goproduct text-center">
			<a class="btn-action" name="goproduct"  href="dashboard.php"> Go To Product </a>
			</div>
	    <h1 id="product-header"> Best Selling </h1>
		<!-- carousel -->
		<?php
		// Create connection to database
		require_once("dbcontroller/dbcontroller.php");
		$db_handle = new DBController();
		$product_array = $db_handle->runQuery("SELECT Code, Name, Image, Price FROM Products ORDER BY Price DESC LIMIT 5");
		?>
		<style>
			
		</style>
		<section id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-indicators">
			<?php
			// Generate carousel indicators dynamically
			if(!empty($product_array)) {
			foreach($product_array as $index => $product) {
				$active = $index === 0 ? 'active' : '';
				echo '<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="' . $index . '" class="' . $active . '" aria-current="true" aria-label="Slide ' . ($index + 1) . '"></button>';
			}
			}
			?>
		</div>
		<div class="carousel-inner">
			<?php
			// Generate carousel items dynamically
			if(!empty($product_array)) {
			foreach($product_array as $index => $product) {
				$active = $index === 0 ? 'active' : '';
				echo '<div class="carousel-item ' . $active . '">';
				echo '<img src="' . $product["Image"] . '" class="d-block w-90 " alt="' . $product["Name"] . '">';
				echo '<div class="carousel-caption text-dark">';
				echo '<h5>' . $product["Name"] . '</h5>';
				echo '<p>$' . number_format($product["Price"], 2) . '</p>';
				echo '</div>';
				echo '</div>';
			}
			}
			?>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button>
		
		</section>
		<!-- end of carousel -->
		<!--End of Banner Product Slider-->	 
	
		<!--Footer-->
			<?php include('php/footer.php'); ?>
		<!--End of Footer-->
	</body>
</html>