<?php include('../../config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard</title>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="../../styles/admin/navbar.css">
<link rel="stylesheet" href="../../styles.css">
<link rel="stylesheet" href="../../styles/admin/dashboard.css">
<script src="../../script.js"></script>
</head>

<body>
    <?php include('../../components/adminNavbar.php'); ?>

    <main class="admin-main">
        <aside class="admin-sidenav">
            <?php include('../../components/adminSidenav.php'); ?>
        </aside>

        <section class="admin-content">
            <div class="admin-card1">
                <a href="./categories.php">
                    <div class="admin-child-card">
                        <?php
                        $sql = "SELECT COUNT(*) AS total_categories FROM categories";
                        $result = $conn->query($sql);

                        if ($result) {
                            $row = $result->fetch_assoc();
                            $categoryCount = $row['total_categories'];
                        } else {
                            $userCount = 0; // Handle errors or empty result
                        }

                        ?> <span>Categories: <?php echo $categoryCount; ?></span>
                    </div>
                </a>
                <a href="./products.php">
                    <div class="admin-child-card">
                        <?php
                        $sql = "SELECT COUNT(*) AS total_users FROM users";
                        $result = $conn->query($sql);

                        if ($result) {
                            $row = $result->fetch_assoc();
                            $userCount = $row['total_users'];
                        } else {
                            $userCount = 0; // Handle errors or empty result
                        }

                        $conn->close();
                        ?> <span>Users: <?php echo $userCount; ?></span>
                    </div>
                </a>
                <div class="admin-child-card">Orders</div>
                <div class="admin-child-card">Sales</div>
            </div>
            <div class="admin-card">
                <h1>Products</h1>
                <a href="./addProduct.php"><button class="btn bg-black text-white">Add Product</button></a>
            </div>
            <div class="admin-card">
                <h1>Categories</h1>
                <a href="./addCategory.php"><button class="btn bg-black text-white">Add Category</button></a>
            </div>
            <div class="admin-card">Card 4</div>
        </section>
    </main>
</body>

</html>