<?php
$conn = new mysqli("localhost", "root", "", "techhub_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
 
  <title>Admin - Products</title>
  <style>
    body { background:#f5f7fb; }
    .card { border:none; border-radius:12px; }
    .product-img {
      width:70px;
      height:70px;
      object-fit:cover;
      border-radius:8px;
    }
  </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="#">💻 TechHub Admin</a>
    <div class="navbar-nav ms-auto">
      <a class="nav-link " href="admin_users.php">Users</a>
      <a class="nav-link active" href="admin_products.php">Products</a>
    </div>
  </div>
</nav>

<div class="container my-5">

  <div class="d-flex justify-content-between mb-4">
    <h2>Products</h2>
    <a href="add_product.php" class="btn btn-primary">+ Add Product</a>
  </div>

  <div class="card shadow">
    <div class="card-body">

      <table class="table table-bordered text-center align-middle">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Category ID</th>
            <th>Price</th>
            <th>Color</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
        <?php while($row = $result->fetch_assoc()) { ?>
          <tr>
            <td><?= $row['product_id'] ?></td>

            <td>
              <img src="<?= $row['image'] ?>" class="product-img">
            </td>

            <td><?= $row['name'] ?></td>

            <td><?= $row['category_id'] ?></td>

            <td>$<?= $row['price'] ?></td>

            <td><?= $row['color'] ?? '-' ?></td>

            <td>
              <?php if($row['is_available'] == 1) { ?>
                <span class="badge bg-success">Available</span>
              <?php } else { ?>
                <span class="badge bg-danger">Hidden</span>
              <?php } ?>
            </td>

            <td>
              <a href="edit_product.php?id=<?= $row['product_id'] ?>" class="btn btn-warning btn-sm">Edit</a>

              <a href="delete_product.php?id=<?= $row['product_id'] ?>"
                 class="btn btn-danger btn-sm"
                 onclick="return confirm('Delete product?')">
                 Delete
              </a>
            </td>
          </tr>
        <?php } ?>
        </tbody>

      </table>

    </div>
  </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>