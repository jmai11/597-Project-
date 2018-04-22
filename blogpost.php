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
        <?php include 'heading.php' ?>
         <div class="container">
            <article class="row"> 
                <section class="col-lg-8">
                    <?php 
                        $select_sql = "SELECT * FROM blog_posts WHERE id='$_GET[post_id]'"; 
                        $exec_sql= mysqli_query($connect, $select_sql);
                        while($rows= mysqli_fetch_assoc($exec_sql)) {
                            echo '<div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="panel-header">
                                            <h2 class="text-capitalize">'.$rows['title'].'</h2>
                                        </div>
                                        <img src="'.$rows['image'].'" width="100%">
                                        <p>'.$rows['description'].'</p>
                                    </div>
                                </div>';
                        }

                    ?>
                  
                </section>                
              <?php include 'side.php'?>
            </article>
         </div>
         <div style="width:50px;height:50px"></div>
        <?php include 'footer.php'?>
    </body>
 </html>