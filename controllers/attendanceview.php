<?php
require '../db/dbconn.php';
// Check connection
if ($dbConnection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetching data
$employeeId = $_POST['employeeId'];
$dateRange = $_POST['dateRange'];

// Query to fetch last 30 days attendance for the given employee
if ($dateRange == 'all') {
    $sql = "SELECT * FROM attendance WHERE EmployeeID = '$employeeId'";
} else {
    $sql = "SELECT * FROM attendance WHERE EmployeeID = '$employeeId' AND AttendanceDate BETWEEN DATE_SUB(NOW(), INTERVAL $dateRange DAY) AND NOW()";
}
$result = $dbConnection->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table'>
            <thead>
                <tr>
                    <th>Attendance ID</th>
                    <th>Employee ID</th>
                    <th>Attendance Date</th>
                    <th>Clock In Time</th>
                    <th>Clock Out Time</th>
                    <th>Worked Time</th>
                </tr>
            </thead>
            <tbody>";
    $totaltime = 0;
    while ($row = $result->fetch_assoc()) {
        $TotalWorkedTimedb = $row['TotalWorkedTime'];
        $totaltime += $TotalWorkedTimedb;
        echo "<tr>
                <td>" . $row['AttendanceID'] . "</td>
                <td>" . $row['EmployeeID'] . "</td>
                <td>" . $row['AttendanceDate'] . "</td>
                <td>" . $row['ClockInTime'] . "</td>
                <td>" . $row['ClockOutTime'] . "</td>
                <td>" . $row['TotalWorkedTime'] . "</td>
            </tr>";
    }
    echo "</tbody></table>";
    echo "<h3>Total Worked Time in hours : " . $totaltime . "</h3>";
} else {
    echo "No attendance records found for the selected employee.";
}

$dbConnection->close();
