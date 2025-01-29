<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utbkos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="icon" href="assets/images/logo.ico">
    <link rel="stylesheet" href="assets/css/styleindex.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img class="logoheader img-fluid me-1" src="assets/images/logo_header.png" alt="Sample image" style="max-height: 70px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item ms-1">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="#promo">Promo</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="#feature">Feature</a>
                    </li>
                </ul>
                <a class="btn btn-outline-dark btn-lg rounded-pill ms-lg-3 px-4 py-2" href="../frontend/login.php">Login</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Hero Section Start -->
    <section class="gradasi vh-100">
        <div class="overlay"></div>
        <main class="content d-flex justify-content-between align-items-center text-white ps-5 pt-5">
            <div class="d-flex flex-column align-items-start">
                <h1>NGEKOS LEBIH MURAH & AMAN <span>UTBKOS</span>SOLUSINYA</h1>
                <p>Temukan kenyamanan anda di UTBKos dengan fasilitas kumplit</p>
                <a href="login.php" class="btn btn-warning btn-lg">KOST Sekarang</a>
            </div>
            <div class="d-flex justify-content-end col-md-9 col-lg-6 col-xl-5 text-end" data-aos="flip-right" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                <img id="logoutbkos" src="assets/images/logobaru.png" class="img-fluid" alt="Sample image">
            </div>
        </main>
    </section>
    <!-- Hero Section End -->

    <!-- About Section Start -->
    <section id="about" class="bg-warning vh-100">
        <div class="container h-100 d-flex flex-column justify-content-center">

            <div class="row align-items-center h-100">
                <h2 class="text-center mt-0"><span>Tentang</span> Kami</h2>
                <!-- Kolom untuk teks (kiri) -->
                <div class="col-md-6">
                    <h3 data-aos="fade-right"
                        data-aos-offset="50"
                        data-aos-easing="ease-in-sine"
                        data-aos-duration="1000">Kenapa memilih UtbKos?</h3>
                    <p data-aos="fade-up"
                        data-aos-duration="2000">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Velit odio odit adipisci ex,
                        voluptatem maxime facere dolore, autem id repudiandae nesciunt fugiat voluptate tempore,
                        tempora
                        quidem impedit similique libero vel. Et itaque, beatae, maiores doloribus id architecto
                        repudiandae, reprehenderit veniam repellat rerum ex aut laborum labore eligendi
                        necessitatibus.
                        Cupiditate, pariatur.
                    </p>
                    <p data-aos="fade-up" data-aos-duration="2000">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam dolorum blanditiis
                        molestias?
                    </p>
                </div>
                <!-- Kolom untuk gambar (kanan) -->
                <div class="col-md-6 text-end" data-aos="fade-left" data-aos-duration="2000">
                    <div class=" image-wrapper">
                        <img src="assets/images/kosan.jpg" alt="Tentang Kami" class="rounded-img" id="images">
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Promo Section Start -->
    <section id="promo" class="container py-5">
        <h2 class="text-center mb-4">Promo</h2>
        <div id="promoCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">
                <div class="carousel-item active" data-description="Dapatkan diskon spesial hingga 30% untuk kost pilihan di berbagai lokasi strategis.">
                    <img src="assets/images/banner/banner_0.jpg" class="d-block w-100 img-fluid rounded" alt="Promo 1">
                </div>
                <div class="carousel-item" data-description="Temukan kost dengan fasilitas lengkap mulai dari WiFi gratis hingga area parkir luas.">
                    <img src="assets/images/banner/banner_1.jpg" class="d-block w-100 img-fluid rounded" alt="Promo 2">
                </div>
                <div class="carousel-item" data-description="Nikmati cashback untuk pengguna baru saat memesan kost melalui UtbKos!">
                    <img src="assets/images/banner/banner_2.jpg" class="d-block w-100 img-fluid rounded" alt="Promo 3">
                </div>
                <div class="carousel-item" data-description="Promo eksklusif untuk kost campur, kost khusus perempuan, dan kost khusus laki-laki.">
                    <img src="assets/images/banner/banner_3.jpg" class="d-block w-100 img-fluid rounded" alt="Promo 4">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#promoCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#promoCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <p id="promoDescription" class="text-center mt-4">Dapatkan diskon spesial hingga 30% untuk kost pilihan di berbagai lokasi strategis.</p>
    </section>
    <!-- Promo Section End -->

    <!-- Feature Section Start -->
    <?php
    include '../backend/koneksi.php';

    $query = "SELECT * FROM tambahfiture";
    $result = $database_connection->query($query);

    if (!$result) {
        echo "<div class='container text-center mt-5'><p>Gagal memuat fitur dari database.</p></div>";
    }
    ?>

    <section id="feature">
        <div class="container">
            <div class="row text-center mb-3">
                <div class="col">
                    <h2>Feature</h2>
                </div>
            </div>
            <div class="row" id="fiturelist">
                <!-- Data Kosan Akan Muncul Disini -->
            </div>
        </div>
    </section>
    <!-- Feature Section End -->

    <!-- Footer Start -->
    <footer class="bg-dark text-white text-center py-2">
        <p>&copy; 2025 Utbkos. All rights reserved.</p>
    </footer>
    <!-- Footer End -->

    <script>
        window.onload = function() {
            AOS.init();
        };

        $(document).ready(function() {
            axios.get('http://localhost/UtbKosWeb/backend/listfiture.php')
                .then(function(response) {
                    console.log(response); // Debugging output
                    let fiturelist = response.data;
                    let content = '';

                    if (fiturelist && fiturelist.length) {
                        fiturelist.forEach(list => {
                            content += `
                            <div class="col-md-4 mb-4">
                                <div class="card shadow-sm">
                                    <img src="${list.img}" class="card-img-top" style="height: 200px; object-fit: cover;">
                                    <div class="card-body">
                                        <h5 class="card-title">${list.namafiture}</h5>
                                        <p class="card-text">${list.descripsi}</p>
                                    </div>
                                </div>
                            </div>
                        `;
                        });
                    } else {
                        content = '<p class="text-center">Belum ada fitur yang tersedia.</p>';
                    }

                    $('#fiturelist').html(content);
                })
                .catch(function(error) {
                    console.error(error);
                    $('#fiturelist').html('<p class="text-center">Gagal memuat data kos.</p>');
                });
        });
    </script>

</body>

</html>