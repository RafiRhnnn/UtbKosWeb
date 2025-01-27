<?php
header("Access-Control-Allow-Origin: *");
include 'koneksi.php';

$id = $_POST["idkos"];

try {
    $statement = $database_connection->prepare("DELETE FROM `tambah_kost` WHERE `tambah_kost`.`id` =?");
    $statement->execute([$id]);
    $pesan = "Data Berhasil dihapus";
    echo $pesan;
} catch (PDOException $cek_koneksi) {
    die($cek_koneksi->getMessage());
}