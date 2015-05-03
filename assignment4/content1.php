<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

/* redirect to login screen if trying to access content1.php without going through login page */
if ((!isset($_POST["username"])) && (!isset($_SESSION["name"]))) 
  header("Location: login.php");
/* username alone is empty */
else if ((empty($_POST["username"])) && (!isset($_SESSION["name"])))  {
  echo '<p>A username must be entered.'; 
  echo '<p>Click <a href="login.php">here</a> to return to the login screen';
}
else {
  if (empty($_SESSION["name"]))
    $_SESSION["name"] = $_POST["username"];
  if (empty($_SESSION["visits"]))
    $_SESSION["visits"] = 0;
  $_SESSION["visits"]++;    //increment page visits every time user returns to page
  echo '<p>Hello ' . $_SESSION["name"];
  echo '<p>You have visited this page ' . $_SESSION["visits"] . ' times';
  echo '<p>Click <a href="content2.php">here</a> to go to content2.php';  
  echo '<p>Click <a href="login.php?logout=true">here</a> to logout';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Content1.php</title>
</head>
<body>
</body>
</html>