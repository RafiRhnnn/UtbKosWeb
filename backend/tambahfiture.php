<?php
header("Access-Control-Allow-Origin: *");
header("Cache-Control: no-cache, no-store, max-age=0, must-revalidate");
header("X-Content-Type-Options: nosniff");

include 'koneksi.php';

// Mendapatkan data dari form
$namafiture = $_POST["namafiture"];
$descripsi = $_POST["descripsi"];

$namafile = $_FILES['img']['name'];
$tmp_name = $_FILES['img']['tmp_name'];

try {
    // Memindahkan file ke folder tujuan
    move_uploaded_file($tmp_name, 'archive/' . $namafile);

    // Query SQL
    $statement = $database_connection->prepare(
        "INSERT INTO `tambahfiture` (`namafiture`, `descripsi`, `img`) 
        VALUES (?, ?, ?)"
    );

    // Eksekusi query
    $statement->execute([$namafiture, $descripsi, 'archive/' . $namafile]);

    // Pesan sukses
    $pesan = "Data berhasil ditambah";
    echo $pesan;
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
} catch (Exception $e) {
    echo "General error: " . $e->getMessage();
}
