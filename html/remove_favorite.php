<?php
session_start();
include "../connection.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["user_id"];
$favorite_id = $_GET["favorite_id"];

$sql = "DELETE FROM favorites 
        WHERE favorite_id = $favorite_id 
        AND user_id = $user_id";

$conn->query($sql);

header("Location: favorites.php");
exit();
?>