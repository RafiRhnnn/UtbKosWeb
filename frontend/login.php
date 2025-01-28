<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/stlyelogin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="assets/images/logo.ico">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="assets/js/scriptslogin.js"></script>
</head>

<!-- navbar start -->
<nav class="navbar navbar-expand-lg navbar-light bg-warning sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img class="logoheader img-fluid me-1" src="assets/images/logo_header.png" alt="Sample image" style="max-height: 70px;">

        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mx-auto fs-5">
                <li class="nav-item ms-1">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link" href="index.php">About</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link" href="index.php">Promo</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link " href="index.php">Feature</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- navbar end -->

<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img id="logoutbkos" src="assets/images/logoutbkos.png" class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <div class="card shadow-lg" style="width: 24rem; margin: auto;">
                        <div class="card-body">
                            <form id="loginForm" onsubmit="login(event)">
                                <!-- Email input -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" class="form-control" placeholder="Masukkan email" required>
                                </div>

                                <!-- Password input -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" id="password" class="form-control" placeholder="Masukkan password" required>
                                </div>

                                <!-- Submit button -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>

                                <p class="text-center mt-3">Belum punya akun? <a href="register.php" class="text-danger">Register</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
            <!-- Copyright -->
            <div class="text-white mb-3 mb-md-0">
                Copyright © 2020. All rights reserved.
            </div>
            <!-- Copyright -->

            <!-- Right -->
            <div>
                <a href="#" class="text-white me-4">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="text-white me-4">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="text-white me-4">
                    <i class="fab fa-google"></i>
                </a>
                <a href="#" class="text-white">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
            <!-- Right -->
        </div>
    </section>

    <script>
        function login(event) {
            event.preventDefault(); // Mencegah form submit langsung

            // Mendapatkan nilai dari form
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            // Membuat objek FormData
            const formData = new FormData();
            formData.append('email', email);
            formData.append('password', password);

            // Konfigurasi Axios
            axios.post('http://localhost/UtbKosWeb/backend/login.php', formData)
                .then(response => {
                    console.log(response.data);
                    if (response.data.status === 'success') {
                        // Jika login berhasil
                        localStorage.setItem('session_token', response.data.session_token || '');
                        window.location.href = response.data.redirect;
                    } else {
                        alert(response.data.message || 'Login gagal!');
                    }
                })
                .catch(error => {
                    console.error('Error during login:', error);
                    alert('Terjadi kesalahan saat mencoba login.');
                });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>