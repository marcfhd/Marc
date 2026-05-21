<?php
include "../connection.php";

$message="";

$email=$_GET["email"];

if($_SERVER["REQUEST_METHOD"]=="POST"){

$password=$_POST["password"];

$conn->query("
UPDATE users
SET password='$password'
WHERE email='$email'
");

$message="
<div class='alert alert-success'>
Password updated successfully
</div>";
}
?>

<!DOCTYPE html>
<html>

<head>
<title>Reset Password</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<div class="card p-4">

<h3>Reset Password</h3>

<?= $message ?>

<form method="POST">

<div class="mb-3">

<label>New Password</label>

<input
type="password"
name="password"
class="form-control"
required>

</div>

<button class="btn btn-primary">
Reset Password
</button>

</form>

</div>

</div>

</body>
</html>