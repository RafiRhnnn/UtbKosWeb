<?php
header("Access-Control-Allow-Origin: *");
include 'koneksi.php';

$id = isset($_POST["idkos"]) ? $_POST["idkos"] : null;
$namakos = isset($_POST["namakos"]) ? $_POST["namakos"] : null;
$alamatkos = isset($_POST["alamatkos"]) ? $_POST["alamatkos"] : null;
$hargasewa = isset($_POST["hargasewa"]) ? $_POST["hargasewa"] : null;
$tipe = isset($_POST["tipe"]) ? $_POST["tipe"] : null;
$notelp = isset($_POST["notelp"]) ? $_POST["notelp"] : null;
$fasilitas = isset($_POST["fasilitas"]) ? $_POST["fasilitas"] : null;
$date = isset($_POST["date"]) ? $_POST["date"] : null;

if (!$id || !$namakos || !$alamatkos || !$hargasewa || !$tipe || !$notelp || !$fasilitas || !$date) {
    echo json_encode(["error" => "Data tidak lengkap"]);
    exit();
}

try {
    if (isset($_FILES['url_image']) && $_FILES['url_image']['error'] === UPLOAD_ERR_OK) {
        $namafile = $_FILES['url_image']['name'];
        $tmp_name = $_FILES['url_image']['tmp_name'];
        $upload_directory = 'archive/';
        move_uploaded_file($tmp_name, $upload_directory . $namafile);

        $statement = $database_connection->prepare("UPDATE `tambah_kost` SET `namakos`=?, `alamatkos`=?, `hargasewa`=?, `tipe`=?, `notelp`=?, `fasilitas`=?, `img`=?, `date`=? WHERE `id`=?");
        $statement->execute([$namakos, $alamatkos, $hargasewa, $tipe, $notelp, $fasilitas, $upload_directory . $namafile, $date, $id]);
    } else {
        $statement = $database_connection->prepare("UPDATE `tambah_kost` SET `namakos`=?, `alamatkos`=?, `hargasewa`=?, `tipe`=?, `notelp`=?, `fasilitas`=?, `date`=? WHERE `id`=?");
        $statement->execute([$namakos, $alamatkos, $hargasewa, $tipe, $notelp, $fasilitas, $date, $id]);
    }

    echo json_encode(["success" => "Data berhasil diubah"]);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}