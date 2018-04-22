
<!--signup data sent to user table in sql-->

<?php include 'database.php'; 
    $conf=''; 
    if(isset($_POST['join_user'])) {

        if($_POST['password'] == $_POST['confirm_password']) {
            $date= date('Y-m-d h:i:s');
            $insert_sql= "INSERT INTO user (user_role, user_first, user_last, user_name, user_email, user_password, user_about, user_image, date) VALUES ( 'subscriber','$_POST[fname]', '$_POST[lname]', '$_POST[username]', '$_POST[email]','$_POST[password]', '$_POST[aboutme]', '', '$date')"; 
            $exec_sql = mysqli_query($connect, $insert_sql); 

        }else {
            $conf = '<div class="alert alert-danger">The passoword does not match!</div>';

        }
    }

?>


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
                    <div class="page-header">
                        <h2>Join Community</h2>
                        
                    </div>
                    <?php echo $conf; ?> 

                    <!--sign up form-->
                    <form class= "form-horizontal" action="sign_up.php" method="post" role="form"> 
                        <div class="form-group">
                            <label for= "first_name" class="col-sm-2 control-label">First Name*</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="fname" placeholder="first name" id="fname" required>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for= "last_name" class="col-sm-2 control-label">Last Name*</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="lname" placeholder="last name" id="lname" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for= "username" class="col-sm-2 control-label">Username*</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="username" placeholder="username" id="username" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for= "email" class="col-sm-2 control-label">Email Address*</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" name="email" placeholder="@email" id="email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for= "password" class="col-sm-2 control-label">Password*</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" name="password" placeholder="type a password" id="password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for= "confirm_password" class="col-sm-2 control-label">Confirm Password*</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" name="confirm_password" placeholder="confirm password" id="confirm_password" required>
                            </div>
                        </div>
                
                         <div class="form-group"> 
                            <label for="aboutme" class="col-sm-2 control-label"> About me: *</label>
                            <div class="col-sm-8">
                                <textarea id="aboutme" name="aboutme" class="form-control" rows="6" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for= "name" class="col-sm-2 control-label"></label>
                            <div class="col-sm-8">
                                <input type="submit" value="Join" class="btn btn-block btn-info" name="join_user"  id="submit">
                            </div>
                        </div>
                    </form>
                </section> 

                <!--side bar-->               
              <?php include 'side.php'?>
            </article>
         </div>
         <div style="width:50px;height:50px"></div>

         //footer
         <?php include 'footer.php'?>
    </body>
 </html>