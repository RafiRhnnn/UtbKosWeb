<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include 'koneksi.php';

$input = json_decode(file_get_contents("php://input"), true);
$session_token = $input['session_token'] ?? '';
$old_password = $input['old_password'] ?? '';
$new_password = $input['new_password'] ?? '';
$confirm_password = $input['confirm_password'] ?? '';

if (!$session_token || !$old_password || !$new_password || !$confirm_password) {
    echo json_encode(['status' => 'error', 'message' => 'Semua kolom harus diisi!']);
    exit();
}

$stmt = $database_connection->prepare("SELECT password FROM users WHERE session_token = ?");
$stmt->execute([$session_token]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user || !password_verify($old_password, $user['password'])) {
    echo json_encode(['status' => 'error', 'message' => 'Password lama salah!']);
    exit();
}

if ($new_password !== $confirm_password) {
    echo json_encode(['status' => 'error', 'message' => 'Konfirmasi password tidak cocok!']);
    exit();
}

$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
$stmt = $database_connection->prepare("UPDATE users SET password = ? WHERE session_token = ?");
if ($stmt->execute([$hashed_password, $session_token])) {
    echo json_encode(['status' => 'success', 'message' => 'Password berhasil diperbarui!']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Gagal mengubah password!']);
}
?>
