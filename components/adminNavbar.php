<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../../styles/admin/navbar.css">
    <link rel="stylesheet" href="../../styles.css">
    <script src="../../script.js"></script>
</head>

<body>
    <header class="admin-header">
        <div class="logo">
            <a href="index.html"><img src="../../assets/log2.jpg" alt="TL"></a>
        </div>
        <h3>Admin Dashboard</h3>
        <div class="links-container">

            <div class="notifications">

                <a class="notification-icon" href="#open-modal"><i class="fa fa-bell"></i></a>
                <span class="notification-dot"></span>

            </div>

            <div id="open-modal" class="modal-window">
                <div>
                    <a href="#" title="Close" class="modal-close"><i class="fa fa-close"></i></a>
                    <h1>Order</h1>
                    <hr />
                    <div>Jane Mahlangu, Puffer Jacket, 1356 Malboro Street</div>
                    <br />
                    <h1>Order</h1>
                    <hr />
                    <div>Jane Mahlangu, Puffer Jacket, 1356 Malboro Street</div>
                </div>
            </div>

            <div class="profile-dropdown">
                <div class="profile-container">
                    <img src="../../assets/profile.jpg" alt="Profile Image">
                </div>
                <div class="dropdown-menu" id="dropdown-menu">
                    <?php
                    // Check if the user is logged in
                    if (isset($_SESSION['email'])) {
                        $email = $_SESSION['email'];
                        $query = mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.email='$email'");
                        if ($row = mysqli_fetch_array($query)) {
                            // Display the first name
                            $name = $row['firstName'];
                            echo "<div class='profile mt-4'>";
                            echo "<h3>Welcome</h3>";
                            echo "<h3>$name</h3>";
                            echo "</div>";
                        }
                    } else {
                        // Display "Username" if not logged in
                        echo '<p style="margin-top: 12px;" class="username">Login</p>';
                    }
                    ?>
                </div>
            </div>

        </div>

    </header>
</body>

</html>