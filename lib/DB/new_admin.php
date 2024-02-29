<?php
include_once 'connect.php';

// define variables and set to empty values
$fname = $lname = $email = $phone = $passwd = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fname = test_input($_POST["first"]);
  $lname = test_input($_POST["last"]);
  $email = test_input($_POST["email"]);
  $phone = test_input($_POST["phone"]);
  $passwd = test_input($_POST["password"]);
}

function test_input($data)
// 1. Strip unnecessary characters (extra space, tab, newline) from the user input data (with the PHP trim() function)
// 2. Remove backslashes (\) from the user input data (with the PHP stripslashes() function)
// 3. Pass all variables through PHP's htmlspecialchars() function. To prevent Cross Site Scripting (XSS) commands to execute.
// The htmlspecialchars() function converts special characters to HTML entities. This means that it will replace HTML characters 
// like < and > with &lt; and &gt;. This prevents attackers from exploiting the code by injecting HTML or Javascript 
// code (Cross-site Scripting attacks) in forms.
  
// %22%3E%3Cscript%3Ealert('hacked')%3C/script%3E
// <script>alert('hacked')</script>
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$passH = password_hash($passwd, PASSWORD_DEFAULT);
// PASSWORD_DEFAULT - Use the bcrypt algorithm (default as of from PHP 5.5.0). Note that 
// this constant is designed to change over time as new and stronger algorithms are added
// to PHP. For that reason, the length of the result from using this identifier can change
// over time. Therefore, it is recommended to store the result in a database column that
// can expand beyond 60 characters (255 characters would be a good choice).



// $sql = "INSERT INTO `admins`(`first_name`, `last_name`, `email`, `phone`, `input_pass`, `password`, `created_at`)
// VALUES ('$fname', '$lname', '$email', '$phone', '$passwd', '$passH', now())";

// Auto DateTime Added in DB server side
$sql = "INSERT INTO `admins`(`first_name`, `last_name`, `email`, `phone`, `input_pass`, `password`)
        VALUES ('$fname', '$lname', '$email', '$phone', '$passwd', '$passH')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}



$conn->close();
?>


<?php
echo "<h2>Your Input:</h2>";
echo $fname;
echo "<br>";
echo $lname;
echo "<br>";
echo $email;
echo "<br>";
echo $phone;
echo "<br>";
echo $passwd;
echo "<br>";
echo $passH;
?>





