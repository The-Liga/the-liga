
<?php
include('../../config.php');

if ($_POST["addProduct"]) {
    $productName = mysqli_real_escape_string($conn, $_POST['productName']);
    $productPrice = mysqli_real_escape_string($conn, $_POST['productPrice']);
    $productDescription = mysqli_real_escape_string($conn, $_POST['productDescription']);
    $productReturn = mysqli_real_escape_string($conn, $_POST['productReturn']);
    $productDelivery = mysqli_real_escape_string($conn, $_POST['productDelivery']);
    $productMaterial = mysqli_real_escape_string($conn, $_POST['productMaterial']);
    $productSizes = explode(',', $_POST['productSize']);
    $productSizeJson = json_encode($productSizes);
    $productColors = explode(',', $_POST['productColor']);
    $productColorJson = json_encode($productColors);
    $productCategory = mysqli_real_escape_string($conn, $_POST['productCategory']);
    
    // Set sale as 1 if checked, else 0
    $sale = isset($_POST['sale']) ? 1 : 0;

    // Handle image upload
    if (!empty($_FILES["image"]["name"])) {
        $productImage = $_FILES["image"]["name"];
        $ext = pathinfo($productImage, PATHINFO_EXTENSION);
        $allowedTypes = array("jpg", "jpeg", "png", "gif");
        $tempName = $_FILES["image"]["tmp_name"];
        $targetPath = "../../assets/uploads/products/" . $productImage;

        if (in_array($ext, $allowedTypes)) {
            move_uploaded_file($tempName, $targetPath);
        } else {
            echo "Your file type is not allowed";
            exit;
        }
    } else {
        echo "Image is required";
        exit;
    }

    // Insert the new product data into the database
    $query = "INSERT INTO products (sale, productCategory, productName, productPrice, productDescription, productReturn, productDelivery, productMaterial, productSize, productColor, productImage) 
              VALUES ('$sale', '$productCategory', '$productName', '$productPrice', '$productDescription', '$productReturn', '$productDelivery', '$productMaterial', '$productSizeJson', '$productColorJson', '$productImage')";

    if (mysqli_query($conn, $query)) {
        header("Location: products.php");
    } else {
        echo "Something went wrong during the upload.";
    }
}



if ($_POST["addCategory"]) {
    $categoryName = $_POST['categoryName'];
    $numProducts = $_POST['numProducts'];
    $categoryImage = $_FILES["image"]["name"];


    $ext = pathinfo($categoryImage, PATHINFO_EXTENSION);
    $allowedTypes = array("jpg", "jpeg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "../../assets/uploads/categories" . $categoryImage;

    if (in_array($ext, $allowedTypes)) {
        if (move_uploaded_file($tempName, $targetPath)) {
            $query = "INSERT INTO categories (categoryName, numProducts, categoryImage) VALUES ('$categoryName', '$numProducts', '$categoryImage')";
            if (mysqli_query($conn, $query)) {
                header("Location: dashboard.php");
            } else {
                echo "Something is wrong";
            }
        } else {
            echo "File is not uploaded";
        }
    } else {
        echo "Your files are not allowed";
    }
}

if (isset($_POST['id'])) {
    $productId = $_POST['id'];
    $sql = "DELETE FROM products WHERE id = $productId";

        if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
        } else {
        echo "Error deleting record: " . mysqli_error($conn);
        }
}
