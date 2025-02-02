<?php
// Koneksi database
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
include 'koneksi.php';  // Pastikan koneksi ke database sudah benar

// Mendapatkan kata kunci pencarian dari query string
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Query pencarian di database untuk nama kost atau alamat kost
$query = "SELECT * FROM tambah_kost WHERE namakos LIKE :search OR alamatkos LIKE :search";
$stmt = $database_connection->prepare($query);
$stmt->bindValue(':search', '%' . $search . '%');
$stmt->execute();

// Ambil hasil pencarian
$kosList = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Jika ada hasil, kirimkan dalam format JSON
if ($kosList) {
    echo json_encode(['status' => 'success', 'data' => $kosList]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Kost tidak ditemukan']);
}
?>
