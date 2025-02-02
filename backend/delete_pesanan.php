<?php
header('Content-Type: application/json');
include 'koneksi.php';

// Mengambil session_token dan id pesanan
$session_token = $_POST['session_token'] ?? '';
$pesanan_id = $_POST['pesanan_id'] ?? '';

if (empty($session_token) || empty($pesanan_id)) {
    echo json_encode(['status' => 'error', 'message' => 'Session token dan ID pesanan harus diberikan']);
    exit;
}

try {
    // Verifikasi session_token
    $statement = $database_connection->prepare("SELECT email FROM users WHERE session_token = :session_token");
    $statement->bindParam(':session_token', $session_token, PDO::PARAM_STR);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Menghapus pesanan
        $deleteStatement = $database_connection->prepare("DELETE FROM pesanan WHERE id = :pesanan_id");
        $deleteStatement->bindParam(':pesanan_id', $pesanan_id, PDO::PARAM_INT);

        if ($deleteStatement->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Pesanan berhasil dihapus']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal menghapus pesanan']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid session']);
    }

} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
}
?>
