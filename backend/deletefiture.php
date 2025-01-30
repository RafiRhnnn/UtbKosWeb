<?php
header("Access-Control-Allow-Origin: *");
include 'koneksi.php';

$id = $_POST["id"];

try {
    $statement = $database_connection->prepare("DELETE FROM `tambahfiture` WHERE `id` = ?");
    $statement->execute([$id]);
    echo json_encode(["success" => "Data Berhasil dihapus"]);
} catch (PDOException $cek_koneksi) {
    echo json_encode(["error" => $cek_koneksi->getMessage()]);
}
