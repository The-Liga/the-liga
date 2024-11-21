
<?php
include('../../config.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["addProduct"])) {
    
    $errors = []; // Collect errors to pass back to the form

    // Validate product name (only alphabets and spaces)
    $productName = mysqli_real_escape_string($conn, $_POST['productName']);
    if (!preg_match("/^[a-zA-Z\s]+$/", $productName)) {
        $errors[] = "Product name must only contain alphabets and spaces.";
    }

    // Validate product price (must be a positive number)
    $productPrice = mysqli_real_escape_string($conn, $_POST['productPrice']);
    if (!filter_var($productPrice, FILTER_VALIDATE_FLOAT) || $productPrice <= 0) {
        $errors[] = "Product price must be a valid positive number.";
    }

    // Validate email (if included in your form)
    if (isset($_POST['email'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Please enter a valid email address.";
        }
    }

    // Validate other fields (e.g., sizes, colors, category)
    $productSizes = explode(',', $_POST['productSize']);
    $productSizeJson = json_encode($productSizes);
    if (empty($productSizes)) {
        $errors[] = "Product sizes cannot be empty.";
    }

    $productColors = explode(',', $_POST['productColor']);
    $productColorJson = json_encode($productColors);
    if (empty($productColors)) {
        $errors[] = "Product colors cannot be empty.";
    }

    $productCategory = mysqli_real_escape_string($conn, $_POST['productCategory']);
    if (empty($productCategory)) {
        $errors[] = "Product category is required.";
    }

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
        $errors[] = "Image is required.";
    }

    // If there are errors, redirect back with messages
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['formData'] = $_POST;
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    // Insert into the database if no errors
    $query = "INSERT INTO products (sale, productCategory, productName, productPrice, productDescription, productReturn, productDelivery, productMaterial, productSize, productColor, productImage) 
              VALUES ('$sale', '$productCategory', '$productName', '$productPrice', '$productDescription', '$productReturn', '$productDelivery', '$productMaterial', '$productSizeJson', '$productColorJson', '$productImage')";

    if (mysqli_query($conn, $query)) {
        header("Location: ../pages/products.php");
        exit;
    } else {
        $errors[] = "Something went wrong during the upload.";
        $_SESSION['errors'] = $errors;
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["addCategory"])) {
    
    $errors = []; // Collect errors to pass back to the form

    // Validate product name (only alphabets and spaces)
    $categoryName = mysqli_real_escape_string($conn, $_POST['categoryName']);
    if (!preg_match("/^[a-zA-Z\s]+$/", $categoryName)) {
        $errors[] = "Category name must only contain alphabets and spaces.";
    }

    $numProducts = mysqli_real_escape_string($conn, $_POST['numProducts']);
    if (!filter_var($numProducts, FILTER_VALIDATE_FLOAT) || $numProducts <= 0) {
        $errors[] = "Number of products must be a valid positive number.";
    }
   

     // Validate image upload
     if (!empty($_FILES["image"]["name"])) {
        $categoryImage = $_FILES["image"]["name"];
        $ext = pathinfo($categoryImage, PATHINFO_EXTENSION);
        $allowedTypes = array("jpg", "jpeg", "png", "gif");
        $tempName = $_FILES["image"]["tmp_name"];
        $targetPath = "../../assets/uploads/" . $categoryImage;

        if (!in_array($ext, $allowedTypes)) {
            $errors[] = "Allowed file types are JPG, JPEG, PNG, and GIF.";
        } elseif (!move_uploaded_file($tempName, $targetPath)) {
            $errors[] = "Failed to upload image. Please try again.";
        }
    } else {
        $errors[] = "Image is required.";
    }

    // If there are errors, redirect back with messages
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['formData'] = $_POST;
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    // Insert the new product data into the database
    $query = "INSERT INTO categories (categoryName, numProducts, categoryImage) 
              VALUES ('$categoryName', '$numProducts', '$categoryImage')";

    if (mysqli_query($conn, $query)) {
        header("Location: ../pages/categories.php");
        exit;
    } else {
        $errors[] = "Something went wrong during the upload.";
        $_SESSION['errors'] = $errors;
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}
