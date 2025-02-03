<div class="d-flex flex-column flex-shrink-0 p-3 bg-dark text-white"
    style="width: 280px; height: 100vh; position: fixed; top: 0; left: 0;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4">Dashboard</span>

    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <?php
        // Ambil nama file dari URL saat ini
        $current_page = basename($_SERVER['PHP_SELF']);
        ?>
        <li class="nav-item">
            <a href="dashboard.php"
                class="nav-link text-white <?php echo $current_page == 'dashboard.php' ? 'active' : ''; ?>"
                aria-current="page">
                Dashboard
            </a>
        </li>
        <li>
            <a href="kelola.php"
                class="nav-link text-white <?php echo $current_page == 'kelola.php' ? 'active' : ''; ?>">
                Kelola kost
            </a>
        </li>
        <li>
            <a href="tambah.php"
                class="nav-link text-white <?php echo $current_page == 'tambah.php' ? 'active' : ''; ?>">
                Tambah kost
            </a>
        </li>
        <li>
            <a href="pesanan.php"
                class="nav-link text-white <?php echo $current_page == 'pesanan.php' ? 'active' : ''; ?>">
                Pesanan
            </a>
        </li>

        <li>
            <a href="tambahfiture.php"
                class="nav-link text-white <?php echo $current_page == 'tambahfiture.php' ? 'active' : ''; ?>">
                Tambah Fiture
            </a>
        </li>
        <li>
            <a href="kelolafitur.php"
                class="nav-link text-white <?php echo $current_page == 'kelolafitur.php' ? 'active' : ''; ?>">
                Kelola Fiture
            </a>
        </li>
        <li>
            <a href="../login.php" class="nav-link text-white">
                logout
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none aria-expanded=" false">
            <strong>
                <p>&copy; 2025 Utbkos. Kelompok 1</p>
            </strong>

        </a>
    </div>
</div>