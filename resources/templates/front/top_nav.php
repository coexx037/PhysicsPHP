

<div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
        <div class='container-fluid'>
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Home</a>
            </div>
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
        </div>
</div>