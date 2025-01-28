<?php
// Sertakan file koneksi
include 'koneksi.php';

try {
    // Query untuk menghitung jumlah kosan
    $query = "SELECT COUNT(*) AS jumlah_kos FROM tambah_kost";
    $statement = $database_connection->prepare($query); // Gunakan $database_connection sesuai koneksi.php
    $statement->execute();

    // Ambil hasil query
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    $jumlah_kos = $result['jumlah_kos'];

    // Tampilkan hasil dalam format JSON
    echo json_encode([
        'status' => 'success',
        'message' => 'Jumlah kosan berhasil dihitung',
        'jumlah_kos' => $jumlah_kos
    ]);
} catch (PDOException $e) {
    // Jika terjadi kesalahan
    echo json_encode([
        'status' => 'error',
        'message' => 'Gagal menghitung jumlah kosan',
        'error' => $e->getMessage()
    ]);
}
