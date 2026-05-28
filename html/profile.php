<?php
session_start();
include "../connection.php";
include "remember.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login_page.php");
    exit();
}

$user_id = $_SESSION["user_id"];

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $phone=$_POST["phone"];
    $gender=$_POST["gender"];
    $dob=$_POST["date_of_birth"];

    $sql="UPDATE users 
          SET phone='$phone',
              gender='$gender',
              date_of_birth='$dob'
          WHERE user_id=$user_id";

    $conn->query($sql);
}

$sql="SELECT * FROM users WHERE user_id=$user_id";
$result=$conn->query($sql);
$user=$result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>My Profile</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="../css/profile.css">

</head>

<body>

<div id="navbar"></div>
<script src="../navbar.js"></script>

<div class="profile-wrapper d-flex justify-content-center align-items-center">

<div class="profile-card">

<div class="p-4">

<h4 class="text-center mb-4">
My Profile
</h4>
<form method="POST">
<div class="mb-3 input-group">
<span class="input-group-text">
<i class="fa-solid fa-user"></i>
</span>
<input type="text"class="form-control custom-input"value="<?php echo $user['Full_name']; ?>"readonly>
</div>

<div class="mb-3 input-group">
<span class="input-group-text">
<i class="fa-solid fa-at"></i>
</span>
<input type="text" class="form-control custom-input" value="<?php echo $user['username']; ?>" readonly>
</div>
<div class="mb-3 input-group">
<span class="input-group-text">
<i class="fa-solid fa-envelope"></i>
</span>
<input type="email" class="form-control custom-input" value="<?php echo $user['email']; ?>" readonly>
</div>

<div class="mb-3 input-group">
<span class="input-group-text">
<i class="fa-solid fa-phone"></i>
</span>

<input type="text" name="phone" class="form-control custom-input" placeholder="Enter phone" value="<?php echo $user['phone']; ?>">
</div>
<div class="mb-3 input-group">
<span class="input-group-text">
<i class="fa-solid fa-calendar"></i>
</span>

<input type="date" name="date_of_birth" class="form-control custom-input" value="<?php echo $user['date_of_birth']; ?>">
</div>
<div class="mb-3 input-group">
<span class="input-group-text">
<i class="fa-solid fa-venus-mars"></i>
</span>
<select name="gender" class="form-control custom-input">
<option value="">Choose gender</option>
<option value="male"
<?php if($user["gender"]=="male") echo "selected"; ?>>
Male
</option>
<option value="female"
<?php if($user["gender"]=="female") echo "selected"; ?>>
Female
</option>
</select>
</div>
<button type="submit" class="btn btn-success w-100 rounded-pill mt-3">
<i class="fa-solid fa-floppy-disk"></i>
Save Changes
</button>
<a href="changepass.php"
class="btn btn-primary w-100 rounded-pill mt-3">
<i class="fa-solid fa-lock me-2"></i>
Change Password
</a>
<a href="logout.php" class="btn btn-danger w-100 rounded-pill mt-3">
Logout
</a>
</form>
</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>


</body>
</html>