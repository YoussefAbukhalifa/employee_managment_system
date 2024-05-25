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
    <title>Employee Attendance</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php require 'components/header.php'; ?>
    <div class="container mt-5">
        <h2>Employee Attendance</h2>
        <form id="attendanceForm">
            <div class="form-group">
                <label for="employeeId">Employee ID:</label>
                <?php if (isset($_GET['id'])) { ?>
                    <input type="text" class="form-control" id="employeeId" name="employeeId" value="<?php echo $_GET['id'] ?>" required>
                <?php } else { ?>
                    <input type="text" class="form-control" id="employeeId" name="employeeId" required>

                <?php } ?>

            </div>
            <div class="form-group">
                <label for="dateRange">Choose Date Range:</label>
                <select class="form-control" id="dateRange" name="dateRange">
                    <option value="30">Last 30 Days</option>
                    <option value="all">All time</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div id="attendanceResults" class="mt-3"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#attendanceForm').submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: '../controllers/attendanceview.php',
                    data: formData,
                    success: function(response) {
                        $('#attendanceResults').html(response);
                    }
                });
            });
        });
    </script>
</body>

</html>