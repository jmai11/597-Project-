<!--login credentials success-->

<?php session_start(); 
	include 'database.php'; 
	if(isset($_SESSION['user']) && isset($_SESSION['password']) == true) {
		$select_sql = "SELECT * FROM user WHERE user_email = '$_SESSION[user]' AND user_password = '$_SESSION[password]'"; 
		if($exec_sql = mysqli_query($connect, $select_sql)) {
			while($rows= mysqli_fetch_assoc($exec_sql)) {
				$user_first = $rows['user_first']; 
				$user_last = $rows['user_last']; 
				$user_email = $rows['user_email']; 
				$user_about = $rows['user_about'];
				$user_image = $rows['user_image']; 
				if(mysqli_num_rows($exec_sql)== 1) {
					//if($rows['role'] == '') {

					//} else {
						//header('Location:index.php');
					//}
				} else {
					header('Location:index.php');

				}

			}
		}
	} else {
		header('Location:index.php');
	}



?>
<!DOCTYPE html>
<html>
	<head>
		<title>My Profile</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
		<link rel="stylesheet" href="../bootstrap/css/home.css">  
        <script  src= "../js/jquery.js"> </script> 
        <script  src= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>
	</head>
	<body>
		<!--navbar-->
		<?php include 'heading.php' ?>
		<div style="width:50px; height:50px;"></div>

		<!--side navbar-->
		<?php include 'sideadminnav.php' ?>
		<div class="col-lg-10">
		<div style="width:50px; height:50px;"></div>
			 	
			 	<!--profile dashboard-->
			 	<div class="col-lg-15">
			 		<div class="panel panel-default">
			 			<div class="panel-heading">
			 				<div class="col-md-3">
			 					<img src="<?php echo $user_image; ?>" width="100%" class="img-thumbnail">
			 				</div>
			 				<div class="col-md-7">
			 				<h2><u><?php echo $user_first.''.$user_last; ?></u></h2>
			 				<p><i class="glyphicon glyphicon-road"> 216 Tall Oak, Irvine, CA 92603 </i></p>
			 				<p><i class="glyphicon glyphicon-phone"> 818243323 </i></p>
			 				<p><i class="glyphicon glyphicon-envelope"> <?php echo $user_email; ?>  </i></p>
			 				</div>
			 				<div class="clearfix"></div>
			 			</div>
			 		</div>
			 	</div>

			 

			 <div class="col-md-12">
			<div class="page-header"><h2>About Me</h2></div>
			<div class="container-fluid">
				 
					<div class="panel-heading">
						<div class="container-fluid">
						<p><h4><?php echo $user_about; ?></h4></p>
						</div>

					</div>
				</div>
			</div>
			</div>
		</div>

			
				
			
			
			
		</div>

		
	</body>
</html>