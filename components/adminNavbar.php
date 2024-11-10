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
                <!-- <div class="dropdown-menu" id="dropdown-menu">
                    <a href="./pages/registrations.php"><i class="fa fa-user"></i>Profile</a>
                    <a><i class="fa fa-list"></i>Feedbacks</a>
                    <a><i class="fa fa-gear"></i>Settings</a>
                    <a href="./pages/logout.php"> <i class="fa fa-sign-out"></i>Logout</a>
                </div> -->
            </div>

        </div>

    </header>
</body>

</html>