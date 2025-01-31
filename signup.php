<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="icon" type="favicon.ico" href="img/logos/ATK LOGO.png">
    <link rel="stylesheet" href="css/login.css" type="text/css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    
</head>
<body>
<div class="wrapper">
    <h1>Register</h1>
    <form action="dbcontroller/register.php" method="POST">
        <div class="input-box"> 
            <input type="text" placeholder="email" name="email"/>
            <i class='bx bxs-user'></i>
        </div>
        <div class="input-box"> 
            <input type="password" placeholder="password" name="password"/>
            <i class='bx bxs-lock-alt' ></i>
        </div>

        <button type="submit" class="btnlog" name="register" value="register">Register</button>
        <div class="register-link">
            <p>Do you have a account? <a href="login.php" 
            class="registerBtn-link">Login</a></p>
        </div>
    </form>
    <div class="text-center mt-3">
        <a href="index.php" class="btn btn-primary">Back to Home</a>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>