<?php

session_start();

require '../db/dbconn.php';

// Check if email and password are provided
if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    // Hash the password
    $hashedPassword = hash('sha256', $password);
    // Prepare the SQL statement with a placeholder for the email
    $sql = "SELECT * FROM admin WHERE email = ?";
    // Prepare the statement
    $stmt = mysqli_prepare($dbConnection, $sql);
    // Bind parameters
    mysqli_stmt_bind_param($stmt, "s", $email);
    // Execute the statement
    mysqli_stmt_execute($stmt);
    // Get the result
    $result = mysqli_stmt_get_result($stmt);
    
    // Check if query executed successfully
    if ($result) {
        // Check if user exists
        if (mysqli_num_rows($result) == 1) {
            // Fetch the row
            $row = mysqli_fetch_assoc($result);
            // Verify the password
            if($row['pass'] === $hashedPassword) {
                $_SESSION['email'] = $row['email'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['name'] = $row['fullname'];
                // Redirect to a dashboard or home page upon successful login
                header("Location: ../views/dashboard.php");
                exit();
            } else {
                $_SESSION['error'] = 'Invalid email or password';
                header("Location: ../views/auth/login.php");
                exit();
            }
        } else {
            $_SESSION['error'] = 'Invalid email or password';
            header("Location: ../views/auth/login.php");
            exit();        
        }
    } else {
        $_SESSION['error'] = 'Oops! Something went wrong. Please try again later.';
        header("Location: ../views/auth/login.php");
        exit();
    }
} else {
    $_SESSION['error'] = 'Please provide both email and password';
    header("Location: ../views/auth/login.php");
    exit();
}
?>
