

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
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

        <form method="post" action="../components/upload.php" class="product-card" enctype='multipart/form-data'>
            <div class="categoryImage">
                <input type="file" name="image">
                <label for="categoryImage" for="categoryImage">Upload Image</label>
            </div>
            <div class="product-info">
                <label for="categoryName">Category Name:</label>
                <input type="text" id="categoryName" name="categoryName" placeholder="Enter category name">

                <label for="numProducts">No. of products:</label>
                <input type="number" id="numProducts" name="numProducts" placeholder="Enter number of products">

                <input type="submit" class="btn bg-black text-white w-50" value="Add Category" name="addCategory" />
            </div>
        </form>
    </main>
</body>

</html>