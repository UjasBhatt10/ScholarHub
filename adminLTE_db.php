<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "admindb";

$conn = mysqli_connect($servername, $username, $password , $database);
if (!$conn){
    die("Could not connect to server".mysqli_connect_error());
} 
?>