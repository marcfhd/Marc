<?php
session_start();
include "../connection.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login_page.php");
    exit();
}

$user_id = $_SESSION["user_id"];
$product_id = $_GET["product_id"];

$check = "SELECT * FROM favorites 
          WHERE user_id = $user_id AND product_id = $product_id";

$result = $conn->query($check);

if ($result->num_rows == 0) {
    $sql = "INSERT INTO favorites (user_id, product_id)
            VALUES ($user_id, $product_id)";
    $conn->query($sql);
}

header("Location: products.php");
exit();
?>