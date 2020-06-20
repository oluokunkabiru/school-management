<?php
session_start();
unset($_SESSION['adminLogin']);
header('location:../index.php');
?>