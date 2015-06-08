<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'include.php';    // Used to hide database info

/* Connect to the database */
$mysqli = new mysqli($hostname, $database_name, $pwd, $username);
if ($mysqli->connect_errno) 
  echo 'There was an error connecting to the database.';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Boozefund - New Account</title>
    <!-- bootstrap css -->
    <link href="bootstrap.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="registerAjax.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="jumbotron">
        <h1>Register an Account</h1>
      </div>
    </div>
    <div class="container">
      <div class="jumbotron">
         <h3>Enter a username and a password</h3>
          <form action="register.php" method="POST" id="registerForm">
            <input type="text" name="username" id="username" placeholder="username"><br>
            <input type="password" name="password" id="password" placeholder="password"><br>
            <button class="btn" type="submit" value="register" id="registerBtn" onclick="return createAccount(); return false">register</button>
          </form>
          <div id="error"></div>
          <br><br><br>
      </div>
      <p>Click <a href="login.php">here</a> to return the login page</p>
    </div>
  </body>
</html>