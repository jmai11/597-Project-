<?php session_start(); 
	include 'database.php'; 
	if(isset($_SESSION['user']) && isset($_SESSION['password']) == true) {
		$select_sql = "SELECT * FROM user WHERE user_email = '$_SESSION[user]' AND user_password = '$_SESSION[password]'"; 
		if($exec_sql = mysqli_query($connect, $select_sql)) {
			while($rows= mysqli_fetch_assoc($exec_sql)) { 
				if(mysqli_num_rows($exec_sql) == 1) {
					
				} else {
					header('Location:../index.php');

				}

			}
		}
	} else {
		header('Location:../index.php');
	}

	$error = ''; 
  //updating the blog post in order to edit post
	if (isset($_POST['update_post'])) {
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
							$update_sql = "UPDATE blog_posts SET title='$title', description='$_POST[description]', image='$image_db_path', date='$date', author='$_SESSION[user]' WHERE id='edit_id'";  
						if(mysqli_query($connect, $update_sql)) {
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
			$EditForm= $_GET['edit_id'];
			$update_sql = "UPDATE blog_posts SET title='$title', description='$_POST[description]', date='$date', author='$_SESSION[user]' WHERE id='$EditForm'"; 
			if(mysqli_query($connect, $update_sql)) {
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
		<title>Edit Post</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
		<link rel="stylesheet" href="../bootstrap/css/home.css"> 
        <script  src= "../js/jquery.js"> </script> 
        <script  src= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script> 
        <script>tinymce.init({ selector:'textarea' });</script>
	</head>
	<body>
		<?php include 'heading.php' ?>
		<div style="width:50px; height:50px;"></div>
		<?php  echo $error; include 'sideadminnav.php' ?>
		<div class="col-lg-8">

			<!--post editing-->
			<?php 
				if(isset($_GET['edit_id'])) {

				$select_sql = "SELECT * FROM blog_posts WHERE id = '$_GET[edit_id]'";
				$exec = mysqli_query($connect, $select_sql); 
				while ($rows = mysqli_fetch_assoc($exec)) { ?>
					<div class="page-header"><h2><?php echo $rows['title']; ?></h2></div>
						<div class="container-fluid"> 
							<form class="form-horizontal" action="editposts.php?edit_id=<?php echo $_GET['edit_id'];?>" method="post" enctype="multipart/form-data">
							<input type="hidden" name="post_id" value="<?php echo $rows['id']; ?>">
				<img src="../<?php echo $rows['image']; ?>" width="100px">
				<div class="form-group">
					<label for="image">Upload an Image</label>
					<input id="image" type="file" name="image" class="btn btn-default">
				</div>
				<div class="form-group">
					<label for="title">Title</label>
					<input id="title" type="text" name="title" value="<?php echo $rows['title']; ?>" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="description">Description</label>
					<textarea id="description" name="description"> <?php echo $rows['description']; ?></textarea>
				</div>
				<div class="form-group">
					<input type="submit" value="Update Post" name="update_post" class="btn btn-secondary btn-block">
				</div>

			</form>
			</div>


					<?php }

					} else {
						echo '<div class= "alert alert-danger">Please select a post to edit!</div>'; 

					}


			?>
			
			
			
				
			
			
		</div>

		<footer></footer>
	</body>
</html>