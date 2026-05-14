<?php
session_start();

include"connection.php";

if (!isset($_SESSION["user_id"])) {
    echo "Please login first.";
    exit();
}

$user_id = $_SESSION["user_id"];
$total_price = $_POST["total_price"];
$shipping_address = $conn->real_escape_string($_POST["address"]);

$sql = "INSERT INTO orders (user_id, total_price, status, shipping_address)
        VALUES ($user_id, $total_price, 'pending', '$shipping_address')";

if ($conn->query($sql)) {
    echo "success";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>