<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../assets/images/logo.ico">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>
    <div class="container-fluid d-flex">
        <!-- Sidebar -->
        <div class="sidebar bg-dark text-white p-3" style="width: 280px; height: 100vh;">
            <?php include 'header.php'; ?>
        </div>

        <!-- Konten Utama -->
        <div class="main-content flex-grow-1 p-4">
            <h2>Selamat Datang!</h2>
            <p>Berikut ringkasan statistik.</p>

            <!-- Cards -->
            <div class="row">
                <div class="col-md-3">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Kosan</h5>
                            <p id="jumlah-kosan" class="card-text">Memuat... <small class="text-light">kosan</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-info mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Pesanan</h5>
                            <p id="jumlah-pesanan" class="card-text">Memuat... <small class="text-light">pesanan</small></p>
                        </div>
                    </div>
                </div>

                <!-- Chart -->
                <div class="col-md-6">
                    <canvas id="profitChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Fungsi untuk mengambil jumlah kosan dari backend
        async function fetchJumlahKosan() {
            try {
                // Panggil backend menggunakan Axios
                const response = await axios.get('http://localhost/UtbKosWeb/backend/jumlahkos.php');
                const data = response.data;

                // Periksa apakah respons sukses
                if (data.status === 'success') {
                    // Update jumlah kosan di halaman
                    document.getElementById('jumlah-kosan').innerHTML = `${data.jumlah_kos} <small class="text-light">kosan</small>`;
                } else {
                    // Tampilkan pesan error jika gagal
                    document.getElementById('jumlah-kosan').innerHTML = `Error: ${data.message}`;
                }
            } catch (error) {
                // Tampilkan pesan error jika terjadi masalah koneksi
                document.getElementById('jumlah-kosan').innerHTML = 'Error: Gagal memuat data';
                console.error(error);
            }
        }

        async function fetchJumlahPesanan() {
            try {
                // Panggil backend menggunakan Axios
                const response = await axios.get('http://localhost/UtbKosWeb/backend/jumlahpesanan.php');
                const data = response.data;

                // Periksa apakah respons sukses
                if (data.status === 'success') {
                    // Update jumlah kosan di halaman
                    document.getElementById('jumlah-pesanan').innerHTML = `${data.jumlah_pesanan} <small class="text-light">pesanan</small>`;
                } else {
                    // Tampilkan pesan error jika gagal
                    document.getElementById('jumlah-pesanan').innerHTML = `Error: ${data.message}`;
                }
            } catch (error) {
                // Tampilkan pesan error jika terjadi masalah koneksi
                document.getElementById('jumlah-pesanan').innerHTML = 'Error: Gagal memuat data';
                console.error(error);
            }
        }

        // Panggil fungsi saat halaman dimuat
        fetchJumlahKosan();
        fetchJumlahPesanan();
    </script>
</body>

</html>