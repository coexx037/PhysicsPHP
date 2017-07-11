<?php require_once("../resources/functions.php"); ?>
<?php addUserSubmit(); ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Physics</title>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="/stylesheets/main.css">
    </head>
    <body>

<div class="container">

      <header>
            <h1 class="text-center">Signup</h1>
            <div class="alert alert-success" role="alert">
            <h2><?php display_message(); ?></h2></div>
        <div class="col-sm-4 col-sm-offset-5"> 
        
            <form class="" action="" method="post">
                <div class="form-group"><label for="">
                    <input type='text' name='username' placeholder='username' class="form-control">
                </div>
                <div class="form-group"><label for="">
                    <input type='password' name='pwd' placeholder='password' class="form-control">
                </div>

                <div class="form-group">
                  <input type="submit" name="submit" class="btn btn-primary" >
                </div>
            </form>
        </div>  

    </header>

</div>
