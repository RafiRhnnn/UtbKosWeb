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
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
        <script src="assets/js/scriptsindex.js"></script>
    </head>

    <body>
        <!-- navbar start -->
        <nav class="navbar navbar-expand-lg navbar-light bg-warning sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Utbkos</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse">
                    <ul class=" navbar-nav mx-auto">
                        <!-- Menambahkan ms-auto di sini -->
                        <li class="nav-item ms-1    ">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link" href="#about">About</a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link" href="#promo">Promo</a>
                        </li>
                        <li class="nav-item mx-9">
                            <a class="nav-link" href="#">Feature</a>
                        </li>
                        <li class="nav-item mx-9">
                            <a class="nav-link" href="../frontend/login.php">Login</a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
        <!-- navbar end -->

        <!-- body mulai -->

        <section class="vh-100 bg-secondary">
            <main class="content d-flex justify-content-between align-items-center text-white ps-5 pt-5">
                <div class="d-flex flex-column align-items-start">
                    <h1>NGEKOS LEBIH MURAH & AMAN <span>UTBKOS</span>SOLUSINYA</h1>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis explicabo excepturi accusantium
                        exercitationem officia illum? Animi repellendus ipsa voluptates iste necessitatibus, tenetur
                        accusantium nesciunt corporis accusamus quasi eveniet consectetur excepturi obcaecati rerum
                        veniam
                        aliquid voluptatum molestias consequuntur ex officiis optio eos sapiente harum. Ipsam
                        repudiandae
                        quis voluptas debitis deleniti maiores sequi consequuntur tenetur quos, vero nobis commodi
                        suscipit
                        repellendus a et assumenda quae! Atque officia aut sed sunt tempore dolorum iste eum vel tempora
                        quo
                        omnis nihil nam cupiditate labore repudiandae eaque rerum non in perspiciatis vitae, harum
                        temporibus. Ex placeat quas, enim eligendi dicta ipsam ut pariatur voluptatum odio?
                    </p>
                    <a href="#" class="btn btn-warning btn-lg">KOST Sekarang</a>

                </div>

                <div class="d-flex justify-content-end col-md-9 col-lg-6 col-xl-5 text-end">
                    <img id="logoutbkos" src="assets/images/logoutbkos.png" class="img-fluid" alt="Sample image">
                </div>
            </main>
        </section>
        <!-- body akhir -->
        <!-- about section start -->
        <section id="about" class="bg-warning vh-100">
            <div class="container h-100 d-flex flex-column justify-content-center">

                <div class="row align-items-center h-100">
                    <h2 class="text-center mt-0"><span>Tentang</span> Kami</h2>
                    <!-- Kolom untuk teks (kiri) -->
                    <div class="col-md-6">
                        <h3>Kenapa memilih UtbKos?</h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Velit odio odit adipisci ex,
                            voluptatem maxime facere dolore, autem id repudiandae nesciunt fugiat voluptate tempore,
                            tempora
                            quidem impedit similique libero vel. Et itaque, beatae, maiores doloribus id architecto
                            repudiandae, reprehenderit veniam repellat rerum ex aut laborum labore eligendi
                            necessitatibus.
                            Cupiditate, pariatur.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam dolorum blanditiis
                            molestias?
                        </p>
                    </div>
                    <!-- Kolom untuk gambar (kanan) -->
                    <div class="col-md-6 text-end">
                        <div class="image-wrapper">
                            <img src="assets/images/kosan.jpg" alt="Tentang Kami" class="rounded-img" id="images">
                        </div>
                    </div>


                </div>
            </div>
        </section>
        <!-- about section end -->
        <!-- promomulai -->
        <section id="promo" class="container py-5">
            <h2 class="text-center mb-4">Promo</h2>
            <div id="promoCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                <div class="carousel-inner">
                    <div class="carousel-item active"
                        data-description="Dapatkan diskon spesial hingga 30% untuk kost pilihan di berbagai lokasi strategis.">
                        <img src="assets/images/banner/banner_0.jpg" class="d-block w-100 img-fluid rounded"
                            alt="Promo 1">
                    </div>
                    <div class="carousel-item"
                        data-description="Temukan kost dengan fasilitas lengkap mulai dari WiFi gratis hingga area parkir luas.">
                        <img src="assets/images/banner/banner_1.jpg" class="d-block w-100 img-fluid rounded"
                            alt="Promo 2">
                    </div>
                    <div class="carousel-item"
                        data-description="Nikmati cashback untuk pengguna baru saat memesan kost melalui UtbKos!">
                        <img src="assets/images/banner/banner_2.jpg" class="d-block w-100 img-fluid rounded"
                            alt="Promo 3">
                    </div>
                    <div class="carousel-item"
                        data-description="Promo eksklusif untuk kost campur, kost khusus perempuan, dan kost khusus laki-laki.">
                        <img src="assets/images/banner/banner_3.jpg" class="d-block w-100 img-fluid rounded"
                            alt="Promo 4">
                    </div>
                </div>
                <!-- Kontrol Carousel -->
                <button class="carousel-control-prev" type="button" data-bs-target="#promoCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#promoCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <!-- Deskripsi Dinamis -->
            <p id="promoDescription" class="text-center mt-4">
                Dapatkan diskon spesial hingga 30% untuk kost pilihan di berbagai lokasi strategis.
            </p>
        </section>
        <!-- promo akhir -->
        <!-- footer mulai -->
        <footer class="bg-dark text-white text-center py-3">
            <p>&copy; 2025 Utbkos. All rights reserved.</p>
        </footer>

        <!-- footer akhir -->
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    </html>