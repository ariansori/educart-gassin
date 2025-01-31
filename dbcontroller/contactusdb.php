<?php
	session_start();
		//If they click submit for the insertProductfiel then run code.
		if( isset($_POST['contactusdb']) ) {
			//connects to dbcontroller.php file
			require_once("dbcontroller.php");
			$db_handle = new DBController();
			
			//Variable of item of elements to be INSERTED into database.
			$name = $_POST['name'];
			$email = $_POST['email'];
            $phone = $_POST['phone'];
            $massage = $_POST['massage']; 
			
			//Connect to database
			$conn = $db_handle->connectDB();
			
			$query = mysqli_query($conn, "INSERT INTO contactus(nama, email, phone, massage) VALUES
                                        ('$name', '$email', '$phone', '$massage')", MYSQLI_USE_RESULT);

		
			
			//Query Validation
			if ($query) {
                //true, insert query is successful
				header("Location:../index.php");
				exit;

				mysqli_free_result($query);
			} else {
				//data failed to be inserted
				$error = mysqli_error($conn); // get the error message
				exit;
				mysqli_close($conn);
			}	
		}//End of if statement
	?>