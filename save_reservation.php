<?php
session_start();
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Security check: ensure user is authenticated
    if (!isset($_SESSION['user_id'])) {
        header("Location: auth/login.php");
        exit;
    }

    $user_id = $_SESSION['user_id'];
    $full_name = htmlspecialchars(trim($_POST['full_name']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $res_date = $_POST['reservation_date'];
    $res_time = htmlspecialchars(trim($_POST['reservation_time']));
    $party_size = (int)$_POST['party_size'];
    $payment_id = htmlspecialchars(trim($_POST['razorpay_payment_id'] ?? ''));

    // Validate that a payment was successfully processed
    if (empty($payment_id)) {
        $_SESSION['res_error'] = "Payment authentication failed. No payment ID was generated. Please try again.";
        header("Location: restaurant.php");
        exit;
    }

    // Insert Reservation
    $stmt = $conn->prepare("INSERT INTO reservations (user_id, full_name, phone, reservation_date, reservation_time, party_size, razorpay_payment_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssis", $user_id, $full_name, $phone, $res_date, $res_time, $party_size, $payment_id);

    if ($stmt->execute()) {
        $_SESSION['res_success'] = "Your table for $party_size has been majestically secured! Rs. 200 fee successfully collected (Receipt #$payment_id).";
        header("Location: restaurant.php");
    } else {
        $_SESSION['res_error'] = "An error occurred securing your table. Please try again.";
        header("Location: restaurant.php");
    }
    
    $stmt->close();
    $conn->close();
} else {
    header("Location: restaurant.php");
}
?>
