<?php

if(!isset($_SESSION['user_id'])){
    header("Location: Login.php");
    exit;
}

?>

