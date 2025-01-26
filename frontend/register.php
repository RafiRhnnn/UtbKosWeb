<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/stlyelogin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="icon" href="assets/images/logo.ico">
    <script src="assets/js/scriptsregis.js"></script>
</head>

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
                            <form>
                                <!-- Username input -->
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" id="username" class="form-control" placeholder="Enter your name">
                                </div>

                                <!-- Email input -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" id="email" class="form-control"
                                        placeholder="Enter a valid email address">
                                </div>

                                <!-- Password input -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" id="password" class="form-control"
                                        placeholder="Enter password">
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <!-- Checkbox -->
                                    <div class="form-check">
                                        <input type="checkbox" id="remember" class="form-check-input">
                                        <label for="remember" class="form-check-label">Remember me</label>
                                    </div>
                                    <a href="#" class="text-decoration-none">Forgot password?</a>
                                </div>

                                <!-- Submit button -->
                                <div class="d-grid">
                                    <button type="button" class="btn btn-primary">Login</button>
                                </div>

                                <p class="text-center mt-3">Sudah mempunyai akun? <a href="login.php"
                                        class="text-danger">Login</a></p>
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

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html>