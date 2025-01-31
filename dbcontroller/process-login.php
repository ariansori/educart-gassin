<?php
$customerID = 0;
	if( isset($_POST['login']) ) {
		//connects to dbcontroller.php file
		require_once("dbcontroller.php");
		$db_handle = new DBController();
		
		//Variable of item of elements to be INSERTED into database.
		$email = $_POST['email'];
		$password = $_POST['password']; 

		//Connect to database
		$conn = $db_handle->connectDB();
		
		//INSERT Queries puts data into database
		$query = mysqli_query($conn, "SELECT CustomerID, Email, Password
										FROM CustomerAccounts
										WHERE Email = '$email' && Password = '$password'");
									
		//Query Validation
		session_start();
		if (mysqli_num_rows($query) > 0) {
			//true, insert query is successful
			echo "<h1>Welcome $email</h1>";
			header("Location: ../dashboard.php");
			exit;
		
			mysqli_free_result($query);
			mysqli_close($conn);
		} else {
			//data failed to be inserted
			header("Location: ../login.php?error=1");
			exit;
		
			mysqli_free_result($query);
			mysqli_close($conn);
		}	
	}//End of if statement	
?>
