<?php
session_start();
if(!isset($_SESSION['role'])){
  header("Location: auth/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Employee Info</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php require 'components/header.php' ;?>
<div class="container">
  <h2>Add Employee Info</h2>
  <?php if(isset($_SESSION['erroremployee'])): ?>
<div class="alert alert-danger" role="alert">
  <?php echo $_SESSION['erroremployee']; ?>
</div>
<?php unset($_SESSION["erroremployee"]) ; endif; ?>  
<form action="../controllers/employeesubmit.php" method="post">
    <div class="form-group">
      <label for="EmployeeID">Employee ID:</label>
      <input type="text" class="form-control" id="EmployeeID" name="EmployeeID" required>
    </div>
    <div class="form-group">
      <label for="FirstName">First Name:</label>
      <input type="text" class="form-control" id="FirstName" name="FirstName" required>
    </div>
    <div class="form-group">
      <label for="LastName">Last Name:</label>
      <input type="text" class="form-control" id="LastName" name="LastName" required>
    </div>
    <div class="form-group">
      <label for="Email">Email:</label>
      <input type="email" class="form-control" id="Email" name="Email" required>
    </div>
    <div class="form-group">
      <label for="PhoneNumber">Phone Number:</label>
      <input type="number" class="form-control" id="PhoneNumber" name="PhoneNumber" required>
    </div>
    <div class="form-group">
      <label for="DepartmentID">Department ID:</label>
      <input type="text" class="form-control" id="DepartmentID" name="DepartmentID" required>
    </div>
    <div class="form-group">
      <label for="JobTitle">JobTitle:</label>
      <input type="text" class="form-control" id="JobTitle" name="JobTitle" required>
    </div>
    <div class="form-group">
      <label for="Salary"> Salary:</label>
      <input type="number" class="form-control" id="Salary" name="Salary" required>
    </div>
    <div class="form-group">
      <label for="Salary"> Hours Worked Per Day:</label>
      <input type="number" class="form-control" id="HoursWorkedPerDay" name="HoursWorkedPerDay" required>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </form>
</div>

</body>
</html>
