<?php
if(isset($_POST['submit'])){
require '../db/dbconn.php';
$departmentID = $_POST['departmentID'];
$departmentName = $_POST['departmentName'];
// Check if a department with the same ID already exists
$checkQuery = "SELECT * FROM departments WHERE DepartmentID = '$departmentID'";
$checkResult = $dbConnection->query($checkQuery);

if ($checkResult->num_rows > 0) {
    // If a department with the same ID already exists
    session_start();
    $_SESSION['errordepart'] = "A department with the same ID already exists";
    header("Location: ../views/adddepart.php");
    exit();
} else {
        $sql = "INSERT INTO departments (DepartmentID, DepartmentName)
        VALUES ( '$departmentID' , '$departmentName' );";

        if ($dbConnection->query($sql) === TRUE) {
            echo "Record updated successfully";
            header("Refresh: 1; URL=../views/dashboard.php");
            exit();
        } else {
            echo "Error updating record: " . $dbConnection->error;
        }
}
}else{
    header("Location: ../views/adddepart.php");
    exit();
}