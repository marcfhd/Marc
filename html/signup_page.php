<?php
session_start();

if (isset($_SESSION["user_id"])) {
    if ($_SESSION["role"] === "admin") {
        header("Location: admin_users.php");
    } else {
        header("Location: index.html");
    }
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>TechHub - Sign Up</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="../css/signup.css">
</head>
<body>
<div id="navbar"></div>
<script src="../navbar.js"></script>
<div class="container">
  <div class="card signup-card shadow">
    
    <div class="card-header">
      Create Your Account
    </div>

    <div class="card-body p-4">
      
      <form action="../signup.php" method="post">
 <div class="mb-3">
          <label class="form-label">Email Address</label>
          <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
        </div>
          <div class="mb-3">
          <label class="form-label">UserName</label>
          <input type="text" name="username" class="form-control" placeholder="Enter your name" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Full Name</label>
          <input type="text" name="fullname" class="form-control" placeholder="Enter your name" required>
        </div>
           <div class="mb-3">
          <label class="form-label">Date Of Birth</label>
          <input type="date" name="dateofbirth" class="form-control" placeholder="Enter your birthday" required>
        </div>
       <div class="mb-3">
  <label class="form-label">Password</label>
  <div class="input-group">
    <input type="password" min="7" name="pass" class="form-control" id="password" placeholder="Create a password" required>
    <span class="input-group-text" onclick="togglePassword('password', this)" style="cursor:pointer;">
      <i class="fa-solid fa-eye"></i>
    </span>
  </div>
</div>

       <div class="mb-3">
  <label class="form-label">Confirm Password</label>
  <div class="input-group">
    <input type="password" name="confpassword" class="form-control" id="confirmPassword" placeholder="Confirm password" required>
    <span class="input-group-text" onclick="togglePassword('confirmPassword', this)" style="cursor:pointer;">
      <i class="fa-solid fa-eye"></i>
    </span>
  </div>
</div>
        <button type="submit" class="btn btn-primary mt-2">
          Sign Up
        </button>

      </form>

      <div class="text-center mt-3">
        Already have an account?
        <a href="login_page.php">Login</a>
      </div>
<div id="error-msg" class="alert alert-danger text-center" style="display:none;"></div>
    </div>
  </div>
</div>
<script>
function togglePassword(Id, element) {
  let input = document.getElementById(Id);
  let icon = element.querySelector("i");

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

let params = new URLSearchParams(window.location.search);
let error = params.get("error");
let errorDiv = document.getElementById("error-msg");

if (error) {
  errorDiv.style.display = "block";

  if (error === "empty") {
    errorDiv.innerText = "Please fill all fields";
  } else if (error === "match") {
    errorDiv.innerText = "Passwords do not match";
  } else if (error === "exists") {
    errorDiv.innerText = "Email or username already exists";
  } else if (error === "missing") {
    errorDiv.innerText = "Missing form data";
  } else if (error === "server") {
    errorDiv.innerText = "Something went wrong";
  }else if (error==="date"){
     errorDiv.innerText = "Birthdate cannot be in the future!";
  }else if(error==="password"){
    errorDiv.innerText="Password must be at least 7 characters."
  }

}

window.history.replaceState({}, document.title, window.location.pathname);

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
<!-- http://localhost/Marc/html/signup_page.php -->