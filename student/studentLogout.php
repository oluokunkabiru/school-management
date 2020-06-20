<?php
session_start();
    unset($_SESSION['studentLogin']);
    // session_destroy();
    session_unset();
    header('location:../index.php');
?>