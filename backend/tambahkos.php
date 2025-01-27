<?php
header("Access-Control-Allow-Origin: *");
header("Cache-Control: no-cache, no-store, max-age=0, must-revalidate");
header("X-Content-Type-Options: nosniff");

include 'koneksi.php';

$namakos = $_POST["namakos"];
$alamatkos = $_POST["alamatkos"];
$hargasewa = $_POST["hargasewa"];
$fasilitas = $_POST["fasilitas"];
$date = $_POST["date"];

$namafile = $_FILES['url_image']['name'];
$tmp_name = $_FILES['url_image']['tmp_name'];

try {
    // Memindahkan file ke folder tujuan
    move_uploaded_file($tmp_name, 'archive/' . $namafile);

    // Query SQL
    $statement = $database_connection->prepare(
        "INSERT INTO `tambah_kost` (`namakos`, `alamatkos`, `hargasewa`, `fasilitas`, `img`, `date`) 
        VALUES (?, ?, ?, ?, ?, ?)"
    );

    // Eksekusi query
    $statement->execute([$namakos, $alamatkos, $hargasewa, $fasilitas, 'archive/' . $namafile, $date]);

    // Pesan sukses
    $pesan = "Data berhasil ditambah";
    echo $pesan;
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
} catch (Exception $e) {
    echo "General error: " . $e->getMessage();
}