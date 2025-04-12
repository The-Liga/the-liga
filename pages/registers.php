<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Liga | Register</title>
    <link rel="stylesheet" href="../styles/registers.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="container right-panel-active">
        <div id="toast-container" style="position: fixed; top: 100px; right: 10px; z-index: 9999;"></div>
        <!-- Sign Up -->
        <div class="container__form container--signup" id="form1">
            <form class="form" method="post" id="signUpForm">
                <h2 class="form__title">Sign Up</h2>
                <input type="text" placeholder="Username" name="username" id="username" class="input" required>
                <input type="email" placeholder="Email" name="email" id="email" class="input" required>
                <input type="password" placeholder="Password" name="password" id="password" class="input" required>
                <input type="password" placeholder="Confirm Password" name="cPassword" id="confirm_password" class="input" required>
                <input class="btn" type="submit" name="signUp" value="Sign Up">
            </form>

        </div>
        <!-- Sign In -->
        <div class="container__form container--signin">
            <form class="form" method="post" id="signInForm">
                <h2 class="form__title">Sign In</h2>
                <input type="text" placeholder="Username or Email" name="emailOrUsername" class="input" required>
                <input type="password" placeholder="Password" name="password" class="input" required>
                <a href="#" class="link">Forgot your password?</a>
                <button class="btn" type="submit" name="signIn">Sign In</button>
            </form>

        </div>
        <!-- Overlay -->
        <div class="container__overlay">
            <div class="overlay">
                <!-- Left Panel -->
                <div class="overlay__panel overlay--left">
                    <button class="btn" id="signIn">Sign In</button>
                    <p class="or">
                        --- Or ---
                    </p>
                    <div class="icons">
                        <a href="#" class="icon-link">
                            <i class="fa-brands fa-google"></i> Google
                        </a>
                        <a href="#" class="icon-link">
                            <i class="fa-brands fa-apple"></i> Apple
                        </a>
                    </div>
                </div>
                <!-- Right Panel -->
                <div class="overlay__panel overlay--right">
                    <button class="btn" id="signUp">Sign Up</button>
                    <p class="or">
                        --- Or ---
                    </p>
                    <div class="icons">
                        <a href="#" class="icon-link">
                            <i class="fa-brands fa-google"></i> Google
                        </a>
                        <a href="#" class="icon-link">
                            <i class="fa-brands fa-apple"></i> Apple
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const signInBtn = document.getElementById("signIn");
        const signUpBtn = document.getElementById("signUp");
        const container = document.querySelector(".container");
        signInBtn.addEventListener("click", () => {
            container.classList.remove("right-panel-active");
        });
        signUpBtn.addEventListener("click", () => {
            container.classList.add("right-panel-active");
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const signUpForm = document.getElementById("signUpForm");

            signUpForm.addEventListener("submit", async (e) => {
                e.preventDefault();

                const formData = new FormData(signUpForm);
                formData.append('signUp', 'true'); // Manually append signUp parameter

                const username = document.getElementById("username").value;
                const password = document.getElementById("password").value;

                // Client-side validation
                const errors = [];

                // Username validation
                if (!/^[a-zA-Z0-9]+$/.test(username)) {
                    errors.push("Username must contain only letters and numbers.");
                }

                // Password validation
                if (password.length < 8) {
                    errors.push("Password must be at least 8 characters long.");
                }
                if (!/[a-zA-Z]/.test(password) || !/[\W_]/.test(password)) {
                    errors.push("Password must contain at least one letter and one special character.");
                }

                if (errors.length > 0) {
                    errors.forEach(err => showToast("error", err));
                    return;
                }

                try {
                    const response = await fetch("register.php", {
                        method: "POST",
                        body: formData,
                    });

                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }

                    const result = await response.json();

                    if (result.success) {
                        showToast("success", result.message);
                        setTimeout(() => window.location.href = "../index.php", 2000);
                    } else if (result.errors) {
                        result.errors.forEach(err => showToast("error", err));
                    } else {
                        showToast("error", "Unexpected error occurred.");
                    }
                } catch (error) {
                    showToast("error", error.message || "An error occurred while processing the request.");
                }
            });

            function showToast(type, message) {
                const toastContainer = document.getElementById("toast-container");
                const toast = document.createElement("div");
                toast.className = `toast ${type}`;
                toast.innerText = message;
                toastContainer.appendChild(toast);

                setTimeout(() => {
                    toast.remove();
                }, 3000); // Remove toast after 3 seconds
            }
        });

        document.addEventListener("DOMContentLoaded", () => {
            const signInForm = document.getElementById("signInForm");

            signInForm.addEventListener("submit", async (e) => {
                e.preventDefault();

                const formData = new FormData(signInForm);

                // Append signIn parameter to ensure it's part of the POST request
                formData.append('signIn', 'true');

                const emailOrUsername = formData.get("emailOrUsername");
                if (!emailOrUsername) {
                    showToast("error", "Please enter a valid email or username.");
                    return;
                }

                try {
                    const response = await fetch("register.php", {
                        method: "POST",
                        body: formData,
                    });

                    const result = await response.json();

                    if (result.success) {
                        showToast("success", result.message);
                        setTimeout(() => {
                            if (result.userType === 'admin') {
                                window.location.href = "../admin/pages/dashboard.php";
                            } else {
                                window.location.href = "../index.php";
                            }
                        }, 2000);
                    } else {
                        result.errors.forEach(err => showToast("error", err));
                    }
                } catch (error) {
                    showToast("error", "An unexpected error occurred.");
                }
            });

            function showToast(type, message) {
                const toastContainer = document.getElementById("toast-container");
                const toast = document.createElement("div");
                toast.className = `toast ${type}`;
                toast.innerText = message;
                toastContainer.appendChild(toast);

                setTimeout(() => {
                    toast.remove();
                }, 8000);
            }
        });

        // fetch('register.php', {
        //         method: 'POST',
        //         body: new FormData(document.querySelector('form')) // Assuming you're submitting a form
        //     })
        //     .then(response => response.json()) // Parse the response as JSON
        //     .then(data => {
        //         if (data.success) {
        //             alert(data.message); // Success message
        //         } else {
        //             alert(data.errors.join(', ')); // Show validation or error messages
        //         }
        //     })
        //     .catch(error => {
        //         console.error('Error:', error);
        //     });
    </script>
</body>

</html>