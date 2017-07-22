

<div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Home</a>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <!--<div id="bs-example-navbar-collapse-1">-->
                    
                    <?php
                    
                        if(!isset($_SESSION['user_id'])){
                            echo "<a href='Login.php'>Login</a>";
                            echo "<a href='AddUser.php'>Sign Up</a>";
                        }else{
                            echo "<a href='Logout.php'>Logout</a>";
                        }
                    
                    ?>
            </div>
            <!--</div>-->
            <!-- /.navbar-collapse -->
        </div>