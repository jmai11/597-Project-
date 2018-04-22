<!--login panel from the side-->

<aside class="col-lg-4">
                    <form class="panel-group form-horizontal" role="form" action="login.php" method="post">
                        <div class="panel panel-default"> 
                            <div class="panel-heading">Login</div>
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
                                        <button type="submit" class="btn btn-info btn-block" name="submit_login">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

         <!--recent post list for side bar-->
         
                    <div class="panel panel-default">
                    <div class="panel-heading">Latest Posts</div>
                    <div class="list-group">
                        <?php 
                            $sel_sql= "SELECT * FROM blog_posts ORDER BY id DESC LIMIT 6"; 
                            $exec_side= mysqli_query($connect, $sel_sql); 
                            while ($rows = mysqli_fetch_assoc($exec_side)) {
                                if (isset($_GET['post_id'])) {
                                    if($_GET['post_id']== $rows['id']) {
                
                                        $class='active';

                                    }else {
                                        $class=''; 

                                    }

                                }else {
                                    $class=''; 
                                }

                            echo '
                            <a href="post.php?post_id='.$rows['id'].'" class="list-group-item '.$class.'">
                                        <div class="col-sm-8">
                                            <h5 class="list-group-item-heading">'.$rows['title'].'</h5>
                                            <p class="list-group-item-text">'.substr($rows['description'],0,50).'</p>
                                        </div>
                                        <div style="clear:both;"></div>
                                </a>
                                ';
                            }


                    ?>   
                </div> 
                </div> 
</aside> 

               

