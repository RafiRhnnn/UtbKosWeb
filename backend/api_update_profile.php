<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include 'koneksi.php';

$input = json_decode(file_get_contents("php://input"), true);
$session_token = $input['session_token'] ?? '';
$username = $input['username'] ?? '';
$email = $input['email'] ?? '';

if (!$session_token || !$username || !$email) {
    echo json_encode(['status' => 'error', 'message' => 'Semua kolom harus diisi!']);
    exit();
}

try {
    $stmt = $database_connection->prepare("UPDATE users SET username = ?, email = ? WHERE session_token = ?");
    $stmt->execute([$username, $email, $session_token]);

    echo json_encode(['status' => 'success', 'message' => 'Profil berhasil diperbarui!']);
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Gagal memperbarui profil!']);
}
?>
