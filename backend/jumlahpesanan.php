<?php
// Sertakan file koneksi
include 'koneksi.php';

try {
    // Query untuk menghitung jumlah kosan
    $query = "SELECT COUNT(*) AS jumlah_pesanan FROM pesanan";
    $statement = $database_connection->prepare($query); // Gunakan $database_connection sesuai koneksi.php
    $statement->execute();

    // Ambil hasil query
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    $jumlah_pesanan = $result['jumlah_pesanan'];

    // Tampilkan hasil dalam format JSON
    echo json_encode([
        'status' => 'success',
        'message' => 'Jumlah pesanan berhasil dihitung',
        'jumlah_pesanan' => $jumlah_pesanan
    ]);
} catch (PDOException $e) {
    // Jika terjadi kesalahan
    echo json_encode([
        'status' => 'error',
        'message' => 'Gagal menghitung jumlah kosan',
        'error' => $e->getMessage()
    ]);
}
