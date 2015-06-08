<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'include.php';    // Used to hide database info

/* Connect to the database */
$mysqli = new mysqli($hostname, $database_name, $pwd, $username);
if ($mysqli->connect_errno) 
  echo 'There was an error connecting to the database.';


$username = mysqli_real_escape_string($mysqli, $_REQUEST["username"]);
$password = mysqli_real_escape_string($mysqli, $_REQUEST["password"]);
  
$validateCreds = mysqli_query($mysqli, "SELECT * FROM user_accounts WHERE username='".$username."' AND password='".sha1($password)."'");


if (mysqli_num_rows($validateCreds) !== 1)
  echo '<p>Invalid Login Credentials<p>';
else {
  echo '<p>Valid Login Credentials</p>';
}

?>