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
  <title>Dashboard</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Custom CSS */
    .card-container {
      margin-top: 50px;
    }
  </style>
</head>
<body>
<?php require 'components/header.php' ;?>
<div class="container text-center">
  <h1 class="mb-4 mt-3">Dashboard</h1>
  <div class="row">
    <div class="col-md-6">
      <div class="card card-container">
        <div class="card-body">
          <h3 class="card-title"> <a href="employees.php"> Total Employees </a></h3>
          <h1 class="display-3" id="employeeCount">Loading...</h1>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card card-container">
        <div class="card-body">
          <h3 class="card-title"> <a href="employees.php"> Total Managers </a></h3>
          <h1 class="display-3" id="managerCount">Loading...</h1>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card card-container">
        <div class="card-body">
          <h3 class="card-title"><a href="departs.php"> Departments </a></h3>
          <h1 class="display-3" id="departsCount">Loading...</h1>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card card-container">
        <div class="card-body">
          <h3 class="card-title"> <a href="admins.php">Total Admins </a></h3>
          <h1 class="display-3" id="adminsCount">Loading...</h1>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS and jQuery (Optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Script to fetch and update employee count dynamically -->
<script>
  function updateEmployeeCount() {
    $.ajax({
      url: '../controllers/dashboard.php',
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        // Update the employee count displayed on the page
        $('#employeeCount').text(data.total_employees);
        $('#managerCount').text(data.total_managers);
        $('#departsCount').text(data.total_departs);
        $('#adminsCount').text(data.total_admins);
      },
      error: function(xhr, status, error) {
        console.error('Error fetching employee count:', status);
      }
    });
  }

  // Call updateEmployeeCount initially and then every 5 seconds
  updateEmployeeCount(); // Call initially
  setInterval(updateEmployeeCount, 5000); // Call every 5 seconds (5000 milliseconds)
</script>


</body>
</html>
