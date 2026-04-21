<?php
$conn = new mysqli("localhost", "root", "", "techhub_db");

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    if (
        isset($_POST["email"]) &&
        isset($_POST["username"]) &&
        isset($_POST["fullname"]) &&
        isset($_POST["dateofbirth"]) &&
        isset($_POST["pass"]) &&
        isset($_POST["confpassword"])
    ) {
        $email = trim($_POST["email"]);
        $username = trim($_POST["username"]);
        $fullname = trim($_POST["fullname"]);
        $dateofbirth = trim($_POST["dateofbirth"]);
        $today = date("Y-m-d");
         if ($dateofbirth > $today){
              header("Location: html/signup.html?error=date");
              exit();
        }
        $password = trim($_POST["pass"]);
       if (strlen($password) < 7){
         header("Location: html/signup.html?error=password");
         exit();
       }
        $confpassword = trim($_POST["confpassword"]);

        if (empty($email) || empty($username) || empty($fullname) || empty($dateofbirth) || empty($password) || empty($confpassword)) {
            header("Location: html/signup.html?error=empty");
            exit();
        }

        if ($password !== $confpassword) {
           header("Location: html/signup.html?error=match");
            exit();
        }

        $checkSql = "SELECT * FROM users WHERE email = ? OR username = ?";
        $checkStmt = $conn->prepare($checkSql);
        $checkStmt->bind_param("ss", $email, $username);
        $checkStmt->execute();
        $result = $checkStmt->get_result();

        if ($result->num_rows > 0) {
          header("Location: html/signup.html?error=exists");
            exit();
        }
        $sql = "INSERT INTO users (username, Full_name, email, password, date_of_birth) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $username, $fullname, $email, $password, $dateofbirth);

       if ($stmt->execute()) {
         session_start();
         $_SESSION["user_id"] = $stmt->insert_id;
         $_SESSION["username"] = $username;
        $_SESSION["role"] = "user";
header("Location: html/index.html");
exit();
         } else {
           header("Location: html/signup.html?error=server");
        }

        $stmt->close();
        $checkStmt->close();
    } else {
         header("Location: html/signup.html?error=missing");
    }
}

$conn->close();
?>
<!-- http://localhost/Marc/html/login.html -->