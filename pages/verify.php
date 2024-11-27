<?php
require_once '../config.php'; // Your database connection

if (isset($_GET['verificationToken'])) {
    $token = $_GET['verificationToken'];

    // Check if the token exists in the database
    $sql = "SELECT id FROM users WHERE verificationToken = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $token);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Token found, activate the user
        $sql = "UPDATE users SET emailVerified = 1 WHERE verificationToken = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $token);
        $stmt->execute();

        echo "Your email has been verified successfully!";
    } else {
        echo "Invalid or expired token.";
    }
    $stmt->close();
} else {
    echo "No token provided!";
}
?>
