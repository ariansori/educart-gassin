<!Doctype html>
<html lang="eng">
    <head>
	    <title>Login Admin</title>
    	<!--CSS Styles-->
		<link rel="stylesheet" href="css/login.css" type="text/css">
		<!--End of CSS Styles-->
		<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">		
	</head>
	<body>
		<!--Login Admin Form-->
		<div class="login-form">
		<div class="wrapper">
    		<h1>Login Admin</h1>
				<form action="dbcontroller/process-loginadmin.php" method="POST">
					<div class="input-box"> 
						<input type="text" placeholder="username" name="username" required/>
						<i class='bx bxs-user'></i>
					</div>
					<div class="input-box"> 
						<input type="password" placeholder="password" name="password" required/>
						<i class='bx bxs-lock-alt' ></i>
					</div>

					<div class="remember-forgot">
						<label><input type="checkbox"> Remember me</label>
						<a href="#">Forgot password?</a>
					</div>
					<button type="submit" class="btnlog" name="loginadmin" value="Loginadmin">Login</button>
					<div class="register-link">
						<p>Don't have a account? <a href="register.php" 
						class="registerBtn-link">Register</a></p>
					</div>
				</form>
				<div class="text-center mt-3">
					<a href="index.php" class="btn btn-primary">Not Admin</a>
				</div>
			</div>
		</div>
		</div>
		<!--End of Login Admin Form-->
	</body>
</html>