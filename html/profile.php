<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login_page.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="../css/profile.css">
</head>
<body>
<div id="navbar"></div>
<script src="../navbar.js"></script>
<div class="profile-wrapper d-flex justify-content-center align-items-center">
  
  <div class="profile-card">
    <div class="p-4">
      <h4 class="text-center mb-4">Edit Profile</h4>

      <form>

        <div class="mb-3 input-group">
          <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
          <input type="text" class="form-control custom-input" placeholder="Full Name">
        </div>

        <div class="mb-3 input-group">
          <span class="input-group-text"><i class="fa-solid fa-at"></i></span>
          <input type="text" class="form-control custom-input" placeholder="Username">
        </div>

        <div class="mb-3 input-group">
          <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
          <input type="email" class="form-control custom-input" placeholder="Email">
        </div>

        <div class="mb-3 input-group">
          <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
          <input type="text" class="form-control custom-input" placeholder="Phone">
        </div>

        <div class="mb-3 input-group">
          <span class="input-group-text"><i class="fa-solid fa-calendar"></i></span>
          <input type="date" class="form-control custom-input" placeholder="Date of birth">
        </div>

        <div class="mb-3 input-group">
          <span class="input-group-text"><i class="fa-solid fa-venus-mars"></i></span>
          <select class="form-control custom-input">
            <option>male</option>
            <option >female</option>
          </select>
        </div>

       <a href="../html/changepass.php" class="btn btn-primary w-100 rounded-pill mt-3">
  <i class="fa fa-lock me-2"></i> Change Password
</a>
       <a href="logout.php" class="btn btn-primary w-100 rounded-pill mt-3">
   Logout
</a>
      </form>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>