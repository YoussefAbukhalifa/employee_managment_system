<?php
session_start();
if (isset($_POST['submit'])) {
    require '../db/dbconn.php';
    $EmployeeID = $_POST['EmployeeID'];
    $pass = $_POST['pass'];
    // Hash the password
    $hashedPassword = hash('sha256', $pass);
    // Check if a employee with the same ID exists
    $checkQuery = "SELECT * FROM employees WHERE EmployeeID = '$EmployeeID'";
    $checkResult = $dbConnection->query($checkQuery);
    if ($checkResult->num_rows == 0) {
        $_SESSION['erroraddadmin'] = "There is no employee with ID you entered . Do you want to add it ? <a href = 'addemployee.php'>Add now</a>";
        header("Location: ../views/addadmin.php");
        exit();
    } else {
        while ($row = mysqli_fetch_assoc($checkResult)) {
            $FirstName = $row['FirstName'];
            $LastName = $row['LastName'];
            $Email = $row['Email'];
            $JobTitle = $row['JobTitle'];
            $sql = "INSERT INTO admin (fullname, pass, Email, role)
            VALUES ('$FirstName $LastName', '$hashedPassword', '$Email', '$JobTitle')";
        }
        if ($dbConnection->query($sql) === TRUE) {
            echo "Record updated successfully";
            header("Refresh: 1; URL=../views/dashboard.php");
            exit();
        } else {
            $_SESSION['erroraddadmin'] = "DB error " . $dbConnection->error;
            header("Location: ../views/addadmin.php");
            exit();
        }
    }
} else {
    header("Location: ../views/addadmin.php");
    exit();
}
