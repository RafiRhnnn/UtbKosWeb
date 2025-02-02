<?php
// Koneksi ke database
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header('Content-Type: application/json; charset=utf-8');

include 'koneksi.php';  // Pastikan file koneksi ke database sudah benar

// Mendapatkan kata kunci pencarian dari query string
$search = isset($_GET['search']) ? $_GET['search'] : '';

try {
    // Query pencarian di database untuk nama kos atau alamat kos
    $query = "SELECT * FROM tambah_kost WHERE namakos LIKE :search OR alamatkos LIKE :search";
    $stmt = $database_connection->prepare($query);
    $stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
    $stmt->execute();

    // Ambil hasil pencarian
    $kosList = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Menyusun URL lengkap untuk gambar jika ada
    if ($kosList) {
        foreach ($kosList as &$row) {
            if (!empty($row["img"])) {
                $row["img"] = getProtocol() . $_SERVER['HTTP_HOST'] . "/UtbKosWeb/backend/" . $row["img"];
            } else {
                $row["img"] = getProtocol() . $_SERVER['HTTP_HOST'] . "/UtbKosWeb/backend/assets/images/default.jpg";
            }
        }
        echo json_encode(['status' => 'success', 'data' => $kosList]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Kost tidak ditemukan']);
    }
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Kesalahan database: ' . $e->getMessage()]);
}

// Fungsi untuk mendapatkan protokol (http atau https)
function getProtocol()
{
    return (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https://" : "http://";
}