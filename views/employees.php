<?php
session_start();
if (!isset($_SESSION['role'])) {
    header("Location: auth/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees Info</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php require 'components/header.php'; ?>
    <div class="container">
        <h1 class="my-4">Employee Table</h1>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Employee ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Hire Date</th>
                        <th>Department ID</th>
                        <th>Job Title</th>
                        <th>Salary</th>
                        <th>Hours Worked Per Day</th>
                        <th>Salary Per Hour</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="employee-table-body">
                    <!-- Employee data will be inserted here -->
                    <tr>
                        <td colspan="12" class="text-center"><strong>Loading...</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to fetch data from the server and populate the table
            function fetchData() {
                $.ajax({
                    url: '../controllers/employees.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Clear previous data
                        $('#employee-table-body').empty();

                        // Populate table with new data
                        $.each(data, function(index, employee) {
                            $('#employee-table-body').append(
                                `<tr>
                                    <td>${employee.EmployeeID}</td>
                                    <td><a href='performance.php?id=${employee.EmployeeID}'>${employee.FirstName}</a></td>
                                    <td>${employee.LastName}</td>
                                    <td>${employee.Email}</td>
                                    <td>${employee.PhoneNumber}</td>
                                    <td>${employee.HireDate}</td>
                                    <td>${employee.DepartmentID}</td>
                                    <td>${employee.JobTitle}</td>
                                    <td>${employee.Salary}</td>
                                    <td>${employee.HoursWorkedPerDay}</td>
                                    <td>${employee.SalaryPerHour}</td>
                                    <td>
                                        <a href="editemployee.php?id=${employee.EmployeeID}" class="btn btn-primary btn-sm">Edit</a>
                                        <button class="btn btn-danger btn-sm delete-btn" data-id="${employee.EmployeeID}">Delete</button>
                                    </td>
                                </tr>`
                            );
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }

            // Fetch data initially
            fetchData();

            // Fetch data every 5 seconds (for real-time updates)
            setInterval(fetchData, 5000); // Adjust the interval as needed

            // Delete button click handler
            $(document).on('click', '.delete-btn', function() {
                var employeeId = $(this).data('id');
                if (confirm("Are you sure you want to delete this employee?")) {
                    // AJAX call to delete employee
                    $.ajax({
                        url: '../controllers/employeedelete.php',
                        type: 'POST',
                        data: { id: employeeId },
                        success: function(response) {
                            // If successful, reload the table
                            fetchData();
                        },
                        error: function(xhr, status, error) {
                            console.error('Error deleting employee:', error);
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
