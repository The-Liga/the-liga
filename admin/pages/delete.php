<?php
include('../../config.php'); // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['productID'])) {
    $productID = $_POST['productID'];

    // SQL to delete the product by productID
    $query = "DELETE FROM products WHERE id = '$productID'";

    if (mysqli_query($conn, $query)) {
        // Redirect back to the dashboard after deletion
        header("Location: products.php");
        exit();
    } else {
        echo "Error: Could not delete the product.";
    }
} else {
    echo "Invalid request.";
}
?>
