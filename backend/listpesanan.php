<?php
header("Access-Control-Allow-Origin: *");
include "koneksi.php";

function getProtocol()
{
    $protocol = isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    return $protocol . "://" . $_SERVER['HTTP_HOST'];
}

$keyword = isset($_GET["key"]) ? $_GET["key"] : '';

// Persiapkan query dan eksekusi
$statement = $database_connection->prepare("SELECT * FROM `pesanan` WHERE `nama_pemesan` LIKE ?");
$statement->execute(["%$keyword%"]);

// Ambil data dari hasil query
$data = $statement->fetchAll(PDO::FETCH_ASSOC);

// Set header untuk JSON
header('Content-Type: application/json; charset=utf-8');

// Kirim data dalam format JSON
echo json_encode($data);