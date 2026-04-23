<?php
$conn = new mysqli("localhost", "root", "", "techhub_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_GET['id'])) {
    header("Location: admin_products.php");
    exit();
}

$id = (int) $_GET['id'];

$result = $conn->query("SELECT * FROM products WHERE product_id = $id");

if (!$result || $result->num_rows == 0) {
    die("Product not found.");
}

$product = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $price = (float) $_POST['price'];
    $is_available = isset($_POST['is_available']) ? 1 : 0;

    $sql = "UPDATE products SET
                price = $price,
                is_available = $is_available
            WHERE product_id = $id";

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
  <title>Edit Product</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <style>
    body {
      background: #f5f7fb;
    }
    .card {
      border: none;
      border-radius: 12px;
    }
    .preview-img {
      width: 120px;
      height: 120px;
      object-fit: cover;
      border-radius: 10px;
      border: 1px solid #ddd;
    }
  </style>
</head>
<body>

<div class="container my-5">
  <div class="card shadow-sm p-4">
    <h2 class="mb-4">Edit Product</h2>

    <form method="POST">

      <div class="mb-3">
        <label class="form-label">Product Name</label>
        <input type="text" class="form-control" value="<?= htmlspecialchars($product['name']) ?>" disabled>
      </div>

      <div class="mb-3">
        <label class="form-label">Category ID</label>
        <input type="text" class="form-control" value="<?= $product['category_id'] ?>" disabled>
      </div>

      <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="number" step="0.01" name="price" class="form-control" value="<?= $product['price'] ?>" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Image</label><br>
        <img src="<?= htmlspecialchars($product['image']) ?>" alt="Product Image" class="preview-img">
      </div>

      <div class="form-check mb-4">
        <input class="form-check-input" type="checkbox" name="is_available" id="is_available" <?= $product['is_available'] == 1 ? 'checked' : '' ?>>
        <label class="form-check-label" for="is_available">
          Available
        </label>
      </div>

      <button type="submit" class="btn btn-warning">Update Product</button>
      <a href="admin_products.php" class="btn btn-secondary">Back</a>

    </form>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>