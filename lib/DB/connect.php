<?php
$servername = "localhost";
$username = "aadmin";
$password = "apassword";
$dbname = "proj_csec";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("DataBase Connection failed: " . $conn->connect_error);
}
echo "DataBase Connected successfully <br>";
?>