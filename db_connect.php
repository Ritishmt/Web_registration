<?php
$servername = "localhost"; // or your database server
$username = "root"; // your database username
$password = ""; // your database password
$dbname = "car_rental"; // your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
