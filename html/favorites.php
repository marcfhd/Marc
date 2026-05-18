<?php
session_start();
include "../connection.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["user_id"];

$sql = "SELECT products.*, favorites.favorite_id
        FROM favorites
        JOIN products 
        ON favorites.product_id = products.product_id
        WHERE favorites.user_id = $user_id";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>TechHub - Favorites</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="../css/fav.css">
</head>

<body>

<div id="navbar"></div>
<script src="../navbar.js"></script>

<div class="container mt-5 mb-5 text-center">

    <h2 class="mb-4">❤️ Your Favorites</h2>

    <?php if ($result->num_rows == 0) { ?>

        <div class="text-muted py-5">

            <i class="fa-solid fa-heart fa-3x mb-3"></i>

            <h5>You have no favorite products yet.</h5>

            <a href="products.php" class="btn btn-primary mt-3">
                Browse Products
            </a>

        </div>

    <?php } else { ?>

        <div class="row justify-content-center">

            <?php while ($product = $result->fetch_assoc()) { ?>

                <div class="col-md-4 p-3">

                    <div class="card product-card h-100">

                        <img class="card-img-top product-img"
                             src="<?= $product['image'] ?>"
                             alt="<?= $product['name'] ?>">

                        <div class="card-body text-center">

                            <h5 class="card-title">
                                <?= $product['name'] ?>
                            </h5>

                            <p class="card-text">
                                $<?= $product['price'] ?>
                            </p>

                            <a href="remove_favorite.php?favorite_id=<?= $product['favorite_id'] ?>"
                               class="btn btn-danger">

                                <i class="fa fa-trash"></i>
                                Remove

                            </a>

                        </div>

                    </div>

                </div>

            <?php } ?>

        </div>

    <?php } ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>
</html>