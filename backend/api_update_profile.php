<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include 'koneksi.php';

$input = json_decode(file_get_contents("php://input"), true);
$session_token = $input['session_token'] ?? '';
$username = $input['username'] ?? '';
$email = $input['email'] ?? '';
$nama_depan = $input['nama_depan'] ?? '';
$nama_belakang = $input['nama_belakang'] ?? '';
$notelp = $input['notelp'] ?? '';

if (!$session_token || !$username || !$email || !$nama_depan || !$nama_belakang || !$notelp) {
    echo json_encode(['status' => 'error', 'message' => 'Semua kolom harus diisi!']);
    exit();
}

try {
    $stmt = $database_connection->prepare("UPDATE users SET username = ?, email = ?, nama_depan = ?, nama_belakang = ?, notelp = ? WHERE session_token = ?");
    $stmt->execute([$username, $email, $nama_depan, $nama_belakang, $notelp, $session_token]);

    if ($stmt->rowCount() > 0) {
        echo json_encode(['status' => 'success', 'message' => 'Profil berhasil diperbarui!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Tidak ada perubahan yang dilakukan atau session token tidak valid!']);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Gagal memperbarui profil!', 'error' => $e->getMessage()]);
}