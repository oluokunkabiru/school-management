<?php
session_start();
unset($_SESSION['staffLogin']);
header('location:../index.php');
?>