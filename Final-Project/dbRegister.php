<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'include.php';    // Used to hide database info

/* Connect to the database */
$mysqli = new mysqli($hostname, $database_name, $pwd, $username);
if ($mysqli->connect_errno) 
  echo 'There was an error connecting to the database.';

$newUser = false; 
$username = mysqli_real_escape_string($mysqli, $_REQUEST["username"]);
$password = mysqli_real_escape_string($mysqli, $_REQUEST["password"]);
  
$newAccount = mysqli_query($mysqli, "SELECT * FROM user_accounts WHERE username='".$username."' AND password='".sha1($password)."'");


if (mysqli_num_rows($newAccount) === 1)
  echo '<p>Username taken.  Try another.</p>';
else {
  echo '<p>Creating Account...</p>';
  $newUser = true;
}

if ($newUser) {
  /* add new user to database */
  if(!empty($_POST['username']) && !empty($_POST['password'])) {
    $username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $password = sha1(mysqli_real_escape_string($mysqli, $_POST['password']));

    $valid_account = mysqli_query($mysqli, "INSERT INTO user_accounts (username, password) VALUES('".$username."', '".$password."')");
    echo 'Account Created! Click<a href="login.php"> here </a>to log in';
  }
  else 
    echo 'Unable to create new account.  Be sure to input both a username and a password';
}



?>