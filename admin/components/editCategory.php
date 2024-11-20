<?php
include('../../config.php');

// Check if product ID is posted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['categoryID'])) {
    $categoryID = $_POST['categoryID'];

    // Retrieve product details from the database
    $query = "SELECT * FROM categories WHERE id = '$categoryID'";
    $result = $conn->query($query);

    if ($result && $row = $result->fetch_assoc()) {
        // Load product data into variables
        $categoryName = $row['categoryName'];
        $numProducts = $row['numProducts'];
        $categoryImage = $row['categoryImage'];
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
    <title>Edit Category</title>
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

        <form method="post" action="./update.php" class="product-card" enctype='multipart/form-data'>
            <input type="hidden" name="categoryID" value="<?php echo $categoryID; ?>">
            <input type="hidden" name="existingImage" value="<?php echo $categoryImage; ?>">

            <div class="categoryImage">
                <input type="file" name="image" value="<?php echo $categoryImage; ?>">
                <label for="categoryImage" for="categoryImage">Upload New Image</label>
            </div>
            <div class="product-info">
                <label for="categoryName">Category Name:</label>
                <input type="text" id="categoryName" name="categoryName" placeholder="Enter category name"
                    value="<?php echo htmlspecialchars($categoryName); ?>">

                <label for="numProducts">No. of Products:</label>
                <input type="number" id="numProducts" name="numProducts" placeholder="Enter No. of Products"
                    value="<?php echo htmlspecialchars($numProducts); ?>">

                <input type="submit" class="btn bg-black text-white w-50" value="Update Category" name="updateCategory" />
            </div>
        </form>

    </main>
</body>

</html>