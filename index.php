<!Doctype html>
<html lang="eng">
    <!--Header-->
	<?php include('php/header.php'); ?>
	<!--End of Header-->	
    <body>
	<!--Banner Section-->
	    <div id="Banner">
		    <h1>EDUCARTGASSIN</h1>
		    <div class="btn-wrapper">
                <a href="#product-header" class="btn-77">View Products</a>
            </div>
	    </div>
	<!--End of Banner Section-->

		<!--Banner Product Slider-->
	    <h1 id="product-header"> Best Selling </h1>
		<!-- carousel -->
		<?php
		// Create connection to database
		require_once("dbcontroller/dbcontroller.php");
		$db_handle = new DBController();
		$product_array = $db_handle->runQuery("SELECT Code, Name, Image, Price FROM Products ORDER BY Price DESC LIMIT 5");
		?>
		<style></style>
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

	    <!--Product Listings-->
	    <h1 id="product-header"> New Arrivals </h1>
	    <section class="product-grid">	   
		    <?php
//Create connection to database
require_once("dbcontroller/dbcontroller.php");
$db_handle = new DBController();
//stores results in array
$product_array = $db_handle->runQuery("SELECT Code, Name, Image, Price
					FROM Products
					 ORDER BY ItemID ASC");
//loop through results and display results
if(!empty($product_array)) {
	foreach($product_array as $key=>$value) { 
	?>
			    <div class="product-item">
				    <form class="item" method="post" action="productPage.php?action=add&code=<?php echo $product_array[$key]["Code"]; ?>">
					    <div class="image">
					        <a href="productPage.php?code=<?php echo $product_array[$key]["Code"]; ?>">
							    <img src="<?php echo $product_array[$key]["Image"]; ?>" width="230" height="250">
							</a>
					    </div>
						<div class="item-details">
					        <div class="name">
						        <?php echo $product_array[$key]["Name"]; ?>
						    </div>
					        <div class="price">
						        <?php echo "IDR. ".$product_array[$key]["Price"]; ?>
						    </div>
								<div class="cart-action">
								<input class="add-btn" type="button" onclick="Swal.fire('Login First')" value="Shop" />
								</div>
						</div>
					</form>
			    </div>
			    <?php
			    }
			}
			?>
	    </section>
	    <!--End of Product Listings-->

		<!-- About us -->
        <div id="container-aboutus">
            <h1 class="h1-aboutus text-light text-center"><br>ABOUT US
                <p class="p-aboutus text-center"><br>"Selamat datang di EduCartGassin, platform e-commerce internal eksklusif bagi warga sekolah!
                    <br>Kami menyediakan beragam perlengkapan sekolah dan alat tulis kantor untuk memenuhi
                    <br>kebutuhan belajar dan aktivitas sehari-hari. Dengan antarmuka intuitif, nikmati kemudahan
                    <br>berbelanja dan kelola pesanan dengan cepat.
                    <br><br>Dari pulpen hingga peralatan kreatif, EduCartGassin memiliki koleksi produk lengkap.
                    <br>Keunggulan kami tidak hanya pada kenyamanan berbelanja, tetapi juga pada sistem
                    <br>pembayaran yang aman.
                    <br>Bergabunglah dengan EduCartGassin, platform yang didesain untuk meningkatkan efisiensi,
                    <br>mendukung pembelajaran, dan memenuhi kebutuhan sehari-hari di lingkungan sekolah.</p>
            </h1> 
        </div>
		<!-- end about us -->

        <!-- Contacts -->
        <div id="container-contact">
            <div class="item-contact">
                <div class="contact">
                    <div class="first-text">Let's get in touch</div>
                    <img src="img/contact-image.png" alt="" class="image">
                    <div class="social-link">
                        <span class="secnd-text">Connect with us:</span>
                        <ul class="social-media">
                            <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="submit-form">
                    <h4 class="third-text">Contact Us</h4>
                    <form action="dbcontroller/contactusdb.php" method="POST">
                        <div class="input-box">
                            <input type="text" class="input" name="name" required>
                            <label for="">Name</label>
                        </div>
                        <div class="input-box">
                            <input type="email" class="input" name="email" required>
                            <label for="">Email</label>
                        </div>
                        <div class="input-box">
                            <input type="tel" class="input" name="phone" required>
                            <label for="">Phone</label>
                        </div>
                        <div class="input-box">
							<textarea name="massage" class="input" required id="massage" cols="30" rows="10"></textarea>
                            <label for="">Massage</label>
                        </div>
                        <button type="submit" name="contactusdb" value="contactusdb" onclick="Swal.fire('Fill in first, Thank you for the message')">Submit</button>
                    </form>
                </div>
            </div>
        </div>
		<!-- end contact us -->

		<script src="js/dist/sweetalert2.all.min.js"></script>

	    <!--Footer-->
        <?php include('php/footer.php'); ?>
	    <!--End of Footer-->
	
    </body>
</html>
