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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
                    accusantium nesciunt corporis accusamus quasi eveniet consectetur excepturi obcaecati rerum veniam
                    aliquid voluptatum molestias consequuntur ex officiis optio eos sapiente harum. Ipsam repudiandae
                    quis voluptas debitis deleniti maiores sequi consequuntur tenetur quos, vero nobis commodi suscipit
                    repellendus a et assumenda quae! Atque officia aut sed sunt tempore dolorum iste eum vel tempora quo
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
                    <h3>Kenapa memilih kopi kami?</h3>
                    <p>
                        Berbeda dengan bekerja di rumah atau di kantor yang bisa membuat
                        kamu kehabisan asupan kafein saat bekerja, maka hal ini tak mungkin
                        terjadi jika kamu bekerja di coffee shop.
                    </p>
                    <p>
                        Sambil menyelesaikan pekerjaan kamu dengan mudah memesan kopi kepada
                        barista tanpa perlu repot-repot beranjak dan menyeduh kopi untuk
                        diri sendiri. Konsentrasi takkan terganggu karena untuk menikmati
                        kafein kamu tak perlu mengalihkan perhatian dari layar laptop.
                    </p>
                </div>
                <!-- Kolom untuk gambar (kanan) -->
                <div class="col-md-6 text-end">
                    <img src="assets/images/kosan.jpg" alt="Tentang Kami" class="rounded-img">
                </div>
            </div>
        </div>
    </section>
    <!-- about section end -->
    <!-- promomulai -->
    <section id="promo" class="container py-5">
        <h2 class="text-center mb-4">Promo</h2>
        <div class="row gx-3 gy-3 justify-content-center">
            <!-- Gambar Promo -->
            <div class="col-6 col-md-3">
                <img src="assets/images/banner/banner_0.jpg" alt="Promo 1" class="img-fluid rounded">
            </div>
            <div class="col-6 col-md-3">
                <img src="assets/images/banner/banner_1.jpg" alt="Promo 2" class="img-fluid rounded">
            </div>
            <div class="col-6 col-md-3">
                <img src="assets/images/banner/banner_2.jpg" alt="Promo 3" class="img-fluid rounded">
            </div>
            <div class="col-6 col-md-3">
                <img src="assets/images/banner/banner_3.jpg" alt="Promo 4" class="img-fluid rounded">
            </div>
        </div>
        <p class="text-center mt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet felis nec
            lorem aliquet tristique.</p>
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