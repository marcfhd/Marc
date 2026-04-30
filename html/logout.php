<?php
session_start();

// destroy all session data
session_unset();
session_destroy();

// delete remember cookie if exists
if (isset($_COOKIE["remember_user"])) {
    setcookie("remember_user", "", time() - 3600, "/");
}

// redirect to home with message
header("Location: index.html?msg=logged_out");
exit();
?>