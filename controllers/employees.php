<?php
require '../db/dbconn.php';
$sql = 'SELECT * FROM employees';
// Execute the query
$result = mysqli_query($dbConnection, $sql);
// Check if query executed successfully
if ($result) {
    // Initialize an empty array to store the employee data
    $employees = [];
    // Fetch data from the result set row by row
    while ($row = mysqli_fetch_assoc($result)) {
        // Add each row (employee data) to the $employees array
        $employees[] = $row;
    }

    // Encode the $employees array into JSON format
    echo json_encode($employees);
} else {
    // If query execution fails, handle the error
    echo json_encode(['error' => 'Failed to fetch data from the employees table']);
}
// Close the database connection
mysqli_close($dbConnection);
?>
