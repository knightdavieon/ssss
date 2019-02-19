<?php 
$server =  "localhost";
$username = "root";
$password = "";
$dbname = "sw_cleaning";
$conn = mysqli_connect($server, $username, $password, $dbname)or die("Error : " . mysqli_error($conn));
?>