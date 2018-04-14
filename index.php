<!DOCTYPE html> 
<html> 
    <head>
        <title> Community</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap/css/custom.css">
        <script  src= "js/jquery.js"> </script> 
        <script  src= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script> 
    </head> 
    <body>
        <div class="container-fluid" style=" margin-top: 150px;">
           <div class= "row"> 
                <div class="col-md-4 col-md-offset-4">
    
                        <div class="panel-body">
                            <form class="panel-group form-horizontal" role="form" action="login.php" method="post">
                        <div class="panel panel-default"> 
                            <center><label for="login"><h3>Welcome to Community</h3></label></center>
                            <h5>Live. Explore. Share.</h5>
                            <div class="panel-body">
                                <div class="form-group"> 
                                    <label for="username" class="control-label col-sm-4">User Name</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="username" placeholder="Email Address" name="username" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group"> 
                                    <label for="password" class="control-label col-sm-4">Password</label>
                                    <div class="col-sm-7">
                                        <input type="password" id="password" name="password" placeholder="password" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group"> 
                                    <label for="submit" class="control-label col-sm-4"></label>
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success btn-block" name="submit_login">Login</button>
                                    </div>
                                </div>
                                <div class="form-group"> 
                                    <label for="submit" class="control-label col-sm-4"></label>
                                    <div class="col-sm-12">
                                        <a href="sign_up.php">Join Community</a> |
                                        <a href="homepage.php">Continue as Guest</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                            
                        </div>
                   
                    
                </div>

            </div>
        </div>
         
    </body>
 </html>

       