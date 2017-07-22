

<div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Home</a>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <!--<div id="bs-example-navbar-collapse-1">-->
                    
                    <?php
                    
                        if(!isset($_SESSION['user_id'])){
                            echo "<a class='navbar-brand' href='Login.php'>Login</a>";
                            echo "<a class='navbar-brand' href='AddUser.php'>Sign Up</a>";
                        }else{
                            echo "<a class='navbar-brand' href='Logout.php'>Logout</a>";
                        }
                    
                    ?>
            </div>
            <!--</div>-->
            <!-- /.navbar-collapse -->
        </div>