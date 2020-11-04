<?php # dbconnect.php

// This file contains the database access information. 
// This file also establishes a connection to MySQL and selects the database.

DEFINE ('DB_USER', 'root'); // Set the username
DEFINE ('DB_PASSWORD', ''); // Set the password
DEFINE ('DB_HOST', 'localhost'); // Set the localhost
DEFINE ('DB_NAME', 'ctu_ecommerce_jeffv'); // Set the database name

// Make the connection:
$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );

?>