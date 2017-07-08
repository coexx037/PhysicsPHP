

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
                <a class="navbar-brand" href="block.php">Solve Problems</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    
                    <?php
                    
                        if(!isset($_SESSION['user_id'])){
                            echo "<li><a href='Login.php'>Login</a></li>";
                            echo "<li><a href='AddUser.php'>Sign Up</a></li>";
                        }else{
                            echo "<li><a href='Logout.php'>Logout</a></li>";
                        }
                    
                    ?>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>