
<!--user login-->
<?php session_start();
    include 'database.php'; 
        $login_err =''; 
    if(isset($_GET['login_error'])) {
        if($_GET['login_error'] =='empty') {
            $login_err = '<div class="alert alert-danger"> Username or Password was empty!</div>'; 

        } elseif($_GET['login_error'] =='wrong') {
            $login_err = '<div class="alert alert-danger"> Username or Password was wrong!</div>'; 
        } elseif($_GET['login_error'] =='query_error') {
            $login_err = '<div class="alert alert-danger"> Query or database issue!</div>'; 
        }
    }
    
    //loading 5 posts per page for pagination 
    $per_page = 5; 
    if(isset($_GET['page'])) {
        $page = $_GET['page']; 

    } else{
        $page = 1; 

    }

    $start_from = ($page- 1 ) * $per_page; 
?>

<?php include 'database.php'; ?>

<!DOCTYPE html> 
<html> 
    <head>
		<title> Community</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap/css/home.css">  
        <script  src= "js/jquery.js"> </script> 
        <script  src= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script> 
    </head> 
    <body>
    	<!--navbar-->
        <?php include 'heading.php' ?>
         <div class="container">
            <article class="row"> 
                <section class="col-lg-8">
                    

			<!---body for blog posting-->

                    <?php
                        $sel_sql = "SELECT * FROM blog_posts p JOIN user u ON p.author = u.user_email ORDER BY id DESC LIMIT $start_from, $per_page";
                        $run_sql = mysqli_query($conn, $sel_sql); 
                        while ($rows= mysqli_fetch_assoc($run_sql)) {
                          echo ' <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="text-capitalize"><strong><a href="blogpost.php?post_id='.$rows['id'].'">'.$rows['title'].'</a></strong></h4>
                                </div>
                                <div class="panel-body">
                                    <div class="col-lg-4">
                                        <img src="'.$rows['image'].'" width="100%">
                                    </div>
                                    <div class="col-lg-8">
                                        <p>'.substr($rows['description'],0,300).'.....<a href="blogpost.php?post_id='.$rows['id'].'">Read More</a></p>
                                    </div>
                                </div>
                                 <div class="panel-footer text-right">'.$rows['user_first'].''.$rows['user_last'].'</div>
                                 
                                </div> 

                            ';

                        }
                    ?>



                </section> 

                <!--sidebar-->

                <?php include 'side.php'?>

            </article>

        <!--numbering pages for homepage-->

            <div class="text-center">
            <ul class="pagination">
            <?php 
                $pagination_sql = "SELECT * FROM blog_posts"; 
                $run_pagination = mysqli_query ($conn, $pagination_sql); 
                $count = mysqli_num_rows($run_pagination); 

                $total_pages = ceil($count/$per_page); 

                for($i=1; $i<=$total_pages; $i++){
                    echo '<li><a href="homepage.php?page='.$i.'">'.$i.'</a></li>'; 

                }
             ?>
            
                

                </ul>
            </div>
         </div>
         <div style="width:50px;height:50px"></div>
         
         <!--footer-->

        <?php include 'footer.php'?>
    </body>
 </html>