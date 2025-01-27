<?php
header("Access-Control-Allow-Origin: *");
include 'koneksi.php';

$id = $_POST["idkos"];
$namakos = $_POST["namakos"];
$alamatkos = $_POST["alamatkos"];
$hargasewa = $_POST["hargasewa"];
$fasilitas = $_POST["fasilitas"];
$date = $_POST["date"];


// Periksa apakah file gambar dikirimkan
if (isset($_FILES['url_image']) && $_FILES['url_image']['error'] === UPLOAD_ERR_OK) {
    // File gambar dikirimkan, tangani unggahan
    $namafile = $_FILES['url_image']['name'];
    $tmp_name = $_FILES['url_image']['tmp_name'];
    $upload_directory = 'archive/';

    // Pindahkan file ke direktori yang ditentukan
    move_uploaded_file($tmp_name, $upload_directory . $namafile);

    // Update data dengan file gambar
    $statement = $database_connection->prepare("UPDATE `tambah_kost` SET `namakos`=?, `alamatkos`=?, hargasewa`=?, fasilitas`=?, `img`=?, `date`=? WHERE `id`=?");
    $statement->execute([$namakos, $alamatkos, $hargasewa, $fasilitas, $upload_directory . $namafile, $date, $id]);
} else {
    // File gambar tidak dikirimkan, tangani tanpa file gambar
    $statement = $database_connection->prepare("UPDATE `tambah_kost` SET `namakos`=?, `alamatkos`=?, `hargasewa`=?, `fasilitas`=?, `date`=? WHERE `id`=?");
    $statement->execute([$namakos, $alamatkos, $hargasewa, $fasilitas, $date, $id]);
}

$pesan = "Data berhasil diubah";
echo $pesan;