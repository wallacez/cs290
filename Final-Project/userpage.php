<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'include.php';    // Used to hide database info

ini_set('session.save_path', '/nfs/stak/students/w/wallacez/public_html/cs290/Final-Project');
session_start();

if (empty($_SESSION["name"]) && empty($_SESSION["password"])) {
  $_SESSION["name"] = $_POST["username"];
  $_SESSION["password"] = $_POST["password"];
}

/* redirect to login screen if trying to access userpage.php without going through login page */
if (empty($_SESSION["name"]))
  header("Location: logout.php");

/* Connect to the database */
$mysqli = new mysqli($hostname, $database_name, $pwd, $username);
if ($mysqli->connect_errno) 
  echo 'There was an error connecting to the database.';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Boozefund - User</title>
    <!-- bootstrap css -->
    <link href="bootstrap.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div class="container">
      <div class="jumbotron">
      <p>Boozefund is an online crowdfunding source that makes it easy to contribute to the party.</p>
      <ul><blockquote>
        <li>Do you host parties and find yourself paying for most of the food and drink?</li>
        <li>Do you attend parties and find it hard to decide what to bring?</li>
        <li>Are stores frequently out of what you need, and closed when you need them to be open?</li>
      </blockquote></ul>
      <br>
      <p>Boozefund takes care of these concerns by offering an easy and convenient way to contribute to the party.  Instead of hemming and hawing over what type
         of wine to bring or staring at the cheese aisle for 20 minutes, just add a few dollars into the fund and enjoy the party guilt-free! 
      </p>
      </div>
    </div>
    <div class="container">
      <div class="jumbotron">
        <p>Click <a href="wines.php">here</a> to choose from a list of wines to bring, or to throw money at the problem instead!</p>
      </div>
    </div>
    <div class="container">
      <footer>
        <p>Click <a href="logout.php">here</a> to logout</p>
      </footer>
    </div>
  </body>
</html>
