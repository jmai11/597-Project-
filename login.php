<?php session_start(); 
	include 'database.php'; 
	if(isset($_POST['submit_login'])){
		if(!empty($_POST['username']) && !empty($_POST['password'])) {
			$get_username = mysqli_real_escape_String( $connect, $_POST['username']); 
			$get_password = mysqli_real_escape_String( $connect, $_POST['password']); 
			$sql = "SELECT * FROM user WHERE user_email= '$get_username' AND user_password='$get_password'"; 
			if ($result=mysqli_query($connect, $sql)) {
				while($rows = mysqli_fetch_assoc($result)) {
					if(mysqli_num_rows($result) == 1 ){
						$_SESSION['user'] =$get_username; 
						$_SESSION['password'] =$get_password; 
						$_SESSION['user_role']= $rows['user_role']; 
						header( 'Location: profile/index.php'); 
					} else { 
						header('Location:homepage.php?login_error=wrong');

					}
				}
				

			} else {
				header('Location:homepage.php?login_error=query_error'); 
			}

		} else {
			header( 'Location:homepage.php?login_error=empty'); 
		}
	} else {}




?>