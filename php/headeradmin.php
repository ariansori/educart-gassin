<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Dashboard</title>

	<!--Icon-->
	<link rel="icon" type="favicon.ico" href="img/logos/ATK LOGO.png" />
	<!--End of Icom-->

	<!--Google fonts-->
	<link rel="preconnect" href="https://fonts.gstatic.com" />
	<link
		href="https://fonts.googleapis.com/css2?family=Rubik&display=swap"
		rel="stylesheet"
	/>
	<!--End of Google fonts-->

	<!--CSS Styles-->
	<link rel="stylesheet" href="css/dashboardadmin.css" type="text/css" />
	<!--End of CSS Styles-->

	<!-- bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<!-- End bootstrap -->

	<!-- fontawesome -->
	<link
		rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
		integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
		crossorigin="anonymous"
		referrerpolicy="no-referrer"
	/>
	<link
		href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
		rel="stylesheet"
	/>
	<!-- End fontawesome -->
</head>
<body>
	<!--Navigation-->
	<header class="nav-bar">
	<nav class="navbar navbar-expand-lg bg-body-primary">
		<div class="container-fluid">
		<a id="store-logo" href="dashboardadmin.php">
			<img src="img/logos/ATK LOGO.png" alt="Store Logo" />
		</a>
		<button
			class="navbar-toggler"
			type="button"
			data-bs-toggle="collapse"
			data-bs-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent"
			aria-expanded="false"
			aria-label="Toggle navigation"
		>
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
			<li class="nav-item">
				<a class="nav-link links" href="dashboardadmin.php">Product</a>
			</li>
			<li class="nav-item">
				<a class="nav-link links" href="order.php">Orders</a>
			</li>
			<li class="nav-item">
				<a class="nav-link links" href="index.php">Logout</a>
			</li>     
		</div>
		</div>
	</nav>
	</header>
	
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>	
</body>
</html>
