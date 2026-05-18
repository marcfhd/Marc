<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login_page.php");
    exit();
}

include"../connection.php";

$user_id = $_SESSION["user_id"];

$sql = "SELECT * FROM orders 
        WHERE user_id = $user_id AND status != 'Delivered'
        ORDER BY order_id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>My Orders - TechHub</title>>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
<div id="navbar"></div>
<script src="../navbar.js"></script>

<div class="container my-5">

  <h2 class="mb-4">🛒 My Orders</h2>

  <?php if ($result->num_rows > 0): ?>

    <table class="table table-bordered table-hover text-center align-middle">
      <thead class="table-dark">
        <tr>
          <th>Order ID</th>
          <th>Total</th>
          <th>Status</th>
          <th>Address</th>
        </tr>
      </thead>

      <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
          <tr>
            <td>#<?php echo $row["order_id"]; ?></td>
            <td>$<?php echo $row["total_price"]; ?></td>

            <td>
              <?php
                if ($row["status"] == "Pending") {
                  echo "<span class='badge bg-warning text-dark'>Pending</span>";
                } elseif ($row["status"] == "OnRoad") {
                  echo "<span class='badge bg-primary'>On Road</span>";
                } elseif ($row["status"] == "Delivered") {
                  echo "<span class='badge bg-success'>Delivered</span>";
                } else {
                  echo $row["status"];
                }
              ?>
            </td>

            <td><?php echo $row["shipping_address"]; ?></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>

  <?php else: ?>

    <div class="alert alert-info text-center">
      You have no orders yet.
    </div>

  <?php endif; ?>

</div>

</body>
</html>
<!-- http://localhost/Marc/html/my_order.php -->