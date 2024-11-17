<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register & Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #f5f5f5;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .flip-container {
            perspective: 1000px;
            width: 400px;
            height: auto;
            margin: 20px;
        }

        .flipper {
            position: relative;
            transform-style: preserve-3d;
            transition: transform 0.8s;
        }

        .flip-container.flipped .flipper {
            transform: rotateY(180deg);
        }

        .container {
            background: whitesmoke;
            width: 450px;
            padding: 1.5rem;
            margin: 50px auto;
            border-radius: 10px;
            box-shadow: 0 20px 35px rgba(0,0,1,0.9);
            position: absolute;
            top: 0;
            left: 0;
            backface-visibility: hidden;
        }
   

        #signup {
            transform: rotateY(180deg);
        }

        form{
          margin:0 2rem;
        }

        .form-title {
          font-size:1.5rem;
          font-weight:bold;
          text-align:center;
          padding:1.3rem;
          margin-bottom:0.4rem;
        }

        .input-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .input-group i {
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            color: #757575;
            width: 20px;
            text-align: center;
            transition: color 0.3s ease;
        }

        input {
            width: 100%;
            padding: 10px 0 10px 30px;
            border: none;
            border-bottom: 1px solid #757575;
            outline: none;
            background: transparent;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        input::placeholder {
            color: transparent;
        }

        label {
            position: absolute;
            left: 30px;
            top: 10px;
            color: #757575;
            transition: all 0.3s ease;
            pointer-events: none;
            font-size: 1rem;
        }

        input:focus ~ label,
        input:not(:placeholder-shown) ~ label {
            top: -20px;
            left: 0;
            font-size: 0.9rem;
            color: #000;
        }

        .input-group:focus-within i {
            color: #000;
        }

        .input-group:focus-within input {
            border-bottom-color: #000;
        }

        .recover {
            text-align: right;
            margin: 1rem 0;
        }

        .recover a {
            color: #000;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .recover a:hover {
            color: #0000ff;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background: #000;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            margin: 1rem 0;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background: #008000;
            color: black;
        }

        .or {
            font-size: 1.1rem;
            margin-top: 0.5rem;
            text-align: center;
            color: #757575;
        }

        .icons {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin: 1.5rem 0;
        }

        .icons i {
            padding:0.8rem 1.5rem;
            margin:0 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;

        }

        .icons i:hover {
            background: #000;
            color: white;
        }

        .links {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .links button {
            border: none;
            color: #757575;
            font-weight: bold;
            cursor: pointer;
            padding: 5px 10px;
            background-color: transparent;
            font-size: 1rem;
            transition: color 0.3s ease;
        }

        .links button:hover {
            text-decoration: underline;
            color: #000;
        }

        #signIn {
            min-height: 500px;
        }

        #signup {
            min-height: 600px;
        }

        /* Add smooth transition for container heights */
        .container, .flipper {
            transition: height 0.3s ease-in-out;
        }
    </style>
</head>
<body>
    <div class="flip-container">
        <div class="flipper">
            <div class="container" id="signIn">
                <h1 class="form-title">Sign In</h1>
                <form method="post" action="register.php">
                    <div class="input-group">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" id="signInEmail" placeholder="Email" required>
                        <label for="signInEmail">Email</label>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" id="signInPassword" placeholder="Password" required>
                        <label for="signInPassword">Password</label>
                    </div>
                    <p class="recover">
                        <a href="#">Recover Password</a>
                    </p>
                    <input type="submit" class="btn" value="Sign In" name="signIn">
                </form>
                <p class="or">--------or--------</p>
                <div class="icons">
                    <i class="fab fa-google"></i>
                    <i class="fab fa-facebook"></i>
                </div>
                <div class="links">
                    <p>Don't have account yet?</p>
                    <button id="signUpButton">Sign Up</button>
                </div>
            </div>

            <div class="container" id="signup">
                <h1 class="form-title">Register</h1>
                <form method="post" action="register.php">
                    <div class="input-group">
                        <i class="fas fa-user"></i>
                        <input type="text" name="fName" id="fName" placeholder="First Name" required>
                        <label for="fName">First Name</label>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-user"></i>
                        <input type="text" name="lName" id="lName" placeholder="Last Name" required>
                        <label for="lName">Last Name</label>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" id="signUpEmail" placeholder="Email" required>
                        <label for="signUpEmail">Email</label>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" id="signUpPassword" placeholder="Password" required>
                        <label for="signUpPassword">Password</label>
                    </div>
                    <input type="submit" class="btn" value="Sign Up" name="signUp">
                </form>
                <p class="or">--------or--------</p>
                <div class="icons">
                    <i class="fab fa-google"></i>
                    <i class="fab fa-facebook"></i>
                </div>
                <div class="links">
                    <p>Already Have Account?</p>
                    <button id="signInButton">Sign In</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const signUpButton = document.getElementById('signUpButton');
            const signInButton = document.getElementById('signInButton');
            const flipContainer = document.querySelector('.flip-container');
            const inputGroups = document.querySelectorAll('.input-group');

            // Set initial heights
            function setContainerHeights() {
                const signIn = document.getElementById('signIn');
                const signUp = document.getElementById('signup');
                const flipper = document.querySelector('.flipper');
                const maxHeight = Math.max(signIn.offsetHeight, signUp.offsetHeight);
                flipper.style.height = maxHeight + 'px';
                flipContainer.style.height = maxHeight + 'px';
            }

            // Set heights on load and window resize
            window.addEventListener('load', setContainerHeights);
            window.addEventListener('resize', setContainerHeights);

            // Flip container functionality
            signUpButton.addEventListener('click', function() {
                flipContainer.classList.add('flipped');
            });

            signInButton.addEventListener('click', function() {
                flipContainer.classList.remove('flipped');
            });

            // Enhanced input field functionality
            inputGroups.forEach(group => {
                const input = group.querySelector('input');
                const icon = group.querySelector('i');
                const label = group.querySelector('label');

                // Handle focus events
                input.addEventListener('focus', () => {
                    icon.style.color = '#000';
                    group.classList.add('focused');
                });

                input.addEventListener('blur', () => {
                    if (!input.value) {
                        icon.style.color = '#757575';
                        group.classList.remove('focused');
                    }
                });

                // Handle input events
                input.addEventListener('input', () => {
                    if (input.value) {
                        icon.style.color = '#000';
                        group.classList.add('has-value');
                    } else {
                        icon.style.color = '#757575';
                        group.classList.remove('has-value');
                    }
                });
            });
        });
    </script>
</body>
</html>