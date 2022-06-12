<?php
// session_start();
// session_destroy();
// header('Location: /index.html');

session_start();
$_SESSION["UserName"] = "";
session_unset();
header("Location: index.php");
?>