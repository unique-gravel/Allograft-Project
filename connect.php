<?php 

// if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
//   echo 'We don\'t have mysqli!!!';
// } else {
//   echo 'Phew we have it!';
// }

$hostName = 'localhost';
$userName = 'root';
$pass = '';
$database = 'allograft';

$connection = new mysqli($hostName, $userName, $pass, $database);

if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}
  
// mysqli_select_db($connection, $database);

return $connection;
?>