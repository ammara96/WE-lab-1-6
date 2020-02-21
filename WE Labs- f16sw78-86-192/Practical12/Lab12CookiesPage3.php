<?php
session_start();
unset($_SESSION["admin_name"]);
header("location:Lab12CookiesPage1.php");
?>