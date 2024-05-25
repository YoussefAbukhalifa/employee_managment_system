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
<form action="../controllers/attendance.php" method="post">
    <div class="form-group">
      <label for="EmployeeID">Employee ID:</label>
      <input type="text" class="form-control" id="EmployeeID" name="EmployeeID" required>
    </div>
    <div class="form-group">
      <label for="AttendanceDate">AttendanceDate:</label>
      <input type="date" class="form-control" id="AttendanceDate" name="AttendanceDate" required>
    </div>
    <div class="form-group">
      <label for="ClocklnTime">Clock In Time:</label>
      <input type="time" class="form-control" id="ClocklnTime" name="ClocklnTime" required>
    </div>
    <div class="form-group">
      <label for="ClockOutTime">Clock Out Time:</label>
      <input type="time" class="form-control" id="ClockOutTime" name="ClockOutTime" required>
    </div>
    <div class="form-group">
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </form>
</div>

</body>
</html>
