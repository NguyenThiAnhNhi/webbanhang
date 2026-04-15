<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webbanhang";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
  die("Kết nối MYSQL thất bại: " . $mysqli->connect_error);
}
echo "";
?>
