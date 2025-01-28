<?php
header("Access-Control-Allow-Origin: *");
include "koneksi.php";

$id = isset($_GET["id"]) ? $_GET["id"] : '';

$statement = $database_connection->prepare("SELECT * FROM `tambah_kost` WHERE id = ?");
$statement->execute([$id]);

$data = $statement->fetch(PDO::FETCH_ASSOC);

// Menyusun URL lengkap untuk gambar
function getProtocol() {
    $protocol = isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    return $protocol . "://" . $_SERVER['HTTP_HOST'];
}
$data["img"] = getProtocol() . "/UtbKosWeb/backend/" . $data["img"];

header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);