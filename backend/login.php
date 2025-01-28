<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
include 'koneksi.php';

// Ambil data dari POST
$email = $_POST["email"] ?? null;
$password = $_POST["password"] ?? null;

if (!empty($email) && !empty($password)) {
    // Mengambil data pengguna dari database berdasarkan email
    $statement = $database_connection->prepare("SELECT id, email, password, username FROM users WHERE email = ?");
    $statement->execute([$email]);
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    // Verifikasi kata sandi
    if ($user && password_verify($password, $user['password'])) {
        // Periksa jika pengguna adalah admin
        if ($user['email'] === 'admin@gmail.com') {
            echo json_encode([
                'status' => 'success',
                'message' => 'Login berhasil sebagai admin!',
                'redirect' => 'admin/index.php'
            ]);
        } else {
            // Jika pengguna adalah user biasa, buat token sesi baru
            $session_token = bin2hex(random_bytes(16));

            // Perbarui token sesi di database
            $updateStatement = $database_connection->prepare("UPDATE users SET session_token = ? WHERE id = ?");
            $updateStatement->execute([$session_token, $user['id']]);

            // Mengembalikan respons JSON sukses dengan token sesi
            echo json_encode([
                'status' => 'success',
                'message' => 'Login berhasil!',
                'redirect' => 'user/index.php',
                'session_token' => $session_token
            ]);
        }
    } else {
        // Jika verifikasi gagal, kirim pesan kesalahan
        echo json_encode([
            'status' => 'error',
            'message' => 'Email atau password salah!'
        ]);
    }
} else {
    // Jika permintaan tidak valid, kirim pesan kesalahan
    echo json_encode([
        'status' => 'error',
        'message' => 'Email dan password harus diisi!'
    ]);
}