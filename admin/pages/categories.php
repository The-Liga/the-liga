<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../../styles/admin/navbar.css">
    <link rel="stylesheet" href="../../styles.css">
    <link rel="stylesheet" href="../../styles/admin/products.css">
    <script src="../../script.js"></script>
</head>

<body>
    <?php include('../../components/adminNavbar.php');
    include('../../config.php');


    // SQL query to fetch products
    $sql = "SELECT * FROM categories";
    $result = $conn->query($sql);


    ?>

    <main class="admin-main">

        <aside class="admin-sidenav">
            <?php include('../../components/adminSidenav.php'); ?>
        </aside>


        <table class="product-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>No. of Products</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()):
                    $imagePath = $row['categoryImage'];
                    $imageFullPath = "../../assets/uploads/categories" . $imagePath;
                    $categoryID = $row['id'];
                    ?>
                    <tr>
                        <td>
                            <div class="category-image"><img src="<?php echo $imageFullPath; ?>"></div>
                        </td>
                        <td><?php echo $row['categoryName']; ?></td>
                        <td><?php echo $row['numProducts']; ?></td>

                        <td>
                            <div class="buttons">
                                <form method="post" action="../components/editCategory.php" style="display:inline;">
                                    <input type="hidden" name="categoryID" value="<?php echo $row['id']; ?>">
                                    <button type="submit" class="edit-button">Edit</button>
                                </form>
                                <form method="post" action="../components/delete.php" style="display:inline;">
                                    <input type="hidden" name="categoryID" value="<?php echo $categoryID; ?>">
                                    <button type="submit" class="delete-button"
                                        onclick="return confirm('Are you sure you want to delete this category?');">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

    </main>
</body>

</html>