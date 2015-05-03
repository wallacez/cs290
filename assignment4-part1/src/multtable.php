<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>multtable</title>
</head>
<body>
<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


/* GET variables */
$min_multiplicand = $_GET["min_multiplicand"];
$max_multiplicand = $_GET["max_multiplicand"];
$min_multiplier = $_GET["min_multiplier"];
$max_multiplier= $_GET["max_multiplier"];

if (empty($_GET))
  echo '<p>Missing GET parameters.  Please enter some.';
else {  
  /* Display inputted variables */
  echo '<p>min-multiplicand: ' . htmlspecialchars($_GET["min_multiplicand"]);
  echo '<p>max-multiplicand: ' . htmlspecialchars($_GET["max_multiplicand"]);
  echo '<p>min-multiplier: ' . htmlspecialchars($_GET["min_multiplier"]);
  echo '<p>max-multiplier: ' . htmlspecialchars($_GET["max_multiplier"]);

  /* Error Checking */
  $allTestsPassed = true;  /* if every test evaluates to true, then this variable evaluates to true 
                    * and the mulitplication table is made.  Otherwise the table is not made
                    */ 
  // Min [multiplicand][multiplier] > max
  if ($min_multiplicand > $max_multiplicand) {
    echo "<p><strong>ERR: Minimum multiplicand larger than maximum";
    $allTestsPassed = False;
  }
  if ($min_multiplier > $max_multiplier) {
    echo "<p><strong>ERR: Minimum multiplier larger than maximum";
    $allTestsPassed = False;
  }
  
  // All GET parameters exist
  if (empty($min_multiplicand)) {
  echo "<p><strong>ERR: Missing parameter for minimum multiplicand";
  $allTestsPassed = False;
  }
  if (empty($max_multiplicand)) {
    echo "<p><strong>ERR: Missing parameter for maximum multiplicand";
    $allTestsPassed = False;
  }
  if (empty($min_multiplier)) {
    echo "<p><strong>ERR: Missing parameter for minimum multiplier.";
    $allTestsPassed = False;
  }
  if (empty($max_multiplier)) {
    echo "<p><strong>ERR: Missing parameter for maximum multiplier.";
    $allTestsPassed = False;
  }
  
  // All GET parameters are valid integers
  if (!is_numeric($min_multiplicand)) {
    echo "<p><strong>ERR: Minimum multiplicand not an integer";
    $allTestsPassed = False;
  }
  if (!is_numeric($max_multiplicand)) { 
    echo "<p><strong>ERR: Maximum multiplicand not an integer";
    $allTestsPassed = False;
  }
  if (!is_numeric($min_multiplier)) {
    echo "<p><strong>ERR: Minimum multiplier not an integer.";
    $allTestsPassed = False;
  }
  if (!is_numeric($max_multiplier)) {
    echo "<p><strong>ERR: Maximum multiplier not an integer.";
    $allTestsPassed = False;
  } 
    
 
  /* If all tests pass, print table */
  if ($allTestsPassed) {
    $table_width = $max_multiplier - $min_multiplier + 1;
    $table_height = $max_multiplicand - $min_multiplicand + 1;
  
    echo '<p><strong>Multiplication Table';
    echo '<table border="2" width="400"><td>';
  
    for ($i = 0; $i < $table_width; $i++) {
      echo '<th>' . ($min_multiplier + $i)  . '</th>';
    }
    for ($j = 0; $j < $table_height; $j++) {
      echo '<tr><th>' . ($min_multiplicand + $j) . '</th>';
      for ($k = 0; $k < $table_width; $k++) {
        echo '<td align="center">' . (($min_multiplier + $k) * ($min_multiplicand + $j)) . '</td>';
      }
    }
  }  
  echo '</table>',
  '</body>',
  '</html>'; 
}
?>