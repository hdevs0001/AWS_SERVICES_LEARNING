<?php
// This script upgrades an existing database to support Razorpay
require_once 'config.php';

// Add columns to bookings
$sql1 = "ALTER TABLE bookings 
         ADD COLUMN total_amount INT(11) NOT NULL DEFAULT 0 AFTER guests, 
         ADD COLUMN downpayment INT(11) NOT NULL DEFAULT 0 AFTER total_amount, 
         ADD COLUMN razorpay_payment_id VARCHAR(100) DEFAULT NULL AFTER downpayment";
$conn->query($sql1);

// Add columns to reservations
$sql2 = "ALTER TABLE reservations 
         ADD COLUMN razorpay_payment_id VARCHAR(100) DEFAULT NULL AFTER party_size";
$conn->query($sql2);

echo "<h2>Database successfully upgraded with Razorpay payment columns!</h2>";
echo "<p>You can now delete this file from your server.</p>";
$conn->close();
?>
