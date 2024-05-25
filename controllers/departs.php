<?php
require '../db/dbconn.php';
$sql = 'SELECT * FROM departments';
// Execute the query
$result = mysqli_query($dbConnection, $sql);
// Check if query executed successfully
if ($result) {
    // Initialize an empty array to store the employee data
    $departments = [];
    // Fetch data from the result set row by row
    while ($row = mysqli_fetch_assoc($result)) {
        // Add each row (employee data) to the $employees array
        $departments[] = $row;
    }

    // Encode the $employees array into JSON format
    echo json_encode($departments);
} else {
    // If query execution fails, handle the error
    echo json_encode(['error' => 'Failed to fetch data from the departments table']);
}
// Close the database connection
mysqli_close($dbConnection);
?>
