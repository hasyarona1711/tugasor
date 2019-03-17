<?php 

session_start();
session_unset("user");

$_SESSION = [];

header("location: index.php");
exit;
 ?>