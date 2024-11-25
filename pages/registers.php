<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/registers.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="container right-panel-active">
        <div id="toast-container" style="position: fixed; top: 100px; right: 10px; z-index: 9999;"></div>
        <!-- Sign Up -->
        <div class="container__form container--signup">
            <form class="form" id="form1" method="post" action="register.php">
                <h2 class="form__title">Sign Up</h2>
                <input type="text" placeholder="Username" name="username" id="username" class="input" />
                <input type="email" placeholder="Email" name="username" id="username" class="input" />
                <input type="password" placeholder="Password" name="password" id="password" class="input" />
                <input type="password" placeholder="Confirm Password" name="cPassword" id="cPassword" class="input" />
                <button class="btn" type="submit" name="signUp">Sign Up</button>
            </form>
        </div>

        <!-- Sign In -->
        <div class="container__form container--signin">
            <form class="form" id="form2" method="post" action="register.php">
                <h2 class="form__title">Sign In</h2>
                <input type="email" placeholder="Email" class="input" />
                <input type="password" placeholder="Password" class="input" />
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
                       --- Or --
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
        const fistForm = document.getElementById("form1");
        const secondForm = document.getElementById("form2");
        const container = document.querySelector(".container");

        signInBtn.addEventListener("click", () => {
            container.classList.remove("right-panel-active");
        });

        signUpBtn.addEventListener("click", () => {
            container.classList.add("right-panel-active");
        });

        fistForm.addEventListener("submit", (e) => e.preventDefault());
        secondForm.addEventListener("submit", (e) => e.preventDefault());
    </script>
    
</body>

</html>