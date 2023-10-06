<?php
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "clinic";
$portnum = "3306";

$conn = mysqli_connect($servername, $username, $password, $dbname, $portnum);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
