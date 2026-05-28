<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "../connection.php";
if (isset($_COOKIE["remember_user"])) {
  $token=$_COOKIE["remember_user"];
  $stmt=$conn->prepare("SELECT user_id, username,role,is_blocked FROM users WHERE remember_token=?");
  $stmt->bind_param("s",$token);
  $stmt->execute();
  $resultat=$stmt->get_result();
  if($resultat->num_rows===1){
    $user=$resultat->fetch_assoc();
    if($user["is_blocked"]==0){
        $_SESSION["user_id"] = $user["user_id"];
        $_SESSION["username"] = $user["username"];
        $_SESSION["role"] = $user["role"];
  }else{
     setcookie("remember_user", "", time() - 3600, "/", "", false, true);
  }
}else{
    setcookie("remember_user", "", time() - 3600, "/", "", false, true);
}
}
?>