<?php
session_start();

include "connection.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (!isset($_SESSION["user_id"])) {
    echo "Please login first.";
    exit();
}

$user_id = $_SESSION["user_id"];
$total_price = $_POST["total_price"];
$shipping_address = $conn->real_escape_string($_POST["address"]);

/* GET USER INFO */
$user_query = "SELECT email, username FROM users WHERE user_id = $user_id";
$user_result = $conn->query($user_query);
$user = $user_result->fetch_assoc();

$email = $user["email"];
$username = $user["username"];


$sql = "INSERT INTO orders (user_id, total_price, status, shipping_address)
        VALUES ($user_id, $total_price, 'pending', '$shipping_address')";

if ($conn->query($sql)) {

   
    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';

        $mail->SMTPAuth = true;
        $mail->Username = 'marc.fahed13@gmail.com';
        $mail->Password = 'YOUR_APP_PASSWORD';

        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('marc.fahed13@gmail.com', 'TechHub');

        $mail->addAddress($email);

        $mail->isHTML(true);

        $mail->Subject = 'TechHub Order Confirmation';

        $mail->Body = "
            <h2>Hello $username </h2>

            <p>Your order has been placed successfully.</p>

            <p>Total Price: $$total_price</p>

            <p>Shipping Address: $shipping_address</p>

            <p>Thank you for shopping with TechHub 💻</p>
        ";

        $mail->send();

    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

    echo "success";

} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>