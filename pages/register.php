<?php

include '../config.php';

// Handling User Registration
if (isset($_POST['signUp'])) {
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if password meets admin criteria
    $isAdmin = (strpos($password, 'admin') !== false && strpos($password, 'the-liga') !== false);

    // Determine user type based on password
    $userType = $isAdmin ? 'admin' : 'user';

    // Hash the password
    $password = md5($password);

    // Check if email already exists
    $checkEmail = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkEmail);
    if ($result->num_rows > 0) {
        echo "Email Address Already Exists!";
    } else {
        // Insert the user into the database with the determined user type
        $insertQuery = "INSERT INTO users (firstName, lastName, email, password, userType)
                        VALUES ('$firstName', '$lastName', '$email', '$password', '$userType')";
        if ($conn->query($insertQuery) === TRUE) {
            header("Location: ../index.php");
            exit();
        } else {
            echo "Error: ";
        }
    }
}

// Handling User Login
if (isset($_POST['signIn'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION['email'] = $row['email'];
        $_SESSION['userType'] = $row['userType']; // Store user type in session

        // Redirect based on user type
        switch ($row['userType']) {
            case 'admin':
                header("Location: ../admin/pages/dashboard.php");
                break;
            case 'user':
                header("Location: ../index.php");
                break;
            default:
                header("Location: ../index.php"); // Default redirect
                break;
        }
        exit();
    } else {
        echo "Not Found, Incorrect Email or Password";
    }
}
