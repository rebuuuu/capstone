<?php
session_start();
session_unset();
session_destroy();
setcookie('username', '', time() - 3600, "/"); // Expire the cookie
header("Location: login.php");
?>
