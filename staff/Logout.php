<?php
session_start();
unset($_SESSION['stafftLogin']);
header('location:../index.php');
?>