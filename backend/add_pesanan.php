<?php
header('Content-Type: application/json');
include 'koneksi.php';

try {
    // Ambil data dari request POST
    $nama_pemesan = $_POST['nama_pemesan'] ?? '';
    $nama_kos = $_POST['nama_kos'] ?? '';
    $alamat_kos = $_POST['alamat_kos'] ?? '';
    $tanggal_survey = $_POST['tanggal_survey'] ?? '';
    $jumlah_bulan = $_POST['jumlah_bulan'] ?? '';
    $email = $_POST['email'] ?? '';
    $no_telp = $_POST['no_telp'] ?? '';
    $harga_sewa = $_POST['harga_sewa'] ?? '';

    // Validasi data
    if (empty($nama_pemesan) || empty($nama_kos) || empty($alamat_kos) || empty($tanggal_survey) || empty($jumlah_bulan) || empty($email) || empty($no_telp) || empty($harga_sewa)) {
        echo json_encode(['status' => 'error', 'message' => 'Semua field harus diisi!']);
        exit;
    }

    // Query untuk menyimpan data ke database
    $query = "INSERT INTO pesanan (nama_pemesan, nama_kos, alamat_kos, tanggal_survey, jumlah_bulan, email, no_telp, harga_sewa) 
              VALUES (:nama_pemesan, :nama_kos, :alamat_kos, :tanggal_survey, :jumlah_bulan, :email, :no_telp, :harga_sewa)";

    $stmt = $database_connection->prepare($query);
    $stmt->bindParam(':nama_pemesan', $nama_pemesan);
    $stmt->bindParam(':nama_kos', $nama_kos);
    $stmt->bindParam(':alamat_kos', $alamat_kos);
    $stmt->bindParam(':tanggal_survey', $tanggal_survey);
    $stmt->bindParam(':jumlah_bulan', $jumlah_bulan, PDO::PARAM_INT);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':no_telp', $no_telp);
    $stmt->bindParam(':harga_sewa', $harga_sewa, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Pesanan berhasil disimpan!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal menyimpan pesanan']);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Error: ' . $e->getMessage()]);
}
