<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

/* redirect to content1.php */
if (isset($_SESSION["name"]))	
  echo '<p>Click <a href="content1.php">here</a> to go to content1.php';
/* redirect to login screen if trying to access content2.php without going through login page */
else 
 header("Location: login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Content2.php</title>
</head>
<body>
</body>
</html>

