<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/stlyelogin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="icon" href="assets/images/logo.ico">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>
    <section class="vh-100">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-6 col-lg-5">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <form id="loginForm" onsubmit="login(event)">
                                <!-- Email input -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" class="form-control" placeholder="Masukkan email"
                                        required>
                                </div>

                                <!-- Password input -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" id="password" class="form-control"
                                        placeholder="Masukkan password" required>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary w-100">Login</button>
                                <p class="text-center mt-3">Belum punya akun? <a href="register.php"
                                        class="text-danger">Register</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
</body>

</html>