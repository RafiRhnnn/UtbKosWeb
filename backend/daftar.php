<?php
include('koneksi.php');

// cek apakah data dikirim melalui metode POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // ngambil data dari form POST
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validasi wajib isi semua form
    if (empty($username) || empty($email) || empty($password)) {
        echo json_encode(['message' => 'Semua kolom harus diisi!']);
        exit;
    }

    // Hash password menggunakan password_hash() (algoritma default bcrypt)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Query untuk memasukkan data user ke tabel 'user'
    $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
    
    // Prepare statement
    $stmt = $database_connection->prepare($sql);
    
    // Bind parameter
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashed_password);

    // Eksekusi query
    if ($stmt->execute()) {
        echo json_encode(['message' => 'Registrasi berhasil!']);
    } else {
        echo json_encode(['message' => 'Terjadi kesalahan saat registrasi!']);
    }
}
?>
