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
    <link rel="stylesheet" href="../../styles/admin/account.css">
    <script src="../../script.js"></script>
</head>

<body>
    <?php
    // Fetch user data
    include('../../config.php');
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];

        // Retrieve the user ID from the database based on the email
        $query = "SELECT id FROM users WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $userId = $user['id'];
            $profileImage= $user['profileImage'];
        } else {
            // Handle case where user doesn't exist
            die("User not found.");
        }
    } else {
        // If the user is not logged in
        die("You need to log in.");
    }

    $query = "SELECT * FROM users WHERE id = $userId";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $userData = $result->fetch_assoc();
    } else {
        die("User not found.");
    }

    // Fetch current profile image path
    $query = "SELECT profileImage FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $profileImage = $row['profileImage'] ? $row['profileImage'] : "../../assets/uploads/";
    ?>

    <?php include('../../components/adminNavbar.php'); ?>
    <main class="admin-main">

        <aside class="admin-sidenav">
            <?php include('../../components/adminSidenav.php'); ?>
        </aside>

        <div class="account-main">

            <div class="account-image">
                <div class="image-container">
                    <img id="profileImage" src="<?php echo $profileImage; ?>" alt="Profile Image">
                </div>
                <input type="file" name="profileImage" id="userImage" accept="image/*" style="display: none"  onchange="previewImage(event)">
                <button type="button" class="btn bg-black text-white w-20 h-50" onclick="document.getElementById('userImage').click();">Upload</button>
            </div>

            <!-- Form to update profile -->
            <form method="POST" action="../../components/update.php" enctype="multipart/form-data">
                <div class="inputs-container">
                    <input type="hidden" name="id" value="<?php echo $userId; ?>" />
                    <input type="hidden" name="currentProfileImage" value="<?php echo $profileImage; ?>" />

                    <div class="top-inputs">
                        <div class="inputs">
                            <label>Full Name:</label>
                            <br>
                            <input type="text" name="firstName" value="<?php echo htmlspecialchars($userData['firstName']); ?>" placeholder="Name" />
                        </div>

                        <div class="inputs">
                            <label>Surname:</label>
                            <br>
                            <input type="text" name="lastName" value="<?php echo htmlspecialchars($userData['lastName']); ?>" placeholder="Surname" />
                        </div>
                    </div>

                    <div class="top-inputs">
                        <div class="inputs">
                            <label>Phone No:</label>
                            <br>
                            <input type="int" name="phoneNo" value="<?php echo htmlspecialchars($userData['phoneNo']); ?>" placeholder="0123456789" />
                        </div>

                        <div class="inputs">
                            <label>Username:</label>
                            <br>
                            <input type="text" name="username" value="<?php echo htmlspecialchars($userData['username']); ?>" placeholder="Username" />
                        </div>
                    </div>

                    <div class="top-inputs">
                        <div class="inputs">
                            <label>Password:</label>
                            <br>
                            <input type="password" name="password" placeholder="New password (optional)" />
                        </div>

                        <div class="inputs">
                            <label>Email:</label>
                            <br>
                            <input type="email" name="email" value="<?php echo htmlspecialchars($userData['email']); ?>" placeholder="example@gmail.com" required />
                        </div>
                    </div>

                    <input type="submit" class="btn bg-black text-white h-15 w-25" value="Update Profile" name="updateProfile" />
                </div>
            </form>
        </div>
    </main>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function () {
                const output = document.getElementById('profileImage');
                output.src = reader.result; // Set the uploaded image as the new src
            };
            reader.readAsDataURL(event.target.files[0]); // Read the selected file
        }
    </script>

</body>

</html>
