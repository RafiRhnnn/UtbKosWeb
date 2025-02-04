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
    <link rel="icon" href="../assets/images/logo.ico">
    <link rel="stylesheet" href="../assets/css/headeruser.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body>

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img class="logoheader img-fluid me-1" src="../assets/images/logo_header.png" alt="Sample image"
                    style="max-height: 70px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse">
                <!-- Menu Navbar (Tengah) -->
                <ul class="navbar-nav position-absolute start-50 translate-middle-x">
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="index.php">Produk</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="history.php">History</a>
                    </li>
                </ul>

                <!-- Wrapper untuk Search dan Username agar ke kanan -->
                <div class="d-flex align-items-center ms-auto">
                    <!-- Form Pencarian -->
                    <form class="d-flex me-3" id="searchForm" style="max-width: 600px;" action="search.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Cari berdasarkan nama atau daerah"
                            aria-label="Search" id="searchInput" name="search">
                        <button class="btn btn-outline-success" type="submit">Cari</button>
                    </form>

                    <!-- Dropdown untuk Username -->
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#"
                                id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
        </div>
    </nav>
    <!-- Navbar End -->



</body>

<script>
    function logout() {
        // Mendapatkan session_token dari tempat penyimpanan yang sesuai (misalnya, cookie)
        const sessionToken = localStorage.getItem('session_token'); // Gantilah dengan yang sesuai
        // Hapus 'nama' dari localStorage setelah logout
        localStorage.removeItem('nama');

        // Membuat objek FormData
        const formData = new FormData();
        formData.append('session_token', sessionToken);

        // Konfigurasi Axios untuk logout
        axios.post('http://localhost/UtbKosWeb/backend/logout.php', formData)
            .then(response => {
                // Handle respons dari server
                if (response.data.status === 'success') {
                    // Jika logout berhasil, arahkan kembali ke halaman login
                    localStorage.removeItem('session_token');
                    window.location.href = '../login.php';
                } else {
                    // Jika logout gagal, tampilkan pesan kesalahan
                    alert('Logout failed. Please try again.');
                }
            })
            .catch(error => {
                // Handle kesalahan koneksi atau server
                console.error('Error during logout:', error);
            });
    }
</script>

</html>