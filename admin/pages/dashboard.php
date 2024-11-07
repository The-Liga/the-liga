<?php
session_start();
if (!isset($_SESSION['email']) || $_SESSION['userType'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard</title>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="../../styles/admin/navbar.css">
<link rel="stylesheet" href="../../styles.css">
<link rel="stylesheet" href="../../styles/admin/dashboard.css">
<script src="../../script.js"></script>
</head>

<body>
    <?php include('../../components/adminNavbar.php'); ?>

    <main class="admin-main">
        <aside class="admin-sidenav">
            <?php include('../../components/adminSidenav.php'); ?>
        </aside>

        <section class="admin-content">
            <div class="admin-card">Card 1</div>
            <div class="admin-card">Card 2</div>
            <div class="admin-card">Card 3</div>
            <div class="admin-card">Card 4</div>
        </section>
    </main>
</body>

</html>