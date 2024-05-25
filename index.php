<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if(!isset($_SESSION['admin'])){
    header('Location: views/auth/login.php');
    exit;
}else{
    header('Location: views/dashboard.php');
    exit;
}
