<?php
session_start();
include "../connection.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: signin.php");
    exit();
}

$user_id = $_SESSION["user_id"];

$cart_query = $conn->query("
    SELECT * FROM cart
    WHERE user_id = $user_id
");

$grand_total = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>TechHub - Cart</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="../css/cart.css">
</head>
<body>
<div id="navbar"></div>
<script src="../navbar.js"></script>
<div class="container my-5">
  <h2 class="mb-4 text-center">🛒 Shopping Cart</h2>
  <div class="table-responsive shadow-sm rounded">
    <table class="table table-hover align-middle text-center mb-0">
      <thead class="table-dark">
        <tr>
          <th>Product</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Total</th>
          <th>Remove</th>
        </tr>
      </thead>
      <tbody>
<?php
if ($cart_query->num_rows > 0) {
    $cart = $cart_query->fetch_assoc();
    $cart_id = $cart["cart_id"];
    $items = $conn->query("
        SELECT cart_items.*, products.name, products.price, products.image
        FROM cart_items
        JOIN products
        ON cart_items.product_id = products.product_id
        WHERE cart_items.cart_id = $cart_id
    ");
    if ($items->num_rows > 0) {
        while ($item = $items->fetch_assoc()) {
            $total = $item["price"] * $item["quantity"];
            $grand_total += $total;
?>
        <tr>
          <td class="d-flex align-items-center">
            <img src="<?= $item['image'] ?>"
                 width="80"
                 height="80"
                 class="me-3 rounded">
            <?= $item['name'] ?>
          </td>
          <td>$<?= $item['price'] ?></td>
          <td><?= $item['quantity'] ?></td>
          <td>$<?= $total ?></td>
          <td>
            <a href="remove_cart_item.php?id=<?= $item['cart_item_id'] ?>"
               class="btn btn-danger btn-sm">
               <i class="fa fa-trash"></i>
            </a>
          </td>
        </tr>
<?php
        }
    } else {
?>
        <tr>
          <td colspan="5" class="text-center py-4">
            Your cart is empty 🛒
          </td>
        </tr>
<?php
    }
} else {
?>
        <tr>
          <td colspan="5" class="text-center py-4">
            Your cart is empty 🛒
          </td>
        </tr>

<?php
}
?>

      </tbody>

    </table>

  </div>

  <div class="text-end mt-4">

    <h4>
      Total:
      <span class="text-primary">
        $<?= $grand_total ?>
      </span>
    </h4>

    <?php if ($grand_total > 0) { ?>

      <a href="checkout.php" class="btn btn-success mt-2">
        Proceed to Checkout
      </a>

    <?php } ?>

  </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>