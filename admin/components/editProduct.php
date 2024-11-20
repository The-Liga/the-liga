<?php
include('../../config.php');

// Check if product ID is posted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['productID'])) {
    $productID = $_POST['productID'];

    // Retrieve product details from the database
    $query = "SELECT * FROM products WHERE id = '$productID'";
    $result = $conn->query($query);

    if ($result && $row = $result->fetch_assoc()) {
        // Load product data into variables
        $productName = $row['productName'];
        $productPrice = $row['productPrice'];
        $productSize = implode(', ', json_decode($row['productSize'], true));
        $productColor = implode(', ', json_decode($row['productColor'], true));
        $productCategory = $row['productCategory'];
        $productDescription = $row['productDescription'];
        $productMaterial = $row['productMaterial'];
        $productDelivery = $row['productDelivery'];
        $productReturn = $row['productReturn'];
        $sale = $row['sale'];
        $productImage = $row['productImage'];
    }
} else {
    echo "No product selected for editing.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../../styles/admin/navbar.css">
    <link rel="stylesheet" href="../../styles.css">
    <link rel="stylesheet" href="../../styles/admin/addProduct.css">
    <script src="../../script.js"></script>
</head>

<body>
    <?php include('../../components/adminNavbar.php'); ?>

    <main class="admin-main">
        <aside class="admin-sidenav">
            <?php include('../../components/adminSidenav.php'); ?>
        </aside>

        <form method="post" action="../components/update.php" class="product-card" enctype='multipart/form-data'>
            <input type="hidden" name="productID" value="<?php echo $productID; ?>">
            <input type="hidden" name="existingImage" value="<?php echo $productImage; ?>">

            <div class="productImage">
                <input type="file" name="image" value="<?php echo $productImage; ?>">
                <label for="productImage" for="productImage">Upload New Image</label>
            </div>
            <div class="product-info">
                <label for="product-name">Product Name:</label>
                <input type="text" id="product-name" name="productName" placeholder="Enter product name"
                    value="<?php echo htmlspecialchars($productName); ?>">

                <label for="product-price">Price:</label>
                <input type="number" id="product-price" name="productPrice" placeholder="Enter price"
                    value="<?php echo htmlspecialchars($productPrice); ?>">

                <label for="product-size">Sizes:</label>
                <textarea id="product-size" name="productSize"><?php echo htmlspecialchars($productSize); ?></textarea>

                <label for="product-color">Colors:</label>
                <textarea id="product-color"
                    name="productColor"><?php echo htmlspecialchars($productColor); ?></textarea>

                <label for="product-category">Category:</label>
                <input type="text" id="product-category" name="productCategory" placeholder="Enter category"
                    value="<?php echo htmlspecialchars($productCategory); ?>">

                <label for="product-description">Description:</label>
                <textarea id="product-description"
                    name="productDescription"><?php echo htmlspecialchars($productDescription); ?></textarea>

                <label for="product-material">Material:</label>
                <input type="text" id="product-material" name="productMaterial" placeholder="Enter material"
                    value="<?php echo htmlspecialchars($productMaterial); ?>">

                <label for="product-delivery">Delivery Info:</label>
                <textarea id="product-delivery"
                    name="productDelivery"><?php echo htmlspecialchars($productDelivery); ?></textarea>

                <label for="product-return">Return Info:</label>
                <textarea id="product-return"
                    name="productReturn"><?php echo htmlspecialchars($productReturn); ?></textarea>

                <label for="sale">Product on Sale:</label>
                <input type="checkbox" id="sale" name="sale" <?php echo ($sale == 1) ? 'checked' : ''; ?>>


                <input type="submit" class="btn bg-black text-white w-50" value="Update Product" name="updateProduct" />
            </div>
        </form>

    </main>
</body>

</html>