<?php
include"../connection.php";

$category = "all";
$search = "";

$sql = "SELECT products.*, categories.category_name
        FROM products
        JOIN categories
        ON products.category_id = categories.category_id
        WHERE 1";

if (isset($_GET["category"]) && $_GET["category"] !== "all") {
    $category = $_GET["category"];
    $sql .= " AND categories.category_name = '$category'";
}

if (isset($_GET["search"]) && !empty($_GET["search"])) {
    $search = $_GET["search"];
    $sql .= " AND products.name LIKE '%$search%'";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>TechHub - Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../css/product.css">
</head>

<body>

<div id="navbar"></div>
<script src="../navbar.js"></script>

<div class="container mt-4">

    <h2 class="text-center mb-4">Our Products</h2>

    <form method="GET" class="row mb-4">

        <div class="col-md-4">
            <select name="category" class="form-select" onchange="this.form.submit()">

                <option value="all">All Categories</option>

                <option value="GPU" <?= $category == "GPU" ? "selected" : "" ?>>
                    GPU
                </option>

                <option value="Keyboard" <?= $category == "Keyboard" ? "selected" : "" ?>>
                    Keyboard
                </option>

                <option value="Mouse" <?= $category == "Mouse" ? "selected" : "" ?>>
                    Mouse
                </option>

                <option value="Processor" <?= $category == "Processor" ? "selected" : "" ?>>
                    Processor
                </option>

                <option value="RAM" <?= $category == "RAM" ? "selected" : "" ?>>
                    RAM
                </option>

                <option value="Hard Disk" <?= $category == "Hard Disk" ? "selected" : "" ?>>
                    Hard Disk
                </option>

                <option value="Monitor" <?= $category == "Monitor" ? "selected" : "" ?>>
                    Monitor
                </option>

                <option value="Headset" <?= $category == "Headset" ? "selected" : "" ?>>
                    Headset
                </option>

                <option value="Adapter" <?= $category == "Adapter" ? "selected" : "" ?>>
                    Adapter
                </option>

            </select>
        </div>

        <div class="col-md-4">
            <input type="text"
                   name="search"
                   class="form-control"
                   placeholder="Search product"
                   value="<?= $search ?>">
        </div>

        <div class="col-md-2">
            <button type="submit" class="btn btn-primary">
                Search
            </button>
        </div>

    </form>

    <div class="row">

        <?php if ($result->num_rows > 0) { ?>

            <?php while($product = $result->fetch_assoc()) { ?>

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

                            <p class="text-muted">
                                <?= $product['category_name'] ?>
                            </p>

                            <?php if($product['is_available'] == 1) { ?>

                                <span class="badge bg-success mb-2">
                                    Available
                                </span>

                            <?php } else { ?>

                                <span class="badge bg-danger mb-2">
                                    Out of Stock
                                </span>

                            <?php } ?>

                            <br>

                            <button class="btn btn-primary">
                                <i class="fa fa-cart-plus"></i>
                                Add to Cart
                            </button>

                            <button class="btn btn-outline-danger">
                                <i class="fa fa-heart"></i>
                            </button>

                        </div>
                    </div>

                </div>

            <?php } ?>

        <?php } else { ?>

            <h4 class="text-center mt-4">
                No products found
            </h4>

        <?php } ?>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>
</html>