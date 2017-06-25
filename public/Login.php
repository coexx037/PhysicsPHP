<?php require_once("../resources/functions.php"); ?>
<?php loginSubmit(); ?>

<html>
<head>
<title>CRUD Login</title>
</head>

<body>
  <h2>CRUD Login</h2>
  <h3><?php display_message(); ?></h3>
  <form action="" method="post">
  <fieldset>
    <p>
      <label>Username</label>
      <input type="text" name="username" value="" maxlength="20" />
    </p>
    <p>
      <label>Password</label>
      <input type="password"  name="pwd" value="" maxlength="20" />
    </p>
    <p>
      <input type="submit" value="Login" />
    </p>
  </fieldset>
  </form>
</body>
</html>