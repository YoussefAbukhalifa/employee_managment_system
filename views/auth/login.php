<?php
session_start();
if(isset($_SESSION['role'])){
  header("Location: ../dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Custom CSS can be placed here */
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row justify-content-center mt-5">
    <div class="col-md-4">
      <div class="card">
        <div class="card-header bg-dark text-white">
          <h3 class="mb-0">Login</h3>
        </div>
        <div class="card-body">
          <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $_SESSION['error']; ?>
            </div>
          <?php unset($_SESSION["errordepart"]) ; endif; ?>
          <form action="../../controllers/login.php" method="post" autocomplete="off">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email" required name="email" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" placeholder="Password" required name="password" aria-describedby="passwordHelp">
            </div>
            <button type="submit" class="btn btn-primary btn-block" name="submit">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS and jQuery (Optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
