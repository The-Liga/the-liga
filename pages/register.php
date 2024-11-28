<?php

include '../config.php'; // Database connection
header('Content-Type: application/json'); // Return JSON response

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // PHPMailer autoload

// Function to send verification email
function sendVerificationEmail($email, $token)
{
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Gmail SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'Kdibakwana807@gmail.com'; // Replace with your email
        $mail->Password = 'rfey nzzh bppt mphk'; // Use app password if 2FA is enabled
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('no-reply@yourdomain.com', 'The Liga');
        $mail->addAddress($email); // Recipient's email

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Email Verification';
        $mail->Body    = "Click the link below to verify your email address:<br><a href='http://localhost/the-liga/pages/verify.php?verificationToken=$token'>Verify Email</a>";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return ['success' => false, 'errors' => ['Message could not be sent. Mailer Error: ' . $mail->ErrorInfo]];
    }
}

try {
    if (isset($_POST['signUp'])) {
        // Handle User Registration
        $username = htmlspecialchars(trim($_POST['username']));
        $email = htmlspecialchars(trim($_POST['email']));
        $password = trim($_POST['password']);
        $cpassword = trim($_POST['cPassword']);
        $errors = [];

        // Validation logic
        if (empty($username)) {
            $errors[] = "Username is required.";
        } elseif (!preg_match("/^[a-zA-Z0-9]+$/", $username)) {
            $errors[] = "Username must contain only letters and numbers.";
        }

        if (empty($email)) {
            $errors[] = "Email is required.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format.";
        } else {
            // Check if the email already exists
            $sql = "SELECT email FROM users WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                $errors[] = "Email is already registered.";
            }
            $stmt->close();
        }

        if (empty($password)) {
            $errors[] = "Password is required.";
        } elseif (strlen($password) < 8) {
            $errors[] = "Password must be at least 8 characters long.";
        } elseif (!preg_match("/[a-zA-Z]/", $password) || !preg_match("/[\W_]/", $password)) {
            $errors[] = "Password must contain at least one letter and one special character.";
        }

        if (empty($cpassword)) {
            $errors[] = "Confirm Password is required.";
        } elseif ($password !== $cpassword) {
            $errors[] = "Passwords do not match.";
        }

        if (empty($errors)) {
            // Determine user type based on the password
            $userType = (stripos($password, 'admin') !== false || stripos($password, 'the liga') !== false) ? 'admin' : 'regular';

            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Generate a token
            $token = bin2hex(random_bytes(50));

            // Insert user into the database
            $sql = "INSERT INTO users (username, email, password, userType, verificationToken) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $username, $email, $hashedPassword, $userType, $token);

            if ($stmt->execute()) {
                // Send verification email
                $emailResponse = sendVerificationEmail($email, $token);
                if ($emailResponse === true) {
                    echo json_encode([
                        'success' => true,
                        'message' => 'Registration successful! Please check your email to verify your account.',
                        'redirect' => '../index.php' // Redirect to login page after successful registration
                    ]);
                } else {
                    echo json_encode($emailResponse);
                }
            } else {
                echo json_encode(['success' => false, 'errors' => ['User registration failed.']]);
            }
            $stmt->close();
        } else {
            echo json_encode(['success' => false, 'errors' => $errors]);
        }
    } elseif (isset($_POST['signIn'])) {
        // Handle User Login
        $emailOrUsername = htmlspecialchars(trim($_POST['emailOrUsername']));
        $password = trim($_POST['password']);

        // Determine whether input is email or username
        if (filter_var($emailOrUsername, FILTER_VALIDATE_EMAIL)) {
            $sql = "SELECT id, email, password, userType, emailVerified FROM users WHERE email = ?";
        } else {
            $sql = "SELECT id, email, password, userType, emailVerified FROM users WHERE username = ?";
        }

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $emailOrUsername);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id, $dbEmail, $dbPassword, $userType, $emailVerified);

        if ($stmt->num_rows > 0) {
            $stmt->fetch();
            if ($emailVerified == 0) {
                // Email not verified
                echo json_encode(['success' => false, 'errors' => ['Your email is not verified. Please verify your email to log in.']]);
            } elseif (password_verify($password, $dbPassword)) {
                // Successful login
                $_SESSION['email'] = $dbEmail;
                $_SESSION['userType'] = $userType;

                echo json_encode(['success' => true, 'message' => 'Login successful!', 'userType' => $userType]);
            } else {
                echo json_encode(['success' => false, 'errors' => ['Incorrect password.']]);
            }
        } else {
            echo json_encode(['success' => false, 'errors' => ['No user found with the provided email or username.']]);
        }
        $stmt->close();
    } else {
        throw new Exception('Invalid request.');
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'errors' => [$e->getMessage()]]);
}

$conn->close();
exit();
