<!Doctype html>
<html lang="eng">
    <head>
        <meta charset="UTF-8">
	    <title>Product Page</title>

        <!--CSS Styles-->
	    <link rel="stylesheet" href="css/productpageStyles.css" type="text/css">
	    <!--End of CSS Styles-->

    </head>

    <!--Header-->
    <?php include('php/headerdashboard.php'); ?>
    <!--End of Header-->	
   
    <body>
	    <!--Product Details-->
	    <section id="product-details-container">
		    <?php
			//Connect to database
			require_once("dbcontroller/dbcontroller.php");
			$db_handle = new DBController();			
			//Get item code
			$id = $_GET["code"];
			//Run Query and store results
		    $item_details = $db_handle->runQuery("SELECT Code, Name, Image, Price
							    FROM Products
							    WHERE Code = '" . $id ."' ");
			//Display results
	        if(!empty($item_details)) {
			    foreach($item_details as $key=>$value) { 
		    ?>
	        <div id="img-container">
		        <img src="<?php echo $item_details[$key]["Image"] ?>" height="500" width="420">
		    </div>

		    <div id="details-container">
		       <form class="item" method="post" action="cart-process.php?action=add&code=<?php echo $id; ?>">
	      		    <div class="item-name">
						  <h1><?php echo $item_details[$key]["Name"] ?></h1>
					</div>
				    <div class="item-price">
						<h2>IDR.<?php echo $item_details[$key]["Price"] ?></h2>
					</div>
					<div class="item-description"> 
						<p>
						Temukan kebutuhan ATK Anda terpenuhi dengan produk-produk kami yang lengkap dan berkualitas tinggi. Kami menyediakan segala yang Anda butuhkan untuk kantor atau studi dengan kualitas terbaik yang bisa diandalkan.
					    </p>
				    </div>

				    <div class="item-cart-action">
				        Quanity:<input class="product-qty" type="text" name="quantity" value="1" size="2" required>
				        <input class="item-add-btn" type="submit" value="Add to Cart"/>
			       </div>

		        </form>
		    </div>

			<?php
			    }
			}
			?>
	    </section>
	    <!--End of Product Details-->
			   
	   <!--Footer-->
       <?php include('php/footer.php'); ?>
	   <!--End of Footer-->
	   
   </body>
</html>
