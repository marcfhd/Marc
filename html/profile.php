<?php
session_start();
include "../connection.php";

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

<meta charset="UTF-8">
<title>My Profile</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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

<!-- Full Name -->

<div class="mb-3 input-group">

<span class="input-group-text">
<i class="fa-solid fa-user"></i>
</span>

<input
type="text"
class="form-control custom-input"
value="<?php echo $user['Full_name']; ?>"
readonly>

</div>


<!-- Username -->

<div class="mb-3 input-group">

<span class="input-group-text">
<i class="fa-solid fa-at"></i>
</span>

<input
type="text"
class="form-control custom-input"
value="<?php echo $user['username']; ?>"
readonly>

</div>


<!-- Email -->

<div class="mb-3 input-group">

<span class="input-group-text">
<i class="fa-solid fa-envelope"></i>
</span>

<input
type="email"
class="form-control custom-input"
value="<?php echo $user['email']; ?>"
readonly>

</div>


<!-- Phone -->

<div class="mb-3 input-group">

<span class="input-group-text">
<i class="fa-solid fa-phone"></i>
</span>

<input
type="text"
name="phone"
class="form-control custom-input"
placeholder="Enter phone"
value="<?php echo $user['phone']; ?>">

</div>


<!-- Date of birth -->

<div class="mb-3 input-group">

<span class="input-group-text">
<i class="fa-solid fa-calendar"></i>
</span>

<input
type="date"
name="date_of_birth"
class="form-control custom-input"
value="<?php echo $user['date_of_birth']; ?>">

</div>


<!-- Gender -->

<div class="mb-3 input-group">

<span class="input-group-text">
<i class="fa-solid fa-venus-mars"></i>
</span>

<select
name="gender"
class="form-control custom-input">

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


<button
type="submit"
class="btn btn-success w-100 rounded-pill mt-3">

<i class="fa-solid fa-floppy-disk"></i>
Save Changes

</button>


<a href="changepass.php"
class="btn btn-primary w-100 rounded-pill mt-3">

<i class="fa-solid fa-lock me-2"></i>
Change Password

</a>


<a href="logout.php"
class="btn btn-danger w-100 rounded-pill mt-3">

Logout

</a>

</form>

</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>