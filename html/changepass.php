<?php
session_start();
include"../connection.php";
include "remember.php";
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $user_id=$_SESSION["user_id"];
  $current=$_POST["current_password"];
  $new=$_POST["new_password"];
  $confirm=$_POST["confirm_password"];
  if($new!=$confirm){
    $error="Password do not match";
  }else{
    $stmt=$conn->prepare("SELECT password FROM users WHERE user_id=?" );
    $stmt->bind_param("i",$user_id);
    $stmt->execute();
    $result=$stmt->get_result();
    $user=$result->fetch_assoc();
    if(password_verify($current,$user["password"])){
      $newhash=password_hash($new,PASSWORD_DEFAULT);
      $stmt1=$conn->prepare("UPDATE users SET password=? WHERE user_id=?");
      $stmt1->bind_param("si",$newhash,$user_id);
      $stmt1->execute();
      $success="Password updated successfully";

    }else{
      $error="current password incorrect";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>TechHub - Change Password</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="../css/changepass.css">
</head>

<body>

<div id="navbar"></div>
<script src="../navbar.js"></script>

<div class="container mt-5">

  <h2 class="text-center mb-5 fw-bold">Change Password</h2>

  <div class="row justify-content-center">
    <div class="col-md-5">

      <form method="POST" class="password-card">
        <div class="mb-3">
          <label class="form-label">
            <i class="fa fa-lock me-1"></i> Current Password
          </label>
          <input type="password" name="current_password" class="form-control">
        </div>

        <div class="mb-3">
          <label class="form-label">
            <i class="fa fa-key me-1"></i> New Password
          </label>
          <input type="password" name="new_password" class="form-control">
        </div>

        <div class="mb-4">
          <label class="form-label">
            <i class="fa fa-check me-1"></i> Confirm Password
          </label>
          <input type="password" name="confirm_password" class="form-control">
        </div>

    
        <button type="submit" name="change_password" class="btn btn-dark w-100">
          <i class="fa fa-rotate-right me-1"></i> Update Password
        </button>

      </form>
      <?php if(isset($error)){
        echo"<p>$error</p>";
      } 
      if(isset($success)){
        echo"<p>$success</p>";
      }
      ?>

    </div>
  </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>