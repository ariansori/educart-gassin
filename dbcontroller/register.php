	<?php
	session_start();
		//If they click submit for the insertProductfiel then run code.
		if( isset($_POST['register']) ) {
			//connects to dbcontroller.php file
			require_once("dbcontroller.php");
			$db_handle = new DBController();
			
			//Variable of item of elements to be INSERTED into database.
			$email = $_POST['email'];
			$password = $_POST['password']; 
			
			//Connect to database
			$conn = $db_handle->connectDB();
			
			//INSERT Queries puts data into database
			$query = mysqli_query($conn, "INSERT INTO CustomerAccounts(Email, Password) VALUES
										('$email', '$password')", MYSQLI_USE_RESULT);		
			
			//Query Validation
			if ($query) {
				//true, insert query is successful
				echo "<h1>Welcome $email</h1>";
				header("Location:../login.php");
				exit;

				mysqli_free_result($query);
				mysqli_close($conn);
			} else {
				//data failed to be inserted
				$error = mysqli_error($conn); // get the error message
				header("Location:../signup.php?error=$error");
				exit;

				mysqli_close($conn);
			}	
		}//End of if statement
	?>