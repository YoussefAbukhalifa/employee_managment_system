<?php
require '../db/dbconn.php'; 
if (isset($_POST['submit'])) {
    $employeeID = $_POST['EmployeeID'];
    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $email = $_POST['Email'];
    $phoneNumber = $_POST['PhoneNumber'];
    $hireDate = $_POST['HireDate'];
    $departmentID = $_POST['DepartmentID'];
    $jobTitle = $_POST['JobTitle'];
    $salary = $_POST['Salary'];
    $hoursWorkedPerDay = $_POST['HoursWorkedPerDay'];
    $SalaryPerHour = $salary / $hoursWorkedPerDay / 30;
    // Prepare update statement
    $sql = "UPDATE employees SET 
            FirstName = '$firstName',
            LastName = '$lastName',
            Email = '$email',
            PhoneNumber = '$phoneNumber',
            HireDate = '$hireDate',
            DepartmentID = '$departmentID',
            JobTitle = '$jobTitle',
            Salary = '$salary',
            HoursWorkedPerDay = '$hoursWorkedPerDay',
            SalaryPerHour = '$SalaryPerHour'
            WHERE EmployeeID = '$employeeID'";
    // Execute update statement
    if (mysqli_query($dbConnection, $sql)) {
        // Redirect to a success page or wherever you want after successful update
        header("Location: ../views/employees.php");
        exit(); // Add exit() to stop further script execution
    } else {
        // Handle errors if any
        echo "Error updating record: " . mysqli_error($dbConnection);
    }
    // Close database connection
    mysqli_close($conn);
} else {
    $ID = $_GET['id'];
    $user = "SELECT * FROM employees WHERE EmployeeID = $ID";
    $result = mysqli_query($dbConnection, $user);
    if ($result) {
    } else {
        echo '
            <div class="alert alert-danger" role="alert">
            db error
            </div> ';
    }
}
