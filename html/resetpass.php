<?php
include "../connection.php";

$message="";
$email="";

if(isset($_GET["email"])){
    $email = $_GET["email"];
}

if($_SERVER["REQUEST_METHOD"]=="POST"){

$password=$_POST["password"];
$confirm=$_POST["confirm_password"];
if($password!=$confirm){
    $message="<div class='alert alert-danger'>
Passwords do not match
</div>";
} else{
$hashed_password=password_hash($password,PASSWORD_DEFAULT);
$conn->query("
UPDATE users
SET password='$hashed_password'
WHERE email='$email'
");

$message="
<div class='alert alert-success'>
Password updated successfully
</div>";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>TechHub - Reset Password</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="../css/forgetpass.css">
</head>
<body>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <div class="card shadow p-4 forget-card" style="max-width: 400px; width: 100%;">

    <h3 class="text-center mb-4">Reset Password</h3>
    <p class="text-center small mb-4">
      Enter your new password below.
    </p>
    <?=$message?>

    <form method="post">

      <div class="mb-3">
        <label class="form-label">New Password</label>
        <div class="input-group">
          <input type="password" name="password" class="form-control" id="newPassword" placeholder="Enter new password" required>
          <span class="input-group-text" onclick="togglePassword('newPassword', this)" style="cursor:pointer;">
            <i class="fa-solid fa-eye"></i>
          </span>
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label">Confirm New Password</label>
        <div class="input-group">
          <input type="password" name="confirm_password" class="form-control" id="confirmNewPassword" placeholder="Confirm new password" required>
          <span class="input-group-text" onclick="togglePassword('confirmNewPassword', this)" style="cursor:pointer;">
            <i class="fa-solid fa-eye"></i>
          </span>
        </div>
      </div>

      <button type="submit" class="btn btn-primary w-100 mt-2">
        Reset Password
      </button>

    </form>

    <div class="text-center mt-3">
      Remembered your password? 
      <a href="login_page.php">Login</a>
    </div>

  </div>
</div>

<script>
function togglePassword(fieldId, element) {
  const input = document.getElementById(fieldId);
  const icon = element.querySelector("i");

  if (input.type === "password") {
    input.type = "text";
    icon.classList.remove("fa-eye");
    icon.classList.add("fa-eye-slash");
  } else {
    input.type = "password";
    icon.classList.remove("fa-eye-slash");
    icon.classList.add("fa-eye");
  }
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>