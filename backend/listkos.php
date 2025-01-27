<?php
header("Access-Control-Allow-Origin: *");
include "koneksi.php";

function getProtocol()
{
    $protocol = isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    return $protocol . "://" . $_SERVER['HTTP_HOST'];
}

$keyword = isset($_GET["key"]) ? $_GET["key"] : '';

$statement = $database_connection->prepare("SELECT * FROM `tambah_kost` WHERE `namakos` LIKE ?");
$statement->execute(["%$keyword%"]);

$data = array();
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    // Menyusun URL lengkap untuk gambar
    $row["img"] = getProtocol() . "/UtbKosWeb/backend/" . $row["img"];
    $data[] = $row;
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);