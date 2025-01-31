<?php
session_start();
include "header.php"; // Navigasi user
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Profil Saya</h2>

        <div class="mb-3">
            <label class="form-label"><b>Username:</b></label>
            <p id="username"></p>
        </div>
        <div class="mb-3">
            <label class="form-label"><b>Email:</b></label>
            <p id="email"></p>
        </div>
        <div class="mb-3">
            <label class="form-label"><b>Nama Depan:</b></label>
            <p id="nama_depan"></p>
        </div>
        <div class="mb-3">
            <label class="form-label"><b>nama Belakang:</b></label>
            <p id="nama_belakang"></p>
        </div>
        <div class="mb-3">
            <label class="form-label"><b>No Telephone:</b></label>
            <p id="notelp"></p>
        </div>

        <a href="edit_profile.php" class="btn btn-primary">Edit Profil</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
    const sessionToken = localStorage.getItem('session_token');
    if (!sessionToken) {
        alert("Anda belum login! Silakan login kembali.");
        window.location.href = "../../login.php";
    }

    function fetchProfile() {
        axios.post('../../backend/api_get_profile.php', {
                session_token: sessionToken
            })
            .then(response => {
                if (response.data.status === 'success') {
                    document.getElementById('username').textContent = response.data.data.username || "Belum diisi";
                    document.getElementById('email').textContent = response.data.data.email || "Belum diisi";
                    document.getElementById('nama_depan').textContent = response.data.data.nama_depan ||
                        "Belum diisi";
                    document.getElementById('nama_belakang').textContent = response.data.data.nama_belakang ||
                        "Belum diisi";
                    document.getElementById('notelp').textContent = response.data.data.notelp || "Belum diisi";

                    // Pastikan warna merah jika data tidak diisi
                    cekDanTambahkan("nama_depan");
                    cekDanTambahkan("nama_belakang");
                    cekDanTambahkan("notelp");
                } else {
                    alert(response.data.message);
                }
            })
            .catch(error => {
                console.error("Error:", error);
                alert('Terjadi kesalahan saat mengambil data profil!');
            });
    }

    // Fungsi untuk mengecek dan menambahkan teks "Belum diisi" jika NULL atau kosong
    function cekDanTambahkan(id) {
        let element = document.getElementById(id);
        if (!element || element.textContent.trim() === "Belum diisi") {
            element.textContent = "Belum diisi";
            element.style.color = "red"; // Beri warna merah agar lebih jelas
        }
    }


    fetchProfile();
    </script>
</body>

</html>