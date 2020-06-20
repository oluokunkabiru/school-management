<?php
session_start();
unset($_SESSION['studentLogin']);
header('location:../index.php');
?>