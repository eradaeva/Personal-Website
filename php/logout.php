<?php
session_start();

$_SESSION["loggedin"] = false;
$_SESSION["email"] = null;


header("Location: ../index.php");

session_destroy();

?>