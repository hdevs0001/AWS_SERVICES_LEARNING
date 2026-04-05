<?php
// This file is used to generate the database schema on a new machine.
// Run this once manually if your tables are missing.

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "royal_rituals";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$conn->query("CREATE DATABASE IF NOT EXISTS $dbname");
$conn->select_db($dbname);

// Create users table
$user_sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    is_admin TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$conn->query($user_sql);

// Create bookings table
$table_sql = "CREATE TABLE IF NOT EXISTS bookings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED NOT NULL,
    event_type VARCHAR(50) NOT NULL,
    theme VARCHAR(50) NOT NULL,
    meals VARCHAR(50) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    event_date DATE NOT NULL,
    event_time VARCHAR(20) NOT NULL,
    guests INT(6) NOT NULL,
    total_amount INT(11) NOT NULL DEFAULT 0,
    downpayment INT(11) NOT NULL DEFAULT 0,
    razorpay_payment_id VARCHAR(100) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
$conn->query($table_sql);

// Create reservations table
$res_sql = "CREATE TABLE IF NOT EXISTS reservations (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    reservation_date DATE NOT NULL,
    reservation_time VARCHAR(20) NOT NULL,
    party_size INT(2) NOT NULL,
    razorpay_payment_id VARCHAR(100) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$conn->query($res_sql);

// Create default admin user
$admin_pass = password_hash('admin', PASSWORD_DEFAULT);
$admin_name = 'Master Architect';
$admin_email = 'admin@royalrituals.com';
$is_admin = 1;

$stmt = $conn->prepare("INSERT INTO users (name, email, password, is_admin) VALUES (?, ?, ?, ?) ON DUPLICATE KEY UPDATE is_admin = 1");
$stmt->bind_param("sssi", $admin_name, $admin_email, $admin_pass, $is_admin);
$stmt->execute();
$stmt->close();

echo "Database schemas successfully installed!";
$conn->close();
?>