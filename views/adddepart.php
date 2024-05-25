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
  <title>Add Department Info</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <?php require 'components/header.php'; ?>
  <div class="container">
    <h2>Add Department Info</h2>
    <?php if (isset($_SESSION['errordepart'])) : ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $_SESSION['errordepart']; ?>
      </div>
    <?php unset($_SESSION["errordepart"]);
    endif; ?>

    <?php if (isset($_SESSION['erroremployee'])) : ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $_SESSION['erroremployee']; ?>
      </div>
    <?php unset($_SESSION["erroremployee"]);
    endif; ?>
    <form action="../controllers/departsubmit.php" method="post">
      <div class="form-group">
        <label for="departmentID">Department ID:</label>
        <input type="text" class="form-control" id="departmentID" name="departmentID" required>
      </div>
      <div class="form-group">
        <label for="departmentName">Department Name:</label>
        <input type="text" class="form-control" id="departmentName" name="departmentName" required>
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
  </div>

</body>

</html>