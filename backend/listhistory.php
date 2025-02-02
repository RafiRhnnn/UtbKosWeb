<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include 'koneksi.php';

// Ambil session_token dari header atau parameter
$session_token = $_GET['session_token'] ?? '';

if (!$session_token) {
    echo json_encode(['error' => 'Token sesi tidak ditemukan!']);
    exit();
}

try {
    // Ambil email dari tabel users berdasarkan session_token
    $stmt = $database_connection->prepare("SELECT email FROM users WHERE session_token = ?");
    $stmt->execute([$session_token]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $email = $user['email'];

        // Ambil data pesanan dari tabel pesanan berdasarkan email
        $stmt_pesanan = $database_connection->prepare("SELECT * FROM pesanan WHERE email = ?");
        $stmt_pesanan->execute([$email]);
        $pesanan = $stmt_pesanan->fetchAll(PDO::FETCH_ASSOC);

        if ($pesanan) {
            echo json_encode($pesanan); // Kembalikan data dalam bentuk array
        } else {
            echo json_encode([]); // Kembalikan array kosong jika tidak ada data
        }
    } else {
        echo json_encode(['error' => 'User tidak ditemukan!']);
    }
} catch (Exception $e) {
    echo json_encode(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
}