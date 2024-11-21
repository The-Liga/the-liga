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
    <?php include('../../components/adminNavbar.php');
    include('../../config.php');

    ?>

    <main class="admin-main">

        <aside class="admin-sidenav">
            <?php include('../../components/adminSidenav.php'); ?>
        </aside>


        <div class="account-main">
            <div class="account-image">
                <div class="image-container">
                    <img src="../../assets/3d-sweatshirt-mockup-floating-in-air-back-view.jpg">
                </div>
                <button type="submit" class="btn bg-black text-white w-20 h-50" value="Upload" name="upload">Upload</button>
            </div>

            <div class="inputs-container">
                

                <div class="top-inputs">
                    <div class="inputs">
                        <label>Full Name:</label>
                        <input type="text" name="name" />
                    </div>

                    <div class="inputs">
                        <label>Surname:</label>
                        <input type="text" name="surname" />
                    </div>
                </div>

                
                <div class="top-inputs">
                    <div class="inputs">
                        <label>Full Name:</label>
                        <input type="text" name="name" />
                    </div>

                    <div class="inputs">
                        <label>Surname:</label>
                        <input type="text" name="surname" />
                    </div>
                </div>

                
                <div class="top-inputs">
                    <div class="inputs">
                        <label>Full Name:</label>
                        <input type="text" name="name" />
                    </div>

                    <div class="inputs">
                        <label>Surname:</label>
                        <input type="text" name="surname" />
                    </div>
                </div>
            </div>

        </div>

    </main>
</body>

</html>