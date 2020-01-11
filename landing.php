<?php
session_start();
$_SESSION['active'] = "no";
$_SESSION['username'] = "guest";
$_SESSION['id'] = 0;
header('location: index.php')
?>