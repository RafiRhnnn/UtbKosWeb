<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Fiture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
            <h2>Tambah Fiture Baru</h2>

            <div class="card" style="max-width: 1500px; margin: auto;">
                <div class="card-body">
                    <h5 class="card-title">Tambah Fiture</h5>
                    <form id="addFitureForm">
                        <div class="mb-3">
                            <label for="namafiture" class="form-label">Nama Fiture:</label>
                            <input type="text" id="namafiture" name="namafiture" class="form-control" maxlength="50" required>
                        </div>
                        <div class="mb-3">
                            <label for="descripsi" class="form-label">Descripsi Fiture:</label>
                            <textarea rows="3" class="form-control" id="descripsi" name="descripsi" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="img" class="form-label">Foto Fiture:</label>
                            <input type="file" id="img" name="img" class="form-control" accept="image/*" required>
                        </div>
                        <button type="button" class="btn btn-primary w-40" onclick="addFiture()">Tambah Fiture</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/scriptstambah.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        function addFiture() {
            // Ambil nilai dari form
            const namafiture = document.getElementById('namafiture').value;
            const descripsi = document.getElementById('descripsi').value;
            const imgInput = document.getElementById('img');
            const img = imgInput.files[0];

            // Buat objek FormData
            var formData = new FormData();
            formData.append('namafiture', namafiture);
            formData.append('descripsi', descripsi);
            formData.append('img', img); // Menambahkan file gambar

            // Mengirimkan request POST menggunakan Axios
            axios
                .post('http://localhost/UtbKosWeb/backend/tambahfiture.php', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                    },
                })
                .then(function(response) {
                    console.log('Response:', response.data); // Menampilkan respons dari server

                    // Menampilkan alert dengan tombol OK
                    Swal.fire({
                        icon: 'success',
                        title: 'Feature berhasil ditambah!',
                        text: 'Data fitur telah tersimpan.',
                        confirmButtonText: 'OK' // Menampilkan tombol OK
                    }).then(() => {
                        document.getElementById('addFitureForm').reset(); // Reset form setelah pengguna klik OK
                    });

                })
                .catch(function(error) {
                    let errorMessage = 'Terjadi kesalahan!';

                    if (error.response) {
                        errorMessage = `Error: ${error.response.data}\nStatus Code: ${error.response.status}`;
                    } else if (error.request) {
                        errorMessage = 'Server tidak memberikan respon. Silakan periksa koneksi atau konfigurasi server.';
                    } else {
                        errorMessage = `Kesalahan dalam pengaturan permintaan: ${error.message}`;
                    }

                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: errorMessage,
                        confirmButtonText: 'OK' // Tombol OK untuk error
                    });
                });
        }
    </script>

</body>

</html>