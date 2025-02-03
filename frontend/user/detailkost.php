<?php
include "header.php";
include "../check_session.php";
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kost</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/styledetailkost.css">
</head>

<body>
    <div class="container main-content py-5">
        <div class="row g-5" id="detailKost">
            <!-- Konten akan dimuat oleh JavaScript -->
        </div>
    </div>

    <?php include "footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const kostId = urlParams.get('id');

        axios.get(`http://localhost/UtbKosWeb/backend/getkos.php?id=${kostId}`)
            .then(response => {
                const kost = response.data;
                if (!kost) {
                    document.getElementById('detailKost').innerHTML =
                        `<div class="alert alert-danger">Kost tidak ditemukan</div>`;
                    return;
                }

                // Isi input hidden untuk booking
                document.getElementById('nama_kos').value = kost.namakos;
                document.getElementById('alamat_kos').value = kost.alamatkos;
                document.getElementById('harga_sewa').value = kost.hargasewa;

                let ceritaPendek = kost.detailkost.length > 150 ? kost.detailkost.substring(0, 150) + '...' : kost
                    .detailkost;

                let content = `
                    <div class="col-md-7">
                        <div class="image-gallery">
                            <img src="${kost.img}" class="img-fluid rounded shadow-sm" alt="Gambar Kost">
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="detail-section p-4">
                            <h1 class="mb-3">${kost.namakos}</h1>
                            <h4 class="price text-primary">Rp${kost.hargasewa}/bulan</h4>

                            <div class="features">
                                <h5><i class="fas fa-check-circle text-success"></i> Fasilitas:</h5>
                                <p>${kost.fasilitas}</p>
                            </div>

                            <div class="type">
                                <h5><i class="fas fa-home text-info"></i> Tipe:</h5>
                                <p>${kost.tipe}</p>
                            </div>

                            <div class="address">
                                <h5><i class="fas fa-map-marker-alt text-danger"></i> Alamat:</h5>
                                <p>${kost.alamatkos}</p>
                            </div>

                            <div class="owner-story">
                                <h5><i class="fas fa-book-open text-warning"></i> Ada Apa Aja Nih :</h5>
                                <p id="shortStory">${ceritaPendek}</p>
                                <button class="btn btn-link p-0" id="toggleStory">Lihat Selengkapnya</button>
                                <p id="fullStory" class="d-none">${kost.detailkost}</p>
                            </div>

                            <a href="https://api.whatsapp.com/send?phone=${kost.notelp}" 
                               class="btn btn-success btn-lg w-100 mb-3 shadow-sm" 
                               target="_blank">
                                <i class="fab fa-whatsapp"></i> Hubungi via WhatsApp
                            </a>
                            <button type="button" class="btn btn-primary btn-lg w-100 shadow-sm" data-bs-toggle="modal" data-bs-target="#bookingModal">
                                Booking Sekarang
                            </button>
                        </div>
                    </div>
                `;
                document.getElementById('detailKost').innerHTML = content;

                document.getElementById('toggleStory').addEventListener('click', function() {
                    document.getElementById('shortStory').classList.toggle('d-none');
                    document.getElementById('fullStory').classList.toggle('d-none');
                    this.innerText = document.getElementById('fullStory').classList.contains('d-none') ?
                        "Lihat Selengkapnya" : "Sembunyikan";
                });

            })
            .catch(error => {
                console.error(error);
                document.getElementById('detailKost').innerHTML =
                    `<div class="alert alert-danger">Gagal memuat detail kost</div>`;
            });
    </script>

    <!-- Modal Booking -->
    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookingModalLabel">Form Pemesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="bookingForm">
                        <input type="hidden" id="nama_kos" name="nama_kos">
                        <input type="hidden" id="alamat_kos" name="alamat_kos">
                        <input type="hidden" id="harga_sewa" name="harga_sewa">

                        <div class="mb-3">
                            <label for="nama_pemesan" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="no_telp" class="form-label">Nomor WhatsApp</label>
                            <input type="tel" class="form-control" id="no_telp" name="no_telp" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_survey" class="form-label">Tanggal Survey</label>
                            <input type="date" class="form-control" id="tanggal_survey" name="tanggal_survey" required>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_bulan" class="form-label">Durasi Sewa (bulan)</label>
                            <input type="number" class="form-control" id="jumlah_bulan" name="jumlah_bulan" min="1"
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Booking Sekarang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // mendapatankan profile automatis mulai
        document.addEventListener("DOMContentLoaded", function() {
            const sessionToken = localStorage.getItem('session_token');
            if (!sessionToken) {
                alert("Anda belum login! Silakan login kembali.");
                window.location.href = "../../login.php";
                return;
            }

            function fetchProfile() {
                axios.post('../../backend/api_get_profile.php', {
                        session_token: sessionToken
                    })
                    .then(response => {
                        if (response.data.status === 'success') {
                            const userData = response.data.data;
                            document.getElementById('nama_pemesan').value =
                                `${userData.nama_depan || ""} ${userData.nama_belakang || ""}`.trim();
                            document.getElementById('email').value = userData.email || "";
                            document.getElementById('no_telp').value = userData.notelp || "";
                        } else {
                            alert(response.data.message);
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        alert('Terjadi kesalahan saat mengambil data profil!');
                    });
            }

            fetchProfile();
        });

        // mendapatankan profile automatis akhir

        document.getElementById('bookingForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            axios.post('http://localhost/UtbKosWeb/backend/add_pesanan.php', formData)
                .then(response => {
                    if (response.data.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Pesanan Anda telah berhasil dikirim.',
                            confirmButtonText: 'Oke'
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi Kesalahan',
                            text: response.data.message,
                            confirmButtonText: 'Oke'
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Kesalahan Server',
                        text: 'Terjadi kesalahan saat mengirim pesanan.',
                        confirmButtonText: 'Oke'
                    });
                });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>