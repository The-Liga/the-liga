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
        <div id="toast-container" style="position: fixed; top: 100px; right: 10px; z-index: 9999;"></div>
        <form method="post" action="../components/upload.php" class="product-card" enctype='multipart/form-data'>
            <div class="categoryImage">
                <input type="file" name="image">
                <label for="categoryImage" for="categoryImage">Upload Image</label>
            </div>
            <div class="product-info">
                <label for="categoryName">Category Name:</label>
                <input type="text" id="category-name" name="categoryName" placeholder="Enter category name">

                <label for="numProducts">No. of products:</label>
                <input type="number" id="num-products" name="numProducts" placeholder="Enter number of products">

                <input type="submit" class="btn bg-black text-white w-50" value="Add Category" name="addCategory" />
            </div>
        </form>
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const form = document.querySelector("form");

            form.addEventListener("submit", (event) => {
                const errors = [];

                // Validate product name (only alphabets and spaces)
                const productName = document.getElementById("category-name").value.trim();
                if (!/^[a-zA-Z\s]+$/.test(productName)) {
                    errors.push("Category name must only contain alphabets and spaces.");
                }

                // Validate product price (positive number)
                const numProducts = document.getElementById("num-products").value.trim();
                if (isNaN(numProducts) || numProducts <= 0) {
                    errors.push("Number of products must be a valid positive number.");
                }


                const categoryImage = document.querySelector("input[type='file']").value;
                if (!categoryImage) {
                    errors.push("Image is required.");
                }

                // Show errors if any
                if (errors.length > 0) {
                    event.preventDefault(); // Prevent form submission
                    const toastContainer = document.getElementById("toast-container");
                    toastContainer.innerHTML = ""; // Clear previous toasts
                    errors.forEach((error) => {
                        const toast = document.createElement("div");
                        toast.style.background = "#f8d7da";
                        toast.style.color = "#721c24";
                        toast.style.padding = "10px 15px";
                        toast.style.marginBottom = "10px";
                        toast.style.border = "1px solid #f5c6cb";
                        toast.style.borderRadius = "5px";
                        toast.innerText = error;

                        toastContainer.appendChild(toast);
                        setTimeout(() => toast.remove(), 5000); // Remove after 5 seconds
                    });
                }
            });
        });
    </script>
</body>

</html>