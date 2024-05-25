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
    <title>Edit Employee</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php require 'components/header.php'; ?>
    <?php require '../controllers/editemployee.php'; ?>
    <div class="container mt-5">
        <h1>Edit Employee</h1>
        <?php while($employee = mysqli_fetch_assoc($result)){ ?>
        <form action="../controllers/editemployee.php" method="post">
            <div class="form-group">
                <label for="EmployeeID">Employee ID:</label>
                <input type="text" class="form-control" id="EmployeeID" name="EmployeeID" value="<?php echo $employee['EmployeeID']; ?>" required readonly>
            </div>
            <div class="form-group">
                <label for="FirstName">First Name:</label>
                <input type="text" class="form-control" id="FirstName" name="FirstName" value="<?php echo $employee['FirstName']; ?>" required>
            </div>
            <div class="form-group">
                <label for="LastName">Last Name:</label>
                <input type="text" class="form-control" id="LastName" name="LastName" value="<?php echo $employee['LastName']; ?>" required>
            </div>
            <div class="form-group">
                <label for="Email">Email:</label>
                <input type="email" class="form-control" id="Email" name="Email" value="<?php echo $employee['Email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="PhoneNumber">Phone Number:</label>
                <input type="number" class="form-control" id="PhoneNumber" name="PhoneNumber" value="<?php echo $employee['PhoneNumber']; ?>" required>
            </div>
            <div class="form-group">
                <label for="HireDate">Hire Date:</label>
                <input type="date" class="form-control" id="HireDate" name="HireDate" value="<?php echo $employee['HireDate']; ?>" required>
            </div>
            <div class="form-group">
                <label for="DepartmentID">Department ID:</label>
                <input type="text" class="form-control" id="DepartmentID" name="DepartmentID" value="<?php echo $employee['DepartmentID']; ?>" required>
            </div>
            <div class="form-group">
                <label for="JobTitle">Job Title:</label>
                <input type="text" class="form-control" id="JobTitle" name="JobTitle" value="<?php echo $employee['JobTitle']; ?>" required>
            </div>
            <div class="form-group">
                <label for="Salary">Salary:</label>
                <input type="number" class="form-control" id="Salary" name="Salary" value="<?php echo $employee['Salary']; ?>" required>
            </div>
            <div class="form-group">
                <label for="HoursWorkedPerDay">Hours Worked Per Day:</label>
                <input type="number" class="form-control" id="HoursWorkedPerDay" name="HoursWorkedPerDay" value="<?php echo $employee['HoursWorkedPerDay']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
        <?php } ?>
    </div>
</body>
</html>
