<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include "koneksi.php";

// Validasi parameter ID Kos
$id = isset($_POST["idkos"]) ? $_POST["idkos"] : null;

if ($id === null) {
    echo json_encode(["error" => "ID Kos tidak valid atau tidak disediakan."]);
    exit();
}

try {
    // Query untuk mengambil data kos berdasarkan ID
    $statement = $database_connection->prepare("SELECT * FROM `tambah_kost` WHERE `id` = ?");
    $statement->execute([$id]);
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    // Cek apakah data ditemukan
    if ($result) {
        echo json_encode($result);
    } else {
        echo json_encode(["error" => "Data tidak ditemukan untuk ID Kos: $id"]);
    }
} catch (PDOException $e) {
    // Menangani error koneksi atau query
    echo json_encode(["error" => "Terjadi kesalahan: " . $e->getMessage()]);
}