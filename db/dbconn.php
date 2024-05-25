<?php

// Database configuration
$dbHost = 'localhost'; 
$dbUsername = 'root'; 
$dbPassword = ''; 
$dbName = 'employee_managment'; 

// Establishing the database connection
$dbConnection = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if (!$dbConnection) {
    die("Connection failed: " . mysqli_connect_error());
}