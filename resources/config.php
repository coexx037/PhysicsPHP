<?php

ob_start();

session_start();



define("DS", DIRECTORY_SEPARATOR);

define("TEMPLATE_FRONT", __DIR__.DS."templates/front");
define("TEMPLATE_BACK", __DIR__.DS."templates/back");

define('DB_HOST', 'us-cdbr-iron-east-03.cleardb.net'); /*Database server*/
define('DB_NAME', 'heroku_22507e1fad7879c'); /*Database Name*/
define('DB_USER', 'bfe6b7c7f23470'); /*Database username*/
define('DB_PWD', 'ad54ba23');

//mysql://bfe6b7c7f23470:ad54ba23@us-cdbr-iron-east-03.cleardb.net/heroku_22507e1fad7879c?reconnect=true


function connectDB() {
    $link = new mysqli(DB_HOST, DB_USER, DB_PWD, DB_NAME);
    if($link->connect_error) {
        die("Connection failed: ".$link->connect_error);
    }


    return $link;
}


$link = connectDB();


?>