<?php
$servername = "littleghostdbinstance.cltatwavmvah.us-west-2.rds.amazonaws.com";
$port="3306";
$dbname="Arduino";
$username = "root";
$password = "C0unt3rP01nt";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>
