<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: text/plain');

echo "loopback.php ready for action\n\n";

/* if request type is GET and no GET parameters are set */
echo 'JSON-encoded string:' . "\n";
if (($_SERVER['REQUEST_METHOD'] == 'GET') && (empty($_GET)))
  echo '{"Type":"[GET]", "parameters":null}';

/* if request type is POST and no POST parameters are set */
else if (($_SERVER['REQUEST_METHOD'] == 'POST') && (empty($_POST)))
  echo '{"Type":"[POST]", "parameters":null}';

/* if request type is GET and GET parameters exist */
else if (($_SERVER['REQUEST_METHOD'] == 'GET') && (!empty($_GET)))
    echo '"{TYPE":"[GET]", "parameters":' . json_encode($_GET);
  
/* request type is POST and POST parameters exist */
else 
    echo '{"TYPE":"[POST]", "parameters":' . json_encode($_POST);
?>