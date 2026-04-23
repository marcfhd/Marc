<?php
$conn = new mysqli("localhost", "root", "", "techhub_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin - Users</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <style>
    body{
      background:#f5f7fb;
    }
    .navbar-brand{
      font-weight:bold;
    }
    .card{
      border:none;
      border-radius:12px;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="#">💻 TechHub Admin</a>
    <div class="navbar-nav ms-auto">
      <a class="nav-link active" href="admin_users.php">Users</a>
      <a class="nav-link" href="admin_products.php">Products</a>
    </div>
  </div>
</nav>

<div class="container my-5">
  <h2 class="mb-4">Users Management</h2>

  <div class="card shadow-sm">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover text-center align-middle">
          <thead class="table-dark">
            <tr>
              <th>ID</th>
              <th>Full Name</th>
              <th>Username</th>
              <th>Email</th>
              <th>Date of Birth</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php while($row = $result->fetch_assoc()) { ?>
              <tr>
                <td><?= $row['user_id'] ?></td>
                <td><?= $row['Full_name'] ?></td>
                <td><?= $row['username'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['date_of_birth'] ?></td>
                <td>
                  <?php if($row['is_blocked'] == '1') { ?>
                    <span class="badge bg-danger">Blocked</span>
                  <?php } else { ?>
                    <span class="badge bg-success">Active</span>
                  <?php } ?>
                </td>
                <td>
                <a href="block_user.php?user_id=<?= $row['user_id'] ?>" 
                 class="btn btn-sm <?= $row['is_blocked'] == 1 ? 'btn-success' : 'btn-danger' ?>">
                 <?= $row['is_blocked'] == 1 ? 'Unblock' : 'Block' ?>
                </a>


              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

</body>
</html>
