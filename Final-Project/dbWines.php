<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'include.php';    // Used to hide database info

/* Connect to the database */
$mysqli = new mysqli($hostname, $database_name, $pwd, $username);
if ($mysqli->connect_errno) 
  echo 'There was an error connecting to the database.';



echo '<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Boozefund - wines</title>
    <!-- bootstrap css -->
    <link href="bootstrap.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <section>
      <div class="container">
        <div class="jumbotron">
          <h2>Thanks for contributing!</h2>
            <p>You contributed $' . $_GET["amount"]; 
echo '</p>        
    </div>
    </div>
    </section>
    <div class="container">
      <footer>
        <p>Click <a href="logout.php">here</a> to logout</p>
        <p>Click <a href="userpage.php">here</a> to return to the main screen</p>
        <p>Click <a href="wines.php">here</a> to go back</p>
      </footer>
    </div>
    </body>
    </html>;'
      
?>