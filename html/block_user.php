<?php
include"connection.php";

if (isset($_GET['user_id'])) {
    $user_id = (int) $_GET['user_id'];

    $result = $conn->query("SELECT is_blocked FROM users WHERE user_id = $user_id");

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if ($user['is_blocked'] == 1) {
            $conn->query("UPDATE users SET is_blocked = 0 WHERE user_id = $user_id");
        } else {
            $conn->query("UPDATE users SET is_blocked = 1 WHERE user_id = $user_id");
        }
    }
}

header("Location: admin_users.php");
exit();
?>