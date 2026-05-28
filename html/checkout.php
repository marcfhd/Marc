<?php
session_start();
include "../connection.php";
include "remember.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

if (!isset($_SESSION["user_id"])) {
    header("Location: login_page.php");
    exit();
}

$user_id = $_SESSION["user_id"];
$message = "";

$cart_query = $conn->query("SELECT * FROM cart WHERE user_id = $user_id");
$grand_total = 0;
$cart_id = 0;

if ($cart_query->num_rows > 0) {
    $cart = $cart_query->fetch_assoc();
    $cart_id = $cart["cart_id"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $address = trim($_POST["address"]);
    $city = trim($_POST["city"]);
    $zip = trim($_POST["zip"]);

    if ($address == "" || $city == "" || $zip == "") {
        $message = "<div class='alert alert-danger'>Please fill all fields</div>";
    } else {

        $items = $conn->query("
            SELECT cart_items.*, products.price
            FROM cart_items
            JOIN products ON cart_items.product_id = products.product_id
            WHERE cart_items.cart_id = $cart_id
        ");

        while ($item = $items->fetch_assoc()) {
            $grand_total += $item["price"] * $item["quantity"];
        }

        $shipping_address = $conn->real_escape_string($address . ', ' . $city . ', ' . $zip);

        $conn->query("
            INSERT INTO orders (user_id, total_price, status, shipping_address)
            VALUES ($user_id, $grand_total, 'Pending', '$shipping_address')
        ");

        $order_id = $conn->insert_id;

        $items = $conn->query("
            SELECT cart_items.*, products.price
            FROM cart_items
            JOIN products ON cart_items.product_id = products.product_id
            WHERE cart_items.cart_id = $cart_id
        ");

        while ($item = $items->fetch_assoc()) {
            $product_id = $item["product_id"];
            $quantity = $item["quantity"];
            $price = $item["price"];

            $conn->query("
                INSERT INTO order_items (order_id, product_id, quantity, price)
                VALUES ($order_id, $product_id, $quantity, $price)
            ");
        }

        $user_result = $conn->query("SELECT email, username FROM users WHERE user_id = $user_id");
        $user = $user_result->fetch_assoc();

        $email = $user["email"];
        $username = $user["username"];

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
             $mail->Username = 'marc.fahed13@gmail.com';
            $mail->SMTPAuth = true;
            $mail->Password = 'ecxwwsdhhshovaxl';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('marc.fahed13@gmail.com', 'TechHub');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'TechHub Order Confirmation';

            $mail->Body = "
                <h2>Hello $username</h2>
                <p>Your order has been placed successfully.</p>
                <p><strong>Order ID:</strong> $order_id</p>
                <p><strong>Total Price:</strong> $grand_total $</p>
                <p><strong>Shipping Address:</strong> $shipping_address</p>
                <p>Thank you for shopping with TechHub.</p>
            ";

            $mail->send();

            $conn->query("DELETE FROM cart_items WHERE cart_id = $cart_id");

            $message = "<div class='alert alert-success'>Order placed successfully! Email sent.</div>";

        } catch (Exception $e) {
            $message = "<div class='alert alert-warning'>Order placed, but email not sent: " . $mail->ErrorInfo . "</div>";
        }
    }
}

$items = $conn->query("
    SELECT cart_items.*, products.name, products.price
    FROM cart_items
    JOIN products ON cart_items.product_id = products.product_id
    WHERE cart_items.cart_id = $cart_id
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>TechHub - Checkout</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/checkout.css">
</head>
<body>

<div id="navbar"></div>
<script src="../navbar.js"></script>

<div class="container my-5">
  <div class="row">

    <div class="col-lg-7">
      <div class="card p-4 shadow-sm">
        <h4 class="mb-4">Billing Details</h4>

        <?= $message ?>

        <form method="POST">

          <div class="mb-3">
            <label>Address</label>
            <input type="text" name="address" class="form-control" required>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label>City</label>
              <input type="text" name="city" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
              <label>Zip Code</label>
              <input type="text" name="zip" class="form-control" required>
            </div>
          </div>

          <hr>

          <h5 class="mb-3">Payment Method</h5>

          <div class="form-check mb-2">
            <input class="form-check-input" type="radio" checked>
            <label class="form-check-label">
              Cash on Delivery
            </label>
          </div>

          <div class="alert alert-info mt-3">
            You will pay when the order arrives.
          </div>

          <button type="submit" class="btn btn-primary w-100 mt-4">
            Place Order
          </button>

        </form>
      </div>
    </div>

    <div class="col-lg-5">
      <div class="card p-4 shadow-sm">
        <h4 class="mb-4">Order Summary</h4>

        <?php
        $grand_total = 0;

        if ($items && $items->num_rows > 0) {
            while ($item = $items->fetch_assoc()) {
                $total = $item["price"] * $item["quantity"];
                $grand_total += $total;
        ?>

          <div class="d-flex justify-content-between mb-2">
            <span><?= $item["name"] ?> x <?= $item["quantity"] ?></span>
            <span>$<?= $total ?></span>
          </div>

        <?php
            }
        } else {
        ?>

          <div class="alert alert-warning text-center">
            Your cart is empty 🛒
          </div>

        <?php } ?>

        <hr>

        <div class="d-flex justify-content-between fw-bold">
          <span>Total</span>
          <span>$<?= $grand_total ?></span>
        </div>

      </div>
    </div>

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>