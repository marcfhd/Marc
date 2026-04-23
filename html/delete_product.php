<?php
$conn = new mysqli("localhost", "root", "", "techhub_db");

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    $conn->query("DELETE FROM products WHERE product_id = $id");
}

header("Location: admin_products.php");
exit();
?>