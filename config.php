<?php

$servername = "208.91.198.197:3306";
$username = "Phasor";
$password = "admin@12345!";
$database = "Phasor";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("connection failed: " . mysqli_conn_error());
}

?>