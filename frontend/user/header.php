<?php
session_start(); // Mulai session

// Cek apakah user sudah login
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    // Redirect ke halaman login jika user belum login
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="icon" href="../assets/images/logo.ico">
    <link rel="stylesheet" href="../assets/css/headeruser.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body>

    <!-- navbar start -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img class="logoheader img-fluid me-1" src="../assets/images/logo_header.png" alt="Sample image" style="max-height: 70px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="index.php">Produk</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="history.php">History</a>
                    </li>
                </ul>
                
                <!-- Form Pencarian -->
                <form class="d-flex ms-3" id="searchForm" style="max-width: 600px; margin: auto;" action="search.php" method="get">
                    <input class="form-control me-2" type="search" placeholder="Cari berdasarkan nama atau daerah" aria-label="Search" id="searchInput" name="search">
                    <button class="btn btn-outline-success" type="submit">Cari</button>
                </form>

                <!-- Dropdown untuk Username -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo htmlspecialchars($username); ?>
                            <i class="bi bi-person-fill ms-2 fs-2"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="#" onclick="logout()">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navbar end -->

</body>

</html>
