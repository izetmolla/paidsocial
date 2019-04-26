<?php
$servername = "localhost";
$username = "dbusername";
$password = "dbpassword";
$dbname = "dbname";

// Create connection
$link = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
} 

$mediaServer = 'https://s3.us-east-2.amazonaws.com/PaidSocial/';


