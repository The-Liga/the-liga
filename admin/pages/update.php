<?php
include('../../config.php');

if ($_POST["updateProduct"]) {
    $productID = $_POST['productID'];
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
    $sale = isset($_POST['sale']) ? 1 : 0;

    // Handle image upload or keep the existing image
    if (!empty($_FILES["image"]["name"])) {
        $productImage = $_FILES["image"]["name"];
        $ext = pathinfo($productImage, PATHINFO_EXTENSION);
        $allowedTypes = array("jpg", "jpeg", "png", "gif");
        $tempName = $_FILES["image"]["tmp_name"];
        $targetPath = "../../assets/uploads/products/" . $productImage;

        if (in_array($ext, $allowedTypes)) {
            move_uploaded_file($tempName, $targetPath);
        } else {
            echo "Your files are not allowed";
            exit;
        }
    } else {
        $productImage = mysqli_real_escape_string($conn, $_POST['existingImage']);
    }

    // Update the product instead of inserting a new one
    $query = "UPDATE products SET 
                sale = '$sale', 
                productCategory = '$productCategory', 
                productName = '$productName', 
                productPrice = '$productPrice', 
                productDescription = '$productDescription', 
                productReturn = '$productReturn', 
                productDelivery = '$productDelivery', 
                productMaterial = '$productMaterial', 
                productSize = '$productSizeJson', 
                productColor = '$productColorJson', 
                productImage = '$productImage' 
              WHERE id = '$productID'";

    if (mysqli_query($conn, $query)) {
        header("Location: products.php");
    } else {
        echo "Something went wrong during the update.";
    }
}
?>

