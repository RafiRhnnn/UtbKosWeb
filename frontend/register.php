<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="icon" href="assets/images/logo.ico">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="assets/js/scriptsregis.js"></script>
</head>

<!-- navbar start -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img class="logoheader img-fluid me-1" src="assets/images/logo_header.png" alt="Sample image"
                style="max-height: 70px;">

        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
    <section class="gradasi vh-100">
        <div class="overlay"></div>
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img id="logoutbkos" src="assets/images/logobaru.png" class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <div class="card shadow-lg" style="width: 24rem; margin: auto;">
                        <div class="card-body">
                            <form id="registerForm">
                                <!-- Username input -->
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" id="username" class="form-control" placeholder="Enter your name"
                                        required>
                                </div>

                                <!-- Email input -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" id="email" class="form-control"
                                        placeholder="Enter a valid email address" required>
                                </div>

                                <!-- Password input -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" id="password" class="form-control"
                                        placeholder="Enter password" required>
                                </div>

                                <!-- Submit button -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </div>

                                <p class="text-center mt-3">Sudah mempunyai akun? <a href="login.php"
                                        class="text-danger">Login</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="bg-dark text-white text-center py-3">
            <p>&copy; 2025 Utbkos. Kelompok 1. Kelas TIF 22 CID. UAS WEB 1</p>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-between flex-wrap">
                            <p class="mx-2">1. Nama 1 - NIM 123456789</p>
                            <p class="mx-2">2. Nama 2 - NIM 987654321</p>
                            <p class="mx-2">3. Nama 3 - NIM 112233445</p>
                            <p class="mx-2">4. Nama 4 - NIM 556677889</p>
                            <p class="mx-2">5. Nama 5 - NIM 998877665</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </section>

    <script>
    document.getElementById('registerForm').addEventListener('submit', function(e) {
        e.preventDefault(); // Mencegah reload halaman

        // Ambil nilai dari input form
        const username = document.getElementById('username').value;
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        // Kirim data menggunakan axios
        axios.post('http://localhost/UtbKosWeb/backend/daftar.php', {
                username: username,
                email: email,
                password: password
            })
            .then(response => {
                console.log(response.data); // Log respons dari server
                alert(response.data.message);
                if (response.data.message === 'Registrasi berhasil!') {
                    window.location.href = 'login.php'; // Redirect ke login
                }
            })
            .catch(error => {
                console.error('Error:', error); // Log kesalahan di konsol
                alert('Terjadi kesalahan. Silakan coba lagi.');
            });
    });
    </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html>