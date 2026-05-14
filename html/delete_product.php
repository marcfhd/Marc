<?php
include"../connection.php";

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    $conn->query("DELETE FROM products WHERE product_id = $id");
}

header("Location: admin_products.php");
exit();
?>