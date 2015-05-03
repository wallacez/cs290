<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
$_SESSION = array();

if (($_GET["logout"])) {
  session_destroy();
  session_unset();
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Login.php</title>
  </head>
  <body>
    <!-- Set up POST form -->
  <h2>Enter your username below!</h2>
    <form action="content1.php" method="POST">
      <input type="text" name="username">
      <input type="submit" value="login">
    </form>
  </body>
</html>
