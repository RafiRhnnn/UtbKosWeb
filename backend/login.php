<?php
include('koneksi.php');

// Cek apakah data dikirim melalui metode POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Ambil data dari form POST
    $username_or_email = $_POST['username_or_email'];
    $password = $_POST['password'];

    // Validasi jika username/email atau password kosong
    if (empty($username_or_email)) {
        echo json_encode(['message' => 'Username atau Email belum diisi!']);
        exit;
    }

    if (empty($password)) {
        echo json_encode(['message' => 'Password belum diisi!']);
        exit;
    }

    // Query untuk mencari user berdasarkan username atau email
    $sql = "SELECT * FROM users WHERE username = :username_or_email OR email = :username_or_email LIMIT 1";
    $stmt = $database_connection->prepare($sql);
    $stmt->bindParam(':username_or_email', $username_or_email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Jika user ditemukan
    if ($user) {
        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Login berhasil
            echo json_encode(['message' => 'Login berhasil!', 'user' => $user]);
        } else {
            // Password salah
            echo json_encode(['message' => 'Password salah!']);
        }
    } else {
        // User tidak ditemukan
        echo json_encode(['message' => 'User atau Email tidak ditemukan!']);
    }
}
?>
