<?php require_once("../resources/functions.php"); ?>

<?php
session_unset();
session_destroy();
header("Location: index.php");

?>

<html>
    <head>
        <title>Logout</title>
    </head>
    <body>
        <h1>You are now logged out</h1>
    </body>
</html>