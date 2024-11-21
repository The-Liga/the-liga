<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
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
            <div class="product-image">
                <input type="file" name="image">
                <label for="product-image" for="productImage">Upload Image</label>
            </div>
            <div class="product-info">
                <label for="product-name">Product Name:</label>
                <input type="text" id="product-name" name="productName" placeholder="Enter product name">

                <label for="product-price">Price:</label>
                <input type="number" id="product-price" name="productPrice" placeholder="Enter price">

                <label for="product-size">Sizes:</label>
                <textarea id="product-size" name="productSize" placeholder="Enter sizes separated by commas or newlines"></textarea>


                <label for="productColor">Colors:</label>
                <textarea id="product-color" name="productColor" placeholder="Enter colors separated by commas or newlines"></textarea>

                <label for="product-category">Category:</label>
                <input type="text" id="product-category" name="productCategory" placeholder="Enter category">

                <label for="product-description">Description:</label>
                <textarea id="product-description" name="productDescription" placeholder="Enter description"></textarea>

                <label for="product-material">Material:</label>
                <input type="text" id="product-material" name="productMaterial" placeholder="Enter material">

                <label for="product-delivery">Delivery Info:</label>
                <textarea id="product-delivery" name="productDelivery"
                    placeholder="Enter delivery information"></textarea>

                <label for="product-return">Return Info:</label>
                <textarea id="product-return" name="productReturn" placeholder="Enter return information"></textarea>

                <label for="sale">Product on Sale:</label>
                <input type="checkbox" id="sale" name="sale"></input>

                <input type="submit" class="btn bg-black text-white w-50" value="Add Product" name="addProduct" />
            </div>
        </form>
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const form = document.querySelector("form");

            form.addEventListener("submit", (event) => {
                const errors = [];

                // Validate product name (only alphabets and spaces)
                const productName = document.getElementById("product-name").value.trim();
                if (!/^[a-zA-Z\s]+$/.test(productName)) {
                    errors.push("Product name must only contain alphabets and spaces.");
                }

                // Validate product price (positive number)
                const productPrice = document.getElementById("product-price").value.trim();
                if (isNaN(productPrice) || productPrice <= 0) {
                    errors.push("Product price must be a valid positive number.");
                }

                // Validate email (if applicable)
                const emailField = document.getElementById("email"); // Add this field if needed
                if (emailField && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailField.value.trim())) {
                    errors.push("Please enter a valid email address.");
                }

                // Validate other fields
                const productCategory = document.getElementById("product-category").value.trim();
                if (productCategory === "") {
                    errors.push("Product category is required.");
                }

                const productImage = document.querySelector("input[type='file']").value;
                if (!productImage) {
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