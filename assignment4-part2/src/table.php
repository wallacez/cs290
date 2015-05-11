<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Video Database</title>
<body>
</head>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'include.php';    // Used to hide database info

$mysqli = new mysqli($hostname, $database_name, $pwd, $username);
if ($mysqli->connect_errno) 
  echo 'Connection error: ' .$mysqli->connect_errno . ' ' . $mysqli->connect_error;
else
  echo "<br>";

/* Create the video table */
$vt = 'video_table';
$full_table = true;      // Only allow table to be shown when wanted

if(!mysqli_num_rows($mysqli->query("SHOW TABLES LIKE '$vt'"))) { 
  if(!$mysqli->query("CREATE TABLE $vt(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
  name VARCHAR(255) UNIQUE NOT NULL, 
  category VARCHAR(255), 
  length INT UNSIGNED, 
  rented BOOLEAN DEFAULT 0)"))
    echo "Table creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_video'])) {
  // input validation
  $input_valid = true;     /* variable to track valid input 
                    if all inputs are valid, this evaluates true */
  if (empty($_POST['name'])) {
    echo '<p><strong>Please enter a video name</strong>';
    $input_valid = false;
  }
  if (!is_numeric($_POST['length'])) {
    echo '<p><strong>Please enter a video length</strong>';
    $input_valid = false;
  }
  if ($_POST['length'] < 0) {
    echo '<p><strong>Video length must be positive</strong>';
    $input_valid = false;
  }
  
  
  if ($input_valid) {
    $vid_name = $_POST['name'];
    
    // Add a video to the table if it doesn't already exist 
    if (mysqli_num_rows($mysqli->query("SELECT name FROM $vt WHERE name = '$vid_name'")))
      echo '<p>Video already exists';
    else {
      $vid_category = $_POST['category'];
      $vid_length = $_POST['length'];
      if(!$mysqli->query("INSERT INTO $vt (name, category, length) VALUES ('$vid_name', '$vid_category', '$vid_length')"))
        echo 'Inserting failed: (' . $mysqli->errno . ') ' . $mysqli->error;
    }
  }
}

/* Delete a video */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_video'])) {
  $vid_name = $_POST['delete_video'];  
  $vid_name = str_replace('_', ' ', $vid_name);   //ensure we grab the entire string
    
  if (!$mysqli->query("DELETE FROM $vt WHERE name = '$vid_name'"))
    echo 'Delete failed: (' . $mysqli->errno . ') ' . $mysqli->error . '<br>';
}

/* Toggle video status (checked out vs available) */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['status'])) {
    $vid_name = $_POST['status'];
    $vid_name = str_replace('_', ' ', $vid_name);   // ensure we grab the entire string 
    
  if (mysqli_num_rows($mysqli->query("SELECT name FROM $vt WHERE name = '$vid_name' AND rented = 0"))) 
    $mysqli->query("UPDATE $vt SET rented = 1 WHERE name = '$vid_name'");  // video is available
  else 
    $mysqli->query("UPDATE $vt SET rented = 0 WHERE name = '$vid_name'");      // video is checked out
}

/* Delete all videos */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_all_videos'])) {
  if (mysqli_num_rows($mysqli->query("SELECT name FROM $vt"))) {
      $mysqli->query("TRUNCATE TABLE $vt"); // delete all rows in table
      $mysqli->query("ALTER TABLE $vt AUTO_INCREMENT = 1"); // reset 'id' to 1
  }
} 

/* Filter by category */   
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['filter_cat'])) {
  $category = $_POST['category_name'];
    
  if ($category == 'all_movies')
    $full_table = true;   // no filtering 
  else {
    showVideoTable($mysqli, $vt, $category);
    $full_table = false;     //Prevent entire table from showing 
  }
}

/* Output the table of videos with correct filtering */
function showVideoTable(&$mysqli, &$vt, $filterCategory) {
  if (!mysqli_num_rows($mysqli->query("SELECT id FROM $vt"))) {
    echo '<p>No videos to display</p>';
    return;
  }

  if (($filterCategory == NULL) || ($filterCategory == "All_Movies"))    // No filtering
    $stmt = $mysqli->prepare("SELECT name, category, length, rented FROM $vt ORDER BY category, name");
  else {    // Filtering by categories
    if (!mysqli_num_rows($mysqli->query("SELECT name, category, length, rented FROM $vt WHERE category != '$filterCategory'"))) {
      echo "<p>'$filterCategory' category does not exist. No videos to display</p>";    //Attempting to order by non-existent category
      return;
    }
    $stmt = $mysqli->prepare("SELECT name, category, length, rented FROM $vt WHERE category = '$filterCategory' ORDER BY category, name");
  }
  
  if (!$stmt->execute()) {
    echo 'Query failed: (' . $mysqli->errno . ') ' . $mysqli->error . '<br>';
    return;
  } 
  
  // Variables to bind POST results 
  $out_name = NULL;
  $out_category = NULL;
  $out_length = NULL;
  $out_rented = NULL;
  
  if(!$stmt->bind_result($out_name, $out_category, $out_length, $out_rented)) {
    echo 'Binding result failed: (' . $stmt->errno . ') ' . $stmt->error . '<br>';
    return;
  }
  
  // Display the table of videos
  echo "<table border='1' <th>Video Table</th>
          <th>Name</th>
          <th>Category</th>
          <th>Length</th>
          <th>Rented</th>
          <th>Delete</th>
          <th>Status</th>";  
  
  // Populate table with results from database 
  while($stmt->fetch()) {
    echo "<tr>
            <td>$out_name</td>
            <td>$out_category</td>
            <td>$out_length</td>";
    if ($out_rented) // i.e if $out_rented == 1
      echo "<td>Checked out</td>";
    else    // $out rented == 0
      echo "<td>Available</td>";
    
     
    $out_name = str_replace(' ', '_', $out_name); /* Eliminate white space so the
                                                  string isn't broken up */
    // Buttons to toggle delete/checked in or out status
    echo "<td>
            <form action='table.php' method='post'>
              <button name='delete_video' value=$out_name>Delete</button>
            </form>
          </td>
          <td>
            <form action='table.php' method='post'>
              <button name='status' value=$out_name>In/Out</button>
            </form>
          </td>
         </tr>";
    }
    echo "</table><br>";
}  

/* Filter categories into dropdown table */
function displayCategory(&$mysqli, &$vt) {
  if (!mysqli_num_rows($mysqli->query("SELECT name FROM $vt"))) 
    return;
  
  // Get categories from database 
  $stmt = $mysqli->prepare("SELECT category FROM $vt GROUP BY category ORDER BY category");
  if(!$stmt->execute()) {
    echo 'Query failed: (' . $mysqli->errno . ') ' . $mysqli->error . '<br>';
    return;
  }
 
  if (!$stmt->bind_result($out_category)) {
    echo 'Binding result failed: (' . $stmt->errno . ') ' . $stmt->error . '<br>';
    return;
  }
  
  // Populate dropdown table with categories 
  echo '<select name="category_name">';
  while ($stmt->fetch())
    echo "<option value='$out_category'>$out_category</option>";
  echo "<option value='all_movies'>All Movies</option>";
  echo '</select> ';
  echo " <button name='filter_cat' value='filter_categories'>Filter Categories</button>";  
} 

/* Show unfiltered table */
if ($full_table) {
    showVideoTable($mysqli, $vt, NULL);
    $full_table = false;
}

/* Add video interface */
echo "<form action='table.php' method='post'>
  <fieldset>
    <legend>Add a video</legend>
      Name: <input type='text' name='name'><br>
      Category: <input type='text' name='category'><br>
      Length: <input type='number' name='length'<br>
      <br><br><input type='submit' name='add_video' value='Add Video'><br>
  <br>
  </fieldset>
  <button name='delete_all_videos' value='true'>Delete All Videos</button>";
/* drop down menu of categories */
displayCategory($mysqli, $vt);
echo '</form>'; 
?>
</body>
</html>
