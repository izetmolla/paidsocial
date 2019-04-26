<?php
$servername = "localhost";
$username = "cwzqdvxo_chicas";
$password = "Endrisa1996";
$dbname = "cwzqdvxo_chicas";

// Create connection
$link = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$mediaServer = 'https://s3.us-east-2.amazonaws.com/PaidSocial/';


