<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include 'koneksi.php';

// Ambil JSON dari frontend
$input = json_decode(file_get_contents("php://input"), true);
$session_token = $input['session_token'] ?? '';

if (!$session_token) {
    echo json_encode(['status' => 'error', 'message' => 'Token sesi tidak ditemukan!']);
    exit();
}

try {
    $stmt = $database_connection->prepare("SELECT username, email FROM users WHERE session_token = ?");
    $stmt->execute([$session_token]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        echo json_encode(['status' => 'success', 'data' => $user]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'User tidak ditemukan!']);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Terjadi kesalahan: ' . $e->getMessage()]);
}
?>
