<?php
//inisialisasi
$adminID = 0;
//memeriksa formulir login dikirim
	if( isset($_POST['loginadmin']) ) {
		//connects to dbcontroller.php file
		require_once("dbcontroller.php");
$db_handle = new DBController();
		
		//Variable of item of elements to be INSERTED into database.
		$username = $_POST['username'];
$password = $_POST['password']; 

		//Connect to database
		$conn = $db_handle->connectDB();
		
		//INSERT Queries puts data into database
		$query = mysqli_query($conn, "SELECT adminID, username, Password
										FROM Admin
										WHERE username = '$username' && Password = '$password'");
									
		//Query Validation
		session_start();
		if (mysqli_num_rows($query) > 0) {
			//true, insert query is successful
			echo "<h1>Welcome $username</h1>";
			header("Location: dashboardadmin.php");
			exit;
		
			mysqli_free_result($query);
			mysqli_close($conn);
		} else {
			//data failed to be inserted
			header("Location: loginadmin.php?error=1");
			exit;
		
			mysqli_free_result($query);
			mysqli_close($conn);
		}	
	}//End of if statement	
?>
