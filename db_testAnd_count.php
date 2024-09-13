<?php
$servername = "localhost";
$username = "aadmin";
$password = "apassword";
$dbname = "wafi_test";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
else {
  echo "DB connected";
}


$query = $conn->query("SELECT count(*) as count FROM `employee` ORDER BY `date_of_birth` ASC") or die("Connection failed: " . $conn->connect_error);

$res = $query->fetch_array();
echo '<br><br><br>';
var_dump($res);
echo '<br><br><br>';
echo $res['count'];

?>
