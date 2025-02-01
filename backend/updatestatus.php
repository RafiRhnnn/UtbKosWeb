<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include 'koneksi.php';

// Ambil data dari request (POST)
$input = json_decode(file_get_contents("php://input"), true);
$id = $input['id'] ?? null;
$status = $input['status'] ?? null;

if (!$id || !$status) {
    echo json_encode(['error' => 'ID dan Status harus diisi!']);
    exit();
}

try {
    // Query untuk memperbarui status pesanan
    $stmt = $database_connection->prepare("UPDATE pesanan SET status = ? WHERE id = ?");
    $stmt->execute([$status, $id]);

    if ($stmt->rowCount() > 0) {
        echo json_encode(['success' => 'Status berhasil diperbarui!']);
    } else {
        echo json_encode(['error' => 'Pesanan tidak ditemukan!']);
    }
} catch (Exception $e) {
    echo json_encode(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
}
