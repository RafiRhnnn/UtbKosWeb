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
            axios.post('../../backend/api_get_profile.php', { session_token: sessionToken })
                .then(response => {
                    if (response.data.status === 'success') {
                        document.getElementById('username').textContent = response.data.data.username;
                        document.getElementById('email').textContent = response.data.data.email;
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
    </script>
</body>
</html>
