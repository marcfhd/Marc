<?php
session_start();
include "../connection.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login_page.php");
    exit();
}

$user_id = $_SESSION["user_id"];
$product_id = (int) $_GET["product_id"];


$cart_query = $conn->query("SELECT * FROM cart WHERE user_id = $user_id");

if ($cart_query->num_rows > 0) {

    $cart = $cart_query->fetch_assoc();
    $cart_id = $cart["cart_id"];

} else {

    $conn->query("INSERT INTO cart (user_id) VALUES ($user_id)");

    $cart_id = $conn->insert_id;
}


$item_query = $conn->query("
    SELECT * FROM cart_items
    WHERE cart_id = $cart_id
    AND product_id = $product_id
");

if ($item_query->num_rows > 0) {

    $conn->query("
        UPDATE cart_items
        SET quantity = quantity + 1
        WHERE cart_id = $cart_id
        AND product_id = $product_id
    ");

} else {

    $conn->query("
        INSERT INTO cart_items (cart_id, product_id, quantity)
        VALUES ($cart_id, $product_id, 1)
    ");
}

header("Location: cart.php");
exit();
?>