<?php
include('koneksi.php');

// Set response sebagai JSON
header('Content-Type: application/json');

// Ambil data JSON yang dikirimkan melalui POST
$data = json_decode(file_get_contents("php://input"), true);

// Cek apakah data ada
if (isset($data['username_or_email']) && isset($data['password'])) {
    $username_or_email = $data['username_or_email'];
    $password = $data['password'];

    // Validasi jika username/email atau password kosong
    if (empty($username_or_email)) {
        echo json_encode(['message' => 'Username atau Email belum diisi!']);
        exit;
    }

    if (empty($password)) {
        echo json_encode(['message' => 'Password belum diisi!']);
        exit;
    }

    // Query untuk mencari user berdasarkan username atau email
    $sql = "SELECT * FROM users WHERE username = :username_or_email OR email = :username_or_email LIMIT 1";
    $stmt = $database_connection->prepare($sql);
    $stmt->bindParam(':username_or_email', $username_or_email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Jika user ditemukan
    if ($user) {
        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Periksa jika email dan password cocok dengan admin
            if ($user['email'] === 'admin@gmail.com' && $password === 'adminutbkos') {
                echo json_encode(['message' => 'Login berhasil sebagai admin!', 'redirect' => 'admin/index.php']);
            } else {
                // Login berhasil sebagai user biasa
                echo json_encode(['message' => 'Login berhasil!', 'redirect' => 'user/index.php']);
            }
        } else {
            // Password salah
            echo json_encode(['message' => 'Password salah!']);
        }
    } else {
        // User tidak ditemukan
        echo json_encode(['message' => 'User atau Email tidak ditemukan!']);
    }
} else {
    echo json_encode(['message' => 'Metode tidak diizinkan!']);
}