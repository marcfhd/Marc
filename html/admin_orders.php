<?php
session_start();

if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin") {
    header("Location: login_page.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "techhub_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["update_status"])) {
    $order_id = $_POST["order_id"];
    $status = $_POST["status"];

    $stmt = $conn->prepare("UPDATE orders SET status = ? WHERE order_id = ?");
    $stmt->bind_param("si", $status, $order_id);
    $stmt->execute();

    header("Location: admin_orders.php");
    exit();
}

$result = $conn->query("SELECT * FROM orders ORDER BY order_id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Orders - TechHub</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="#">💻 TechHub Admin</a>
    <div class="navbar-nav ms-auto">
      <a class="nav-link " href="admin_users.php">Users</a>
      <a class="nav-link" href="admin_products.php">Products</a>
      <a class="nav-link active" href="admin_orders.php">Orders</a>
    </div>
  </div>
</nav>

<div class="container my-5">

  <h2 class="mb-4"> Admin Orders</h2>

  <table class="table table-bordered table-hover text-center align-middle">
    <thead class="table-dark">
      <tr>
        <th>Order ID</th>
        <th>User ID</th>
        <th>Total</th>
        <th>Address</th>
        <th>Status</th>
        <th>Change Status</th>
      </tr>
    </thead>

    <tbody>
      <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td>#<?php echo $row["order_id"]; ?></td>
        <td><?php echo $row["user_id"]; ?></td>
        <td>$<?php echo $row["total_price"]; ?></td>
        <td><?php echo $row["shipping_address"]; ?></td>

        <td>
          <?php
           if ($row["status"] == "Pending") {
           echo "<span class='badge bg-warning text-dark'>Pending</span>";
           } elseif ($row["status"] == "OnRoad") {
           echo "<span class='badge bg-primary'>On Road</span>";
           } elseif ($row["status"] == "Delivered") {
           echo "<span class='badge bg-success'>Delivered</span>";
           }
          ?>
        </td>

        <td>
          <form method="POST" class="d-flex gap-2">
            <input type="hidden" name="order_id" value="<?php echo $row["order_id"]; ?>">

         <select name="status" class="form-select">
         <option value="Pending" <?php if($row["status"] == "Pending") echo "selected"; ?>>
         Pending
        </option>
        <option value="OnRoad" <?php if($row["status"] == "OnRoad") echo "selected"; ?>>
          On Road
        </option>
        <option value="Delivered" <?php if($row["status"] == "Delivered") echo "selected"; ?>>
        Delivered
        </option>
</select>

            <button type="submit" name="update_status" class="btn btn-primary">
              Update
            </button>
          </form>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>

</div>

</body>
</html>