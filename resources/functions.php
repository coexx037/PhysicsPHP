<?php
include('config.php');
include('solve_library.php');

function last_id(){
    global $link;
    
    return mysqli_insert_id($link);
}

function set_message($msg){
    if(!empty($msg)){
        $_SESSION['message'] = $msg;
    }else{
        $msg = "";
    }
}

function display_message(){
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

//validate user, insert user into database, define user in the session
function addUserSubmit(){
    global $link;
    
    if(!isset($_POST['username'], $_POST['pwd'])){
        set_message('Please enter valid username and password');
    }
    
    elseif(strlen($_POST['username'])>20 || strlen($_POST['username'])<4){
        set_message('Incorrect length for Username');
    }
    elseif(strlen($_POST['pwd'])>20 || strlen($_POST['pwd'])<4){
        set_message('Incorrect length for Username');
    }
    else {
        $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $pwd = filter_var($_POST['pwd'], FILTER_SANITIZE_STRING);
    
    
    $pwd = sha1($pwd);
    
    try {
        
        $sql = "SELECT 1 from User_Dfn where username = '$username';";
        if($result=mysqli_query($link, $sql)) {
            if(mysqli_num_rows($result)>=1) {
                set_message("Username already exists");
                header("Location: AddUser.php");
            } else {
                $sql = "insert into User_Dfn (username, pwd) values ('$username', '$pwd');";
                if($result=mysqli_query($link, $sql)){
                    $last_id = last_id();
                    $_SESSION['user_id'] = $last_id;
                }else {echo "<br>Error: ".$sql."<br>".mysqli_error($link);}
            }
        }
    } catch(Exception $e) {set_message("Unable to process request");}

    header("Location: block.php");
    }
}


//validate and authenticate user, define user in the session
function loginSubmit(){
    global $link;
    
    
    if(isset($_SESSION['user_id'])){
        set_message('User is already logged in');
    }
    
    elseif(!isset($_POST['username'], $_POST['pwd'])){
        set_message('Please enter valid username and password');
    }
    
    elseif(strlen($_POST['username'])>20 || strlen($_POST['username'])<4){
        set_message('Incorrect length for Username');
    }
    elseif(strlen($_POST['pwd'])>20 || strlen($_POST['pwd'])<4){
        set_message('Incorrect length for Username');
    }
    else {
        $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $pwd = filter_var($_POST['pwd'], FILTER_SANITIZE_STRING);
    
        $pwd = sha1($pwd);
    
    try {
        
        $sql = "SELECT * from User_Dfn where username = '$username' and pwd = '$pwd';";
        if($result=mysqli_query($link, $sql)) {
            while($row = mysqli_fetch_assoc($result)){
                $_SESSION['user_id'] = $row['User_ID'];
                set_message('You are logged in!');
            }
        }
        
        if($username == false);
        {
            set_message('Login Failed');
            
        }
        
    } catch(Exception $e) {set_message("Unable to process request");}
        header("Location: block.php");
    }
    
}




?>