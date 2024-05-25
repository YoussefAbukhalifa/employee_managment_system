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
        <h2>Add Admin Info</h2>
        <?php if (isset($_SESSION['erroraddadmin'])) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION['erroraddadmin']; ?>
            </div>
        <?php unset($_SESSION["erroraddadmin"]);
        endif; ?>
        <form action="../controllers/addadmin.php" method="post">
            <div class="form-group">
                <label for="EmployeeID">Employee ID:</label>
                <input type="text" class="form-control" id="EmployeeID" name="EmployeeID" required>
            </div>
            <div class="form-group">
                <label for="pass">Passworrd:</label>
                <input type="password" class="form-control" id="pass" name="pass" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>

</body>

</html>