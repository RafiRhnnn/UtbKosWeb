<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../assets/images/logo.ico">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="container-fluid d-flex">
        <!-- Sidebar -->
        <div class="sidebar bg-dark text-white p-3" style="width: 280px; height: 100vh;">
            <?php include 'header.php'; ?>
        </div>

        <!-- Konten Utama -->
        <div class="container mt-5">
            <h2>Tambah Kosan Baru</h2>

            <div class="card" style="max-width: 1500px; margin: auto;">
                <div class="card-body">
                    <h5 class="card-title">Tambah Kosan</h5>
                    <form id="addNewsForm" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="namakos" class="form-label">Nama Kosan:</label>
                            <input type="text" id="namakos" name="namakos" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamatkos" class="form-label">Alamat Kosan:</label>
                            <input type="text" id="alamatkos" name="alamatkos" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="hargasewa" class="form-label">Harga Sewa /Bulan:</label>
                            <input type="text" id="hargasewa" name="hargasewa" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="tipe" class="form-label">Tipe:</label>
                            <select id="tipe" name="tipe" class="form-control" required>
                                <option value="" disabled selected>Pilih Tipe</option>
                                <option value="laki-laki">Putra</option>
                                <option value="perempuan">Putri</option>
                                <option value="campur">Campur</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="notelp" class="form-label">Nomor Telepon:</label>
                            <input type="text" id="notelp" name="notelp" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="fasilitas" class="form-label">Fasilitas:</label>
                            <textarea rows="3" class="form-control" id="fasilitas" name="fasilitas" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="detailkost" class="form-label">Cerita Pemilik Kosan:</label>
                            <textarea rows="4" class="form-control" id="detailkost" name="detailkost" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="url_image" class="form-label">Foto Kosan:</label>
                            <input type="file" id="url_image" name="url_image" class="form-control" accept="image/*" required>
                        </div>
                        <button type="button" class="btn btn-primary w-40" onclick="addNews()">Tambah Kosan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/scriptstambah.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function addNews() {
            const formData = new FormData(document.getElementById("addNewsForm"));

            // Tambahkan tanggal secara otomatis
            const date = new Date().toISOString().split('T')[0]; // Format YYYY-MM-DD
            formData.append('date', date);

            axios.post('http://localhost/UtbKosWeb/backend/tambahkos.php', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(response => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Berhasil menambahkan kos',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        setTimeout(() => {
                            window.location.href = "tambah.php";
                        }, 500); // Tambahkan delay 500ms
                    });

                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops!',
                        text: 'Terjadi kesalahan, coba lagi.',
                        confirmButtonText: 'OK'
                    });
                });
        }
    </script>


</body>

</html>