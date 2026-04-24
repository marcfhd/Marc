<?php
session_start();

$conn = new mysqli("localhost", "root", "", "techhub_db");

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

function checkUserCredentials($conn, $username, $password) {
    $stmt = $conn->prepare("SELECT user_id, username, password, role, is_blocked FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if ($row["is_blocked"] == 1) {
            return "blocked";
        }
        if (password_verify($password, $row["password"])) {
            return $row;
        }
    }

    return false;
}

if (isset($_COOKIE["remember_user"])) {
    $_SESSION["user_id"] = $_COOKIE["remember_user"];
    header("Location: html/index.html");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["login"])) {
    $username = trim($_POST["username"]);
    $password = trim($_POST["pass"]);

    if (empty($username) || empty($password)) {
        header("Location: html/login.html?error=empty");
        exit();
    }

    $user = checkUserCredentials($conn, $username, $password);

    if ($user === "blocked") {
        header("Location: html/login.html?error=blocked");
        exit();
    }

    if ($user) {
        $_SESSION["user_id"] = $user["user_id"];
        $_SESSION["username"] = $user["username"];
        $_SESSION["role"] = $user["role"];

        if (isset($_POST["remember"])) {
            setcookie("remember_user", $user["user_id"], time() + (86400 * 1), "/");
        }

        if ($user["role"] === "admin") {
            header("Location: html/admin.html");
        } else {
            header("Location: html/index.html");
        }
        exit();
    } else {
        header("Location: html/login.html?error=invalid");
        exit();
    }
}

$conn->close();
?>