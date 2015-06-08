<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'include.php';    // Used to hide database info

ini_set('session.save_path', '/nfs/stak/students/w/wallacez/public_html/cs290/Final-Project');
session_start();

/* redirect to login screen if trying to access userpage.php without going through login page */
if ((!isset($_SESSION["name"]))) 
  header("Location: logout.php");

echo 'Logged in as: ' . $_SESSION["name"] . '<br>';

/* Connect to the database */
$mysqli = new mysqli($hostname, $database_name, $pwd, $username);
if ($mysqli->connect_errno) 
  echo 'There was an error connecting to the database.';

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Boozefund - wines</title>
    <!-- bootstrap css -->
    <link href="bootstrap.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="winesAjax.js"></script>
  </head>
  <body>
    <section>
      <div class="container">
        <div class="jumbotron">
          <h2>Choose a wine to bring to the party</h2>
        </div>
      </div>
      <div class="container">
        <div class="jumbotron">
          <table class="table">
            <form action="dbWines.php" method="POST" id="wineForm">
              <thead>
                <tr>
                  <th>Color</th>
                  <th>Type</th>
                  <th>Year</th>
                  <th>Winery</th>
                  <th>Bring To Party?</th>
                </tr>
              </thead>
            <tbody> 
              <tr>
                <td>Red</td>
                <td>Pinot Noir</td>
                <td>2012</td>
                <td>Erath</td>
                <td>
                  <input type="checkbox" id="pinot" value="yes"/>
                </td>
              </tr>
              <tr>
                <td>Red</td>
                <td>Syrah</td>
                <td>2011</td>
                <td>Snoqualmie</td>
                <td>
                  <input type="checkbox" id="syrah" value="yes"/>
                </td>
              </tr>
              <tr>
                <td>Red</td>
                <td>Merlot</td>
                <td>2007</td>
                <td>Duckhorn</td>
                <td>
                  <input type="checkbox" id="merlot" value="yes"/>
                </td>
              </tr>
              <tr>
                <td>Red</td>
                <td>Cabernet Sauvignon</td>
                <td>2011</td>
                <td>Silverado</td>
                <td>
                  <input type="checkbox" id="cab" value="yes"/>
                </td>
              </tr>
              <tr>
                <td>White</td>
                <td>Chardonnay</td>
                <td>2005</td>
                <td>Rombauer</td>
                <td>
                  <input type="checkbox" id="chardonnay" value="yes"/>
                </td>
              </tr>
              <tr>
                <td>White</td>
                <td>Sauvignon Blanc</td>
                <td>2012</td>
                <td>Merry Edwards</td>
                <td>
                  <input type="checkbox" id="sauv" value="yes"/>
                </td>
              </tr>
              <tr>
                <td>White</td>
                <td>Pinot Grigio</td>
                <td>2010</td>
                <td>Luna</td>
                <td>
                  <input type="checkbox" id="gris" value="yes"/>
                </td>
              </tr>
              <tr>
                <td>White</td>
                <td>Moscato</td>
                <td>2014</td>
                <td>Innocent Bystander</td>
                <td>
                  <input type="checkbox" id="moscato" value="yes"/>
                </td>
              </tr>
            </tbody>
              <tr>
                <td><button type="submit" id="selected">Select</button></td>
              </tr>
            </form>
          </table>
          <div id="wineList"></div>
        </div>
      </div>
    </section>
    <section>
      <div class="container">
        <div class="jumbotron">
          <h3>Contribute money instead!</h3>
            <form action="dbWines.php" method="GET" >
              <input type="number" name="amount">
              <button type="submit">Contribute!</submit>
            </form>
        </div>
      </div>
    </section>
    <div class="container">
      <footer>
        <p>Click <a href="logout.php">here</a> to logout</p>
        <p>Click <a href="userpage.php">here</a> to return to the main screen</p>
      </footer>
    </div>
  </body>
</html>