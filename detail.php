<?php include 'includes/database.php'; ?> 

<html>
	<head>
		<title></title>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="js/jquery.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
	<body>
		<div class="container">
			<div class="jumbotron">
				<h1>User Details</h1>
				<p>Let just get the complete details</p>
		</div>
		<?php 
			$sql = "SELECT * FROM comments"; 
			$run = mysqli_query($conn, $sql); 
			while ($rows= mysqli_fetch_assoc($run)) {
				echo '<div class="row">
			<strong class="col-sm-3">Name</strong>
			<div class="col-sm-3">John</div>
		</div>
		<div class="row">
			<strong class="col-sm-3">Email Address</strong>
			<div class="col-sm-3">john</div>
		</div>
		<div class="row">
			<strong class="col-sm-3">Subject</strong>
			<div class="col-sm-3">John</div>
		</div>
		<div class="row">
			<strong class="col-sm-3">Gender</strong>
			<div class="col-sm-3">John</div>
		</div>
		<div class="row">
			<strong class="col-sm-3">Skills</strong>
			<div class="col-sm-3">John</div>
		</div>
		<div class="row">
			<strong class="col-sm-3">Country</strong>
			<div class="col-sm-3">USA</div>
		</div>
		<div class="row">
			<strong class="col-sm-3">Comment</strong>
			<div class="col-sm-3">DNSKJNDAS</div>
		</div>'; 
				
		
			}
		?>
		
	</body>
</html>