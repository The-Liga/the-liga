<?php
include('../../config.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['productID'])) {
    $productID = $_POST['productID'];

    $query = "DELETE FROM products WHERE id = '$productID'";

    if (mysqli_query($conn, $query)) {
        header("Location: ../pages/products.php");
        exit();
    } else {
        echo "Error: Could not delete the product.";
    }
} else {
    echo "Invalid request.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['categoryID'])) {
    $categoryID = $_POST['categoryID'];

    $query = "DELETE FROM categories WHERE id = '$categoryID'";

    if (mysqli_query($conn, $query)) {
        header("Location: ../pages/categories.php");
        exit();
    } else {
        echo "Error: Could not delete the category.";
    }
} else {
    echo "Invalid request.";
}


