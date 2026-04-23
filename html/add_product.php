<?php
$conn = new mysqli("localhost", "root", "", "techhub_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST['name']);
    $category_id = (int) $_POST['category_id'];
    $price = (float) $_POST['price'];
    $image = trim($_POST['image']);
    $color = trim($_POST['color']);
    $is_available = isset($_POST['is_available']) ? 1 : 0;

    if ($color === "") {
        $color_sql = "NULL";
    } else {
        $color = $conn->real_escape_string($color);
        $color_sql = "'$color'";
    }

    $name = $conn->real_escape_string($name);
    $image = $conn->real_escape_string($image);

    $sql = "INSERT INTO products (category_id, name, price, image, color, is_available)
            VALUES ($category_id, '$name', $price, '$image', $color_sql, $is_available)";

    if ($conn->query($sql)) {
        header("Location: admin_products.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <title>Add Product</title>
  <style>
    body {
      background: #f5f7fb;
    }
    .card {
      border: none;
      border-radius: 12px;
    }
  </style>
</head>
<body>

<div class="container my-5">
  <div class="card shadow-sm p-4">

    <h2 class="mb-4">Add Product</h2>

    <form method="POST">

      <div class="mb-3">
        <label class="form-label">Product Name</label>
        <input type="text" name="name" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Category ID</label>
        <input type="number" name="category_id" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="number" step="0.01" name="price" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Image URL</label>
        <input type="text" name="image" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Color (optional)</label>
        <input type="text" name="color" class="form-control">
      </div>

      <div class="form-check mb-4">
        <input class="form-check-input" type="checkbox" name="is_available" id="is_available" checked>
        <label class="form-check-label">
          Available
        </label>
      </div>

      <button type="submit" class="btn btn-success">Add Product</button>
      <a href="admin_products.php" class="btn btn-secondary">Back</a>

    </form>

  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>