<?php
include "header.php";
include "../check_session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kost</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/styledetailkost.css">
</head>
<body>
    <div class="container main-content py-5" id="detailKost">
        <!-- Konten akan diisi oleh JavaScript -->
    </div>

    <?php include "footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
    const urlParams = new URLSearchParams(window.location.search);
    const kostId = urlParams.get('id');

    axios.get(`http://localhost/UtbKosWeb/backend/getkos.php?id=${kostId}`)
        .then(response => {
            const kost = response.data;
            let content = `
                <div class="row g-5">
                    <!-- Gallery -->
                    <div class="col-md-7">
                        <div class="main-image mb-3">
                            <img src="${kost.img}" class="img-fluid rounded" alt="Main Image">
                        </div>
                    </div>

                    <!-- Detail dan Form -->
                    <div class="col-md-5">
                        <h1 class="mb-4">${kost.namakos}</h1>
                        <div class="detail-section mb-5">
                            <h4 class="mb-3">Rp${kost.hargasewa}/bulan</h4>
                            <div class="features mb-4">
                                <h5>Fasilitas:</h5>
                                <p>${kost.fasilitas}</p>
                            </div>
                            <div class="type mb-4">
                                <h5>Tipe:</h5>
                                <p>${kost.tipe}</p>
                            </div>
                            <div class="address mb-4">
                                <h5>Alamat:</h5>
                                <p>${kost.alamatkos}</p>
                            </div>
                            <a href="https://wa.me/${kost.nomor_whatsapp}" 
                               class="btn btn-success btn-lg w-100 mb-3" 
                               target="_blank">
                                <i class="fab fa-whatsapp"></i> Hubungi via WhatsApp
                            </a>
                        </div>

                        <!-- Form Pemesanan -->
                        <div class="booking-form">
                            <h3 class="mb-4">Form Pemesanan</h3>
                            <form id="bookingForm">
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Nama Lengkap" required>
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="mb-3">
                                    <input type="tel" class="form-control" placeholder="Nomor WhatsApp" required>
                                </div>
                                <div class="mb-3">
                                    <input type="number" class="form-control" placeholder="Durasi Sewa (bulan)" min="1" required>
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control" rows="3" placeholder="Catatan Tambahan"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg w-100">Booking Sekarang</button>
                            </form>
                        </div>
                    </div>
                </div>
            `;
            document.getElementById('detailKost').innerHTML = content;
        })
        .catch(error => {
            console.error(error);
            document.getElementById('detailKost').innerHTML = `
                <div class="alert alert-danger">Gagal memuat detail kost</div>
            `;
        });
    </script>
</body>
</html>