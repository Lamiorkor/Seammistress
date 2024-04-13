<?php

$SERVER = "127.0.0.1";
$USERNAME = "root";
$PASSWORD = "4lhuS4Ra/=2X";
$DATABASE = "seamstress_db";

$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE) or die ("could not connect to database");

if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>