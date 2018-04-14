<!--contact data sent to contact table-->

<?php include 'database.php'; 
    if(isset($_POST['submit_contact'])) {
        $date= date('Y-m-d h:i:s');
        $ins_sql= "INSERT INTO contact (name, email, subject, comment, date) VALUES ('$_POST[name]', '$_POST[email]','$_POST[subject]','$_POST[comment]','$date')"; 
        $run_sql = mysqli_query($conn, $ins_sql); 
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


        <!--contact form-->
         <div class="container">
            <article class="row"> 
                <section class="col-lg-8">
                    <div class="page-header">
                        <h2>Contact Form</h2>
                        
                    </div>
                    <form class= "form-horizontal" action="contact_page.php" method="post" role="form"> 
                        <div class="form-group">
                            <label for= "name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" placeholder="Name" id="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for= "email" class="col-sm-2 control-label">Email Address</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="email" placeholder="@email" id="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for= "subject" class="col-sm-2 control-label">Subject</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="subject" placeholder="Subject here" id="subject">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for= "comment" class="col-sm-2 control-label">Comment</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" rows="10" placeholder="Type your questions, concerns or comments here.." name="comment" style="resize:none;"> </textarea> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for= "name" class="col-sm-2 control-label"></label>
                            <div class="col-sm-8">
                                <input type="submit" value="Submit Now" class="btn btn-block btn-info" name="submit_contact"  id="submit">
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