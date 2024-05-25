<?php
session_start();
if (isset($_POST['submit'])) {
    require '../db/dbconn.php';
    $EmployeeID = $_POST['EmployeeID'];
    $AttendanceDate = $_POST['AttendanceDate'];
    $ClocklnTime = $_POST['ClocklnTime'];
    $ClockOutTime = $_POST['ClockOutTime'];
    // Check if a employee with the same ID exists
    $checkQuery = "SELECT * FROM employees WHERE EmployeeID = '$EmployeeID'";
    $checkResult = $dbConnection->query($checkQuery);
    // Check if employee id is valid
    if ($checkResult->num_rows == 0) {
        // If a department with the same ID already exists
        $_SESSION['erroremployee'] = "An employee with the ID doesn't exists , Add in the form below";
        header("Location: ../views/addemployee.php");
        exit();
    } else {
        // Canccel the error reporting for the php script to not make problems in totalWorkedTime var
        error_reporting(E_ERROR | E_PARSE);
        // Calculate the difference in hours
        $totalWorkedTime = $ClockOutTime - $ClocklnTime;
        if($totalWorkedTime <= 0){
            $_SESSION['erroremployee'] = "Enter valid date or time";
            header("Location: ../views/attendance.php");
        }else{
        $sql = "INSERT INTO attendance (EmployeeID,AttendanceDate,ClockInTime,ClockOutTime,TotalWorkedTime)
        VALUES ( '$EmployeeID' , '$AttendanceDate','$ClocklnTime' , '$ClockOutTime' , '$totalWorkedTime' );";

        if ($dbConnection->query($sql) === TRUE) {
            echo "Record updated successfully";
            header("Refresh: 1; URL=../views/dashboard.php");
            exit();
        } else {
            echo "Error updating record: ";
            header("Refresh: 1; URL=../views/attendance.php");

        }
    }
    }
} else {
    header("Location: ../views/attendance.php");
    exit();
}
