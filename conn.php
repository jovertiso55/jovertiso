<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tinaogandb";

// create connection
$conn = new mysqli($servername, $username, $password,$dbname);

if ($conn->connect_error){
	die ("connect_error failed: ". $conn->connect_error);
}
?>