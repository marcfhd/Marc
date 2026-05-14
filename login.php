<?php
session_start();

$conn = new mysqli("localhost", "root", "", "techhub_db");

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

if (isset($_COOKIE["remember_user"])) {
    $_SESSION["user_id"] = $_COOKIE["remember_user"];
    header("Location: html/index.html");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {

    $username = trim($_POST["username"]);
    $password = trim($_POST["pass"]);

    if (empty($username) || empty($password)) {
        header("Location: html/login_page.php?error=empty");
        exit();
    }

    $stmt = $conn->prepare("SELECT user_id, username, password, role, is_blocked FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {

        $user = $result->fetch_assoc();

        if ($user["is_blocked"] == 1) {
            header("Location: html/login_page.php?error=blocked");
            exit();
        }

        if (password_verify($password, $user["password"])) {

            $_SESSION["user_id"] = $user["user_id"];
            $_SESSION["username"] = $user["username"];
            $_SESSION["role"] = $user["role"];

            if (isset($_POST["remember"])) {
                setcookie("remember_user", $user["user_id"], time() + (86400 * 1), "/");
            }

            if ($user["role"] === "admin") {
                header("Location: html/admin_users.php");
            } else {
                header("Location: html/index.html");
            }

            exit();

        } else {
            header("Location: html/login_page.php?error=invalid");
            exit();
        }

    } else {
        header("Location: html/login_page.php?error=invalid");
        exit();
    }
}

$conn->close();
?>