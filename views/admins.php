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
    <title>Admins Info</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php require 'components/header.php'; ?>
    <div class="container">
        <h1>Admins Table</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>fullname</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody id="admins-table-body">
                <!-- Admins data will be inserted here -->
                <h1 class="display-3" id="loading-message">Loading...</h1>
            </tbody>
        </table>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to fetch data from the server and populate the table
            function fetchData() {
                $.ajax({
                    url: '../controllers/admins.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Clear previous data
                        $('#admins-table-body').empty();

                        // Hide the loading message
                        $('#loading-message').hide();

                        // Populate table with new data
                        $.each(data, function(index, admins) {
                            $('#admins-table-body').append(
                                '<tr>' +
                                '<td>' + admins.fullname + '</td>' +
                                '<td>' + admins.email + '</td>' +
                                '<td>' + admins.role + '</td>' +
                                 '</tr>'
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
        });
    </script>
</body>

</html>