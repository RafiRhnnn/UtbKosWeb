<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
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
            <h2>Tambah kosan baru </h2>

            <div class="card" style="max-width: 1500px; margin: auto;">
                <div class="card-body">
                    <h5 class="card-title">Tambah Kosan</h5>
                    <form id="addNewsForm">
                        <div class="mb-3">
                            <label for="namakos" class="form-label">Nama Kosan:</label>
                            <input type="text" id="namakos" name="namakos" class="form-control" maxlength="50" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamatkos" class="form-label">Alamat Kosan:</label>
                            <input type="text" id="alamatkos" name="alamatkos" class="form-control" maxlength="50" required>
                        </div>
                        <div class="mb-3">
                            <label for="hargasewa" class="form-label">Harga Sewa /Bulan:</label>
                            <input type="text" id="hargasewa" name="hargasewa" class="form-control" maxlength="50" required>
                        </div>
                        <div class="mb-3">
                            <label for="tipe" class="form-label">Tipe:</label>
                            <select id="tipe" name="tipe" class="form-control" required>
                                <option value="" disabled selected>Pilih Tipe</option>
                                <option value="perempuan">Perempuan</option>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="campur">Campur</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="fasilitas" class="form-label">Fasilitas:</label>
                            <textarea rows="3" class="form-control" id="fasilitas" name="fasilitas" required></textarea>
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


    <script src="../assets/js/scriptstambah.js">

    </script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function addNews() {
            // Ambil nilai dari form
            const namakos = document.getElementById('namakos').value;
            const alamatkos = document.getElementById('alamatkos').value;
            const hargasewa = document.getElementById('hargasewa').value;
            const tipe = document.getElementById('tipe').value;
            const fasilitas = document.getElementById('fasilitas').value;
            const urlImageInput = document.getElementById('url_image');
            const url_image = urlImageInput.files[0];
            const date = new Date().toISOString().split('T')[0]; // Format tanggal menjadi YYYY-MM-DD

            // Buat objek FormData
            var formData = new FormData();
            formData.append('namakos', namakos);
            formData.append('alamatkos', alamatkos);
            formData.append('hargasewa', hargasewa);
            formData.append('tipe', tipe);
            formData.append('fasilitas', fasilitas);
            formData.append('url_image', url_image); // Menambahkan file gambar
            formData.append('date', date);

            // Mengirimkan request POST menggunakan Axios
            axios
                .post('http://localhost/UtbKosWeb/backend/tambahkos.php', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                    },
                })
                .then(function(response) {
                    console.log('Response:', response.data); // Menampilkan respons dari server
                    alert('Kosan berhasil ditambahkan!');
                    document.getElementById('addNewsForm').reset(); // Reset form setelah sukses
                })
                .catch(function(error) {
                    // Menangani error
                    if (error.response) {
                        console.error('Response data:', error.response.data);
                        console.error('Status:', error.response.status);
                        console.error('Headers:', error.response.headers);
                        alert(`Error: ${error.response.data}\nStatus Code: ${error.response.status}`);
                    } else if (error.request) {
                        console.error('Request:', error.request);
                        alert('Server tidak memberikan respon. Silakan periksa koneksi atau konfigurasi server.');
                    } else {
                        console.error('Error message:', error.message);
                        alert(`Kesalahan dalam pengaturan permintaan: ${error.message}`);
                    }
                });
        }
    </script>

</body>

</html>