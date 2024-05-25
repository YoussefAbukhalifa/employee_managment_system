<?php
require '../db/dbconn.php';

// SQL query to select all employees
$sql = "SELECT * FROM employees";

// Execute the query
$result = mysqli_query($dbConnection, $sql);

// SQL query to select all departs
$sqldeparts = "SELECT * FROM departments";

// Execute the query
$resultdepart = mysqli_query($dbConnection, $sqldeparts);
// SQL query to select all departs
$sqladmins = "SELECT * FROM admin";

// Execute the query
$resultadmin = mysqli_query($dbConnection, $sqladmins);
// Check if query executed successfully
if ($result && $resultdepart && $resultadmin) {
    // Initialize counters for managers and employees
    $totalManagers = 0;
    $totalEmployees = 0;
    // Fetch each row and count the number of managers and employees
    while ($row = mysqli_fetch_assoc($result)) {
        if (strtolower($row['JobTitle']) == 'manager') {
            $totalManagers++;
        } else {
            $totalEmployees++;
        }
    }
    $totaldeparts = $resultdepart->num_rows;
    $totaladmins = $resultadmin->num_rows;

    // Output the total number of managers and employees
    echo json_encode(['total_managers' => $totalManagers, 'total_employees' => $totalEmployees, 'total_departs' => $totaldeparts ,'total_admins' => $totaladmins]);
} else {
    // Handle query execution error
    echo json_encode(['error' => 'Error fetching employees']);    
}

// Close the database connection
mysqli_close($dbConnection);
?>
