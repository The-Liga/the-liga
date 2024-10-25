<?php 
session_start(); 
if(!isset($_SESSION['email']) || $_SESSION['userType'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Welcome to the Admin Dashboard, <?php echo $_SESSION['email']; ?></h1>
    <!-- Admin-specific content goes here -->
</body>
</html>
