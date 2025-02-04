<?php
include "header.php"; // Navigasi user
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-center gap-5"> <!-- Menambahkan gap-4 untuk jarak antar card -->
            <!-- Card Edit Profil -->
            <div class="card shadow" style="width: 40%;">
                <div class="card-body">
                    <h4 class="card-title text-center">Edit Profil</h4>
                    <form id="updateProfileForm">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" id="username" name="username" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_depan" class="form-label">Nama Depan</label>
                            <input type="text" id="nama_depan" name="nama_depan" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_belakang" class="form-label">Nama Belakang</label>
                            <input type="text" id="nama_belakang" name="nama_belakang" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="notelp" class="form-label">No Telephone</label>
                            <input type="text" id="notelp" name="notelp" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Simpan Perubahan</button>
                    </form>
                </div>
            </div>

            <!-- Card Ubah Password -->
            <div class="card shadow" style="width: 40%;">
                <div class="card-body">
                    <h4 class="card-title text-center">Ubah Password</h4>
                    <form id="updatePasswordForm">
                        <div class="mb-3">
                            <label for="old_password" class="form-label">Password Lama</label>
                            <input type="password" id="old_password" name="old_password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="new_password" class="form-label">Password Baru</label>
                            <input type="password" id="new_password" name="new_password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-danger w-100">Ubah Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                        document.getElementById('username').value = response.data.data.username;
                        document.getElementById('email').value = response.data.data.email;
                        document.getElementById('nama_depan').value = response.data.data.nama_depan;
                        document.getElementById('nama_belakang').value = response.data.data.nama_belakang;
                        document.getElementById('notelp').value = response.data.data.notelp;
                    } else {
                        alert(response.data.message);
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    alert('Terjadi kesalahan saat mengambil data profil!');
                });
        }

        document.getElementById('updateProfileForm').addEventListener('submit', function(e) {
            e.preventDefault();
            let formData = {
                session_token: sessionToken,
                username: document.getElementById('username').value,
                email: document.getElementById('email').value,
                nama_depan: document.getElementById('nama_depan').value,
                nama_belakang: document.getElementById('nama_belakang').value,
                notelp: document.getElementById('notelp').value
            };

            axios.post('../../backend/api_update_profile.php', formData)
                .then(response => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Profil berhasil diubah!',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.href = "profile.php"; // Redirect setelah sukses
                    });
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Terjadi kesalahan!',
                    });
                });

        });

        document.getElementById('updatePasswordForm').addEventListener('submit', function(e) {
            e.preventDefault();

            let oldPassword = document.getElementById('old_password').value;
            let newPassword = document.getElementById('new_password').value;
            let confirmPassword = document.getElementById('confirm_password').value;

            if (newPassword !== confirmPassword) {
                alert("Konfirmasi password tidak cocok!");
                return;
            }

            let formData = {
                session_token: sessionToken,
                old_password: oldPassword,
                new_password: newPassword,
                confirm_password: confirmPassword
            };

            axios.post('../../backend/api_update_password.php', formData)
                .then(response => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Password berhasil diubah!',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        if (response.data.status === "success") {
                            window.location.href = "profile.php"; // Redirect setelah sukses
                        }
                    });
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Terjadi kesalahan!',
                    });
                });

        });

        fetchProfile();
    </script>
</body>

</html>