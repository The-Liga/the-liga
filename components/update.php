<?php
include('../config.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['id'];
    $firstName = $_POST['firstName'];
    $surname = $_POST['lastName'];
    $phoneNo = $_POST['phoneNo'];
    $address = $_POST['username'];
    $email = $_POST['email'];
    $password = isset($_POST['password']) ? md5($_POST['password']) : null;

    // Validate image upload
    if (!empty($_FILES["image"]["name"])) {
        $productImage = $_FILES["image"]["name"];
        $ext = pathinfo($productImage, PATHINFO_EXTENSION);
        $allowedTypes = array("jpg", "jpeg", "png", "gif");
        $tempName = $_FILES["image"]["tmp_name"];
        $targetPath = "../../assets/uploads/" . $productImage;

        if (!in_array($ext, $allowedTypes)) {
            $errors[] = "Allowed file types are JPG, JPEG, PNG, and GIF.";
        } elseif (!move_uploaded_file($tempName, $targetPath)) {
            $errors[] = "Failed to upload image. Please try again.";
        }
    } else {
        // If no new image is uploaded, keep the old one
        $profileImage = $_POST['currentProfileImage'];
    }

    // Update user data in the database
    $query = "UPDATE users SET firstName = ?, lastName = ?, phoneNo = ?, username = ?, email = ?, profileImage = ?, password = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sssssssi', $firstName, $surname, $phoneNo, $address, $email, $profileImage, $password, $userId);
    
    if ($stmt->execute()) {
        echo "Profile updated successfully!";
    } else {
        echo "Error updating profile.";
    }
}
?>
