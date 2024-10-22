<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="../styles/signup.css">
</head>
<body>
    <div class="main-container">
        <div class="signin-form-container">

            <h1 class="signin-h1">SignIn</h1>

            <form action="process_signup.php" method="post">

                <div class="input-container">
                    <label for="username">Username</label>
                    <br/>
                    <input type="text" id="username" name="username" required>
                </div>


                <div class="input-container">
                    <label for="username">Password</label>
                    <br/>
                    <input type="password" id="password" name="password" required>
                </div>

             
              
        
              <button class="signup-btn" type="submit">Sign Up</button>
            </form>

        </div>
    </div>
</body>
</html>