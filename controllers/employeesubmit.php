<?php
session_start();
if(isset($_POST['submit'])){
    require '../db/dbconn.php';
    $EmployeeID = $_POST['EmployeeID'];
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Email = $_POST['Email'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $DepartmentID = $_POST['DepartmentID'];
    $JobTitle = $_POST['JobTitle'];
    $Salary = $_POST['Salary'];
    $HoursWorkedPerDay = $_POST['HoursWorkedPerDay'];
    $SalaryPerHour = $Salary / $HoursWorkedPerDay / 30;
    // Check if a employee with the same ID already exists
    $checkQuery = "SELECT * FROM employees WHERE EmployeeID = '$EmployeeID'";
    $checkResult = $dbConnection->query($checkQuery);
    // Check if department id is valid
    $checkdepartQuery = "SELECT * FROM departments WHERE DepartmentID = '$DepartmentID'";
    $checkdepartResult = $dbConnection->query($checkdepartQuery);
    if ($checkResult->num_rows > 0) {
        // If a department with the same ID already exists
        $_SESSION['erroremployee'] = "An employee with the same ID already exists";
        header("Location: ../views/addemployee.php");
        exit();
    }elseif($checkdepartResult->num_rows == 0){
        $_SESSION['erroremployee'] = "There is no department with ID you entered , Add it by the form below ";
        header("Location: ../views/adddepart.php");
        exit();
    }else{
            $sql = "INSERT INTO employees (EmployeeID ,FirstName , LastName , Email , PhoneNumber , DepartmentID	, JobTitle	, Salary ,HoursWorkedPerDay ,SalaryPerHour)
            VALUES ( '$EmployeeID' , '$FirstName' ,'$LastName','$Email','$PhoneNumber','$DepartmentID','$JobTitle','$Salary','$HoursWorkedPerDay','$SalaryPerHour' );";

            if ($dbConnection->query($sql) === TRUE) {
                echo "Record added successfully";
                header("Refresh: 1; URL=../views/dashboard.php");
                exit();
            } else {
                echo "Error updating record: " . $dbConnection->error;
            }
        }
    }
else{
    header("Location: ../views/addemployee.php");
    exit();
}