<?php
header("Access-Cpntrol-Allow-Origin: *");
include "koneksi.php";

$id = isset($_POST["idkos"]) ? $_POST["idkos"] : null;

try {
    $statement = $database_connection->prepare("SELECT * FROM `tambah_kost` WHERE `id` = ?");
    $statement->execute([$id]);
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        echo json_encode($result);
    } else {
        echo json_encode(["error" => "Data not Found"]);
    }
} catch (PDOException $cek_koneksi) {
    die('error: ' . $cek_koneksi->getMessage());
}