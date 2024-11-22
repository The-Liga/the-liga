<?php

include '../config.php';


// Handling User Registratio

if (isset($_POST['signUp'])) {
    // Sanitize and retrieve input values
    $username = htmlspecialchars(trim($_POST['username']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = $_POST['password'];
    $cpassword = $_POST['cPassword'];

    // Initialize an array for error messages
    $errors = [];

    // Validate username: Only alphabets and numbers allowed
    if (empty($username) || !preg_match('/^[a-zA-Z0-9]+$/', $username)) {
        $errors[] = "Username must contain only alphabets and numbers.";
    }

    // Validate email: Must be in valid email format
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid email address is required.";
    }

    // Validate password: Minimum 8 characters
    if (empty($password) || strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long.";
    }

    // Validate password confirmation
    if ($password !== $cpassword) {
        $errors[] = "Passwords do not match.";
    }

    // Check if email already exists in the database
    $checkEmail = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($checkEmail);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $errors[] = "Email address already exists!";
    }

    // Determine user type based on password contents
    $userType = (strpos($password, 'admin') !== false || strpos($password, 'the-liga') !== false) ? 'admin' : 'user';


    // If there are no errors, register the user
    if (empty($errors)) {
        // Hash the password for security
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Insert user into the database
        $insertQuery = "INSERT INTO users (username, email, password, userType) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param('ssss', $username, $email, $hashedPassword, $userType);

        if ($stmt->execute()) {
            header("Location: ../pages/categories.php");
            exit;
        } else {
            $errors[] = "Something went wrong during the upload.";
            $_SESSION['errors'] = $errors;
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
    } else {
        echo json_encode(["success" => false, "errors" => $errors]);
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
