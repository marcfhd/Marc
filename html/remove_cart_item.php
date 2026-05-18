<?php
include "../connection.php";

$id = (int) $_GET["id"];

$conn->query("
    DELETE FROM cart_items
    WHERE cart_item_id = $id
");

header("Location: cart.php");
exit();
?>