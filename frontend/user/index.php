<?php
include "header.php";  // Memasukkan header di atas konten
include "../check_session.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UtbKos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="icon" href="assets/images/logo.ico">
    <link rel="stylesheet" href="../assets/css/styleindexuser.css">
    <link rel="stylesheet" href="../assets/css/stlyefooter.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>

    <section id="kosan">
        <div class="container mt-5">
            <div class="row text-center mb-3">
                <div class="col">
                    <h2>Daftar Kosan</h2>
                </div>
            </div>
            <div class="row" id="kosList">
                <!-- Data Kosan Akan Muncul Disini -->
            </div>
        </div>
    </section>

    <?php include "footer.php"; ?>

    <script>
        $(document).ready(function () {
            // Menarik data kosan saat halaman dimuat
            axios.get('http://localhost/UtbKosWeb/backend/listkos.php')
                .then(function (response) {
                    let kosList = response.data;
                    let content = '';

                    kosList.forEach(kos => {
                        content += `
                            <div class="col-md-4 mb-4">
                                <div class="card shadow-sm">
                                    <img src="${kos.img}" class="card-img-top" style="height: 200px; object-fit: cover;">
                                    <div class="card-body">
                                        <h5 class="card-title">${kos.namakos}</h5>
                                        <p class="card-text">${kos.alamatkos}</p>
                                        <p class="text-muted">Harga: <strong>Rp${kos.hargasewa}</strong></p>
                                        <p class="text-muted">Fasilitas: ${kos.fasilitas}</p>
                                        <a href="detailkost.php?id=${kos.id}" class="btn btn-primary btn-sm">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>
                        `;
                    });

                    $('#kosList').html(content);
                })
                .catch(function (error) {
                    console.error(error);
                    $('#kosList').html('<p class="text-center">Gagal memuat data kos.</p>');
                });
        });
    </script>

</body>

</html>
