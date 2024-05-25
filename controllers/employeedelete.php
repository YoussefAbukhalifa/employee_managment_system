<?php
require '../db/dbconn.php';

$ID = $_POST['id'];

$sqlemployee = "DELETE FROM employees WHERE EmployeeID = '$ID'";
$sqlattendance = "DELETE FROM attendance WHERE EmployeeID = '$ID'";
$resultattendance = mysqli_query($dbConnection, $sqlattendance);
$resultemployee = mysqli_query($dbConnection, $sqlemployee);

if ($resultemployee && $resultattendance) {
    echo json_encode(['success' => 'Deleted successfully']);
} else {
    echo json_encode(['error' => mysqli_error($dbConnection)]);
}
?>
