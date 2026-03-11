<?php
$host = "localhost";
$user = "root";
$password = "admin123";
$database = "hbctrh_bloodbank";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>