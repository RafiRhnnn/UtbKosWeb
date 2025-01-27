<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/stlyelogin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="icon" href="assets/images/logo.ico">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img id="logoutbkos" src="assets/images/logoutbkos.png" class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                        <div class="card shadow-lg" style="width: 24rem; margin: auto;">
                            <div class="card-body" style="background-color: rgba(0, 0, 0, 0.3);">
                                <form id="loginForm">
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
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                    <p class="text-center mt-3">Belum mempunyai akun? <a href="register.php"
                                            class="text-danger">Register</a></p>
                                </form>
                            </div>
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
                <a href="#!" class="text-white me-4">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#!" class="text-white me-4">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#!" class="text-white me-4">
                    <i class="fab fa-google"></i>
                </a>
                <a href="#!" class="text-white">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
            <!-- Right -->
        </div>
    </section>

    <script>
    document.getElementById('loginForm').addEventListener('submit', function(e) {
        e.preventDefault(); // Menghentikan pengiriman form secara normal

        // Ambil nilai dari form
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        // Kirim data ke backend menggunakan axios
        axios.post('http://localhost/UtbKosWeb/backend/login.php', {
                username_or_email: email, // Menyertakan email atau username
                password: password // Menyertakan password
            })
            .then(response => {
                // Cek respons dari backend
                if (response.data.message) {
                    alert(response.data.message); // Tampilkan pesan dari backend
                }

                // Arahkan berdasarkan login yang sukses
                if (response.data.redirect) {
                    window.location.href = response.data.redirect;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan, silakan coba lagi.');
            });
    });
    </script>
</body>

</html>