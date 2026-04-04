<?php
// Database Connection Configuration
$servername = "database-1.cnwke4y8223v.ap-south-1.rds.amazonaws.com";
$username = "admin";
$password = "saini7277";
$dbname = "royal_rituals";

// Establish Database Connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check Connectivity
if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}
?>
