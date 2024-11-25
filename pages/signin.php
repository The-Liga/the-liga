<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register & Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="../styles/registration.css">
</head>

<body>
  

  <div class="container" id="signIn">
    <h1 class="form-title">Sign In</h1>
    <form method="post" action="register.php">
      <div class="input-group">
        <i class="fas fa-envelope"></i>
        <input type="email" name="email" id="email" placeholder="Email" required>
        <label for="email">Email</label>
      </div>
      <div class="input-group">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" id="password" placeholder="Password" required>
        <label for="password">Password</label>
      </div>
      <p class="recover">
        <a href="#">Recover Password</a>
      </p>
      <input type="submit" class="btn" value="Sign In" name="signIn">
    </form>
    <p class="or">
      --------or--------
    </p>
    <div class="icons">
      <i class="fab fa-google"></i>
      <i class="fab fa-facebook"></i>
    </div>
    <div class="links">
      <p>Don't have account yet?</p>
      <button id="signUpButton">Sign Up</button>
    </div>
  </div>
  <script src="./script.js"></script>
  <script>
        document.addEventListener("DOMContentLoaded", () => {
            const form = document.querySelector("form");

            form.addEventListener("submit", (event) => {
                const errors = [];

                // Validate product name (only alphabets and spaces)
                const username = document.getElementById("username").value.trim();
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