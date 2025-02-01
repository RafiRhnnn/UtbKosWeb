<?php

include "header.php"; // Navigasi user
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/styleprofile.css">
</head>

<body>
    <div class="container mt-5">
        <div class="card profile-card">
            <div class="card-header text-center">
                <i class="bi bi-person-circle"></i>
            </div>
            <div class="card-body">
                <div class="mb-3 d-flex align-items-center">
                    <label class="form-label">Username:</label>
                    <p id="username" class="card-text"></p>
                </div>
                <div class="mb-3 d-flex align-items-center">
                    <label class="form-label">Email:</label>
                    <p id="email" class="card-text"></p>
                </div>
                <div class="mb-3 d-flex align-items-center">
                    <label class="form-label">Nama Depan:</label>
                    <p id="nama_depan" class="card-text"></p>
                </div>
                <div class="mb-3 d-flex align-items-center">
                    <label class="form-label">Nama Belakang:</label>
                    <p id="nama_belakang" class="card-text"></p>
                </div>
                <div class="mb-3 d-flex align-items-center">
                    <label class="form-label">No Telephone:</label>
                    <p id="notelp" class="card-text"></p>
                </div>
                <div class="text-center">
                    <a href="edit_profile.php" class="btn btn-primary">Edit Profil</a>
                </div>
            </div>
        </div>
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
                        document.getElementById('nama_depan').textContent = response.data.data.nama_depan || "Belum diisi";
                        document.getElementById('nama_belakang').textContent = response.data.data.nama_belakang || "Belum diisi";
                        document.getElementById('notelp').textContent = response.data.data.notelp || "Belum diisi";

                        // Tambahkan class text-red jika data tidak diisi
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

        // Fungsi untuk mengecek dan menambahkan class text-red jika NULL atau kosong
        function cekDanTambahkan(id) {
            let element = document.getElementById(id);
            if (!element || element.textContent.trim() === "Belum diisi") {
                element.textContent = "Belum diisi";
                element.classList.add("text-red");
            }
        }

        fetchProfile();
    </script>
</body>


</html>