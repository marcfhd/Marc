<?php
include "../connection.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){

$email=$_POST["email"];

$result=$conn->query("
SELECT *
FROM users
WHERE email='$email'
");

if($result->num_rows>0){

$link="http://localhost/Marc/html/resetpass.php?email=".$email;

$mail=new PHPMailer(true);

try{

$mail->isSMTP();
$mail->Host='smtp.gmail.com';
$mail->Username='marc.fahed13@gmail.com';
$mail->SMTPAuth=true;
$mail->Password = 'ecxwwsdhhshovaxl';
$mail->SMTPSecure = 'tls';
$mail->Port=587;

$mail->setFrom('marc.fahed13@gmail.com','TechHub');
$mail->addAddress($email);

$mail->isHTML(true);

$mail->Subject='Reset Password';

$mail->Body="
<h2>Password Reset</h2>

<p>Click below:</p>

<a href='$link'>
Reset Password
</a>
";

$mail->send();

$message="<div class='alert alert-success'>
Reset email sent
</div>";

}
catch(Exception $e){

echo "Mailer Error: ".$mail->ErrorInfo;

}

}else{

$message="<div class='alert alert-danger'>
Email not found
</div>";

}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>TechHub - Forgot Password</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="../css/forgetpass.css">
</head>
<body>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <div class="card shadow p-4 forget-card" style="max-width: 400px; width: 100%;">

    <h3 class="text-center mb-4">Forgot Password</h3>
    <p class="text-center small mb-4">
      Enter your email address and we'll send you a link to reset your password.
    </p>
    <?=$message?>
    <form method="post">
      <div class="mb-3">
        <label class="form-label">Email Address</label>
        <div class="input-group">
          <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
          <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
        </div>
      </div>

      <button type="submit" class="btn btn-primary ">
        Send Reset Link
      </button>
    </form>
    <div class="text-center mt-3">
      Remembered your password? 
      <a href="login_page.php">Login</a>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>