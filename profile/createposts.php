<?php session_start(); 
	include 'database.php'; 
	if(isset($_SESSION['user']) && isset($_SESSION['password']) == true) {
		$sel_sql = "SELECT * FROM user WHERE user_email = '$_SESSION[user]' AND user_password = '$_SESSION[password]'"; 
		if($run_sql = mysqli_query($conn, $sel_sql)) {
			while($rows= mysqli_fetch_assoc($run_sql)) { 
				if(mysqli_num_rows($run_sql) == 1) {
					//if($rows['role'] == '') {

					//} else {
						//header('Location:../index.php');
					//}
				} else {
					header('Location:../index.php');

				}

			}
		}
	} else {
		header('Location:../index.php');
	}

	$error = ''; 

	//adding image with post
	if (isset($_POST['create_post'])) {
		$title = strip_tags($_POST['title']); 
		$date = date('Y-m-d h:i:s'); 
		if ($_FILES['image']['name'] != '') {
			$image_name = $_FILES['image']['name']; 
			$image_tmp = $_FILES['image']['tmp_name']; 
			$image_size = $_FILES['image']['size']; 
			$image_ext = pathinfo($image_name, PATHINFO_EXTENSION); 
			$image_path = '../images/'.$image_name; 
			$image_db_path = 'images/'.$image_name; 

			if($image_size < 1000000) {
				if ($image_ext == 'jpg' || $image_ext == 'png' || $image_ext == 'gif') {
					if (move_uploaded_file($image_tmp,$image_path)){
							$ins_sql = "INSERT INTO blog_posts (title, description, image, date, author) VALUES ('$title', '$_POST[description]', '$image_db_path', '$date', '$_SESSION[user]') "; 
						if(mysqli_query($conn, $ins_sql)) {
							header('Location:postlist.php'); 
						} else {
							$error = '<div class="alert alert-danger"> the query didnt work!</div>'; 
						}

					} else {
						$error = '<div class="alert alert-danger"> Sorry, unfortunately image has not been uploaded</div>';

					}
				} else { 

					$error = '<div class="alert alert-danger"> image format is not correct</div>'; 
				}

			} else { 

					$error = '<div class="alert alert-danger"> Image file size is too big!</div>'; 
			}
		} else {

			//creating post without image
			$ins_sql = "INSERT INTO blog_posts (title, description, date, author) VALUES ('$title', '$_POST[description]', '$date', '$_SESSION[user]') "; 
			if(mysqli_query($conn, $ins_sql)) {
				header('postlist.php'); 
				} else {
					$error = '<div class="alert alert-danger"> the query didnt work!</div>'; 
				}
		}

	}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Admin Panel</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
		<link rel="stylesheet" href="../bootstrap/css/home.css">  
        <script  src= "../js/jquery.js"> </script> 
        <script  src= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script> 
        <script>tinymce.init({ selector:'textarea' });</script>
	</head>
	<body>
		<?php include 'heading.php' ?>
		<?php  echo $error; include 'sideadminnav.php' ?>
		
		<!--posting form-->
		<div class="col-lg-8">
			<div style="width:50px; height:50px;"></div>
			<div class="page-header"><h2>Write to the Community</h2></div>
			<div class="container-fluid"> 
				<form class="form-horizontal" action="createposts.php" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="image">Upload an Image</label>
					<input id="image" type="file" name="image" class="btn btn-default">
				</div>
				<div class="form-group">
					<label for="title">Title</label>
					<input id="title" type="text" name="title" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="description">Description</label>
					<textarea id="description" name="description"></textarea>
				</div>
				<div class="form-group">
					<input type="submit" value="Submit Post" name="create_post" class="btn btn-info btn-block">
				</div>

			</form>
			</div>
			
				
			
			
		</div>

		<footer></footer>
	</body>
</html>