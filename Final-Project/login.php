<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'include.php';    // Used to hide database info


/* Connect to the database */
$mysqli = new mysqli($hostname, $database_name, $pwd, $username);
if ($mysqli->connect_errno) 
  echo 'There was an error connecting to the database.';
else
  echo "<br>";


/* Create table of user accounts */
$users = 'user_accounts';

if(!mysqli_num_rows($mysqli->query("SHOW TABLES LIKE '$users'"))) { 
  if(!$mysqli->query("CREATE TABLE $users(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
  username VARCHAR(255) UNIQUE NOT NULL, 
  password VARCHAR(255) UNIQUE NOT NULL)"))
    echo "Table creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Boozefund - Welcome</title>
    <!-- bootstrap css -->
    <link href="bootstrap.css" rel="stylesheet" type="text/css">
    <!--<script type="text/javascript" src="jquery-1.8.3.min.js"></script>-->
    <script type="text/javascript" src="ajax.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="jumbotron">
        <h1 align=center>Welcome to Boozefund!</h1>
        <h2 align=center>The easy way to contribute to the party</h2><br><br><br>
        <!-- Login form -->
        <h3 align="center">Please Sign In</h3>
          <form align="center" id="loginForm" action="userpage.php" method="POST">
            <input type="text" name="username" id="username" placeholder="username"><br>
            <input type="password" name="password" id="password" placeholder="password"><br>
            <button class="btn" type="submit" value="login" id="loginBtn" onclick="return checkCredentials(); return false">login</button>
          </form>
          <div align="center" class="alert" id="error"></div>
          <br><br><br>
        <h4>Or <a href="register.php">Create an Account</a></h4>
      </div>
    </div>
  </body>
</html>