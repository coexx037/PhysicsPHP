<?php

ob_start();

session_start();



define("DS", DIRECTORY_SEPARATOR);

define("TEMPLATE_FRONT", __DIR__.DS."templates/front");
define("TEMPLATE_BACK", __DIR__.DS."templates/back");

define('DB_HOST', 'us-cdbr-iron-east-03.cleardb.net'); /*Database server*/
define('DB_NAME', 'heroku_3cfc984b56386d0'); /*Database Name*/
define('DB_USER', 'b49eab265c3201'); /*Database username*/
define('DB_PWD', 'cc88e286');

//mysql://b49eab265c3201:cc88e286@us-cdbr-iron-east-03.cleardb.net/heroku_3cfc984b56386d0?reconnect=true

function connectDB() {
    $link = new mysqli(DB_HOST, DB_USER, DB_PWD, DB_NAME);
    if($link->connect_error) {
        die("Connection failed: ".$link->connect_error);
    }


    return $link;
}


$link = connectDB();


?>