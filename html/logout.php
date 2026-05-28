<?php
session_start();
include "../connection.php";
if (isset($_SESSION["user_id"])) {

    $user_id = $_SESSION["user_id"];

    $stmt = $conn->prepare("UPDATE users SET remember_token = NULL WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
}
setcookie("remember_user", "", time() - 3600, "/");
session_unset();
session_destroy();
header("Location: index.html?msg=logged_out");
exit();
?>