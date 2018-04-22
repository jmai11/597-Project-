<?php include 'database.php';

$per_page = 5; 
    if(isset($_GET['page'])) {
        $page = $_GET['page']; 

    } else{
        $page = 1; 

    }

    $start_from = ($page- 1 ) * $per_page; 
//deleting post
    if(isset($_GET['delete_id'])) {
    	$delete_id = $_GET['delete_id']; 
    	$delete_sql = "DELETE FROM blog_posts WHERE id = '$delete_id'"; 
    	if($exec = mysqli_query($connect, $delete_sql)) {
    		$result = '<div class="alert alert-danger">You have deleted Row no. '.$delete_id.' from Database</div>';
    	}
    }


 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Post List</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
		<link rel="stylesheet" href="../bootstrap/css/home.css">  
        <script  src= "../js/jquery.js"> </script> 
        <script  src= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>

	</head>
	<body>
		<?php include 'heading.php' ?>
		<?php include 'sideadminnav.php' ?>
		
		
		<div class="col-lg-10">
			<div style="width:50px; height:50px;"></div>
				<div class="panel panel-default">
					<div class="panel-heading"><h3>Recent Posts</h3></div>
					<div class="panel-body">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>S.No</th>
									<th>Date</th>
									<th>Image</th>
									<th>Title</th>
									<th>Description</th>
									<th>Author</th>
									<th>Edit</th>
									<th>View</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									//joining blog_post and user table
									$select_sql = "SELECT * FROM blog_posts p JOIN user u ON p.author = u.user_email";
									$exec = mysqli_query ($connect, $select_sql); 
									while ($rows = mysqli_fetch_assoc($exec)) {
										echo '  
										<tr>
											<td>'.$rows['id'].'</td>
											<td>'.$rows['date'].'</td>
											<td>'.($rows['image'] =='' ? 'No Image' : '<img src="../'.$rows['image'].'" width = "50px">').'</td>
											<td>'.$rows['title'].'</td>
											<td>'.substr($rows['description'],0,50).'.....</td>
											<td>'.$rows['user_first'].''.$rows['user_last'].'</td>
											<td><a href="editposts.php?edit_id='.$rows['id'].'" class="btn btn-primary btn-xs">Edit</a></td>
											<td><a href="../blogpost.php?post_id='.$rows['id'].'" class="btn btn-primary btn-xs">View</a></td>
											<td><a href="postlist.php?delete_id='.$rows['id'].'" class="btn btn-danger btn-xs">Delete</a></td>
										</tr>
										'; 
									}

								?>
								
									
							</tbody>
						</table>
					</div>
					
				</div>

			<ul class="pagination">
			
			<?php 
                $pagin_sql = "SELECT * FROM blog_posts"; 
                $exec_pagin = mysqli_query ($connect, $pagin_sql); 
                $count = mysqli_num_rows($exec_pagin); 

                $total_pages = ceil($count/$per_page); 

                for($i=1; $i<=$total_pages; $i++){
                    echo '<li><a href="postlist.php?page='.$i.'">'.$i.'</a></li>'; 

                }
             ?>
			</ul>
		
			
				
			
			
		</div>

		<footer></footer>
	</body>
</html>