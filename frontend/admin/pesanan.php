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
</head>

<body>
    <div class="container-fluid d-flex">
        <!-- Sidebar -->
        <div class="sidebar bg-dark text-white p-3" style="width: 280px; height: 100vh;">
            <?php include 'header.php'; ?>
        </div>

        <!-- Konten Utama -->
        <div class="container mt-5">
            <h2 class="mb-4">Pesanan</h2>

            <table id="newsTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pemesan</th>
                        <th>alamat kos</th>
                        <th>tanggal survey</th>
                        <th>jumlah bulan</th>
                        <th>Email</th>
                        <th>No Whatsapp</th>
                        <th>Harga Sewa /Bulan</th>
                        <th>Total Harga Sewa</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/scriptstambah.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const tableBody = document.querySelector("#newsTable tbody");

        // Ambil data dari backend menggunakan Axios
        axios.get("http://localhost/UtbKosWeb/backend/listpesanan.php")
            .then(response => {
                const data = response.data;
                let rows = "";

                data.forEach((item, index) => {
                    const totalHarga = item.harga_sewa * item
                        .jumlah_bulan; // Hitung total harga sewa

                    rows += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${item.nama_pemesan}</td>
                        <td>${item.nama_kos}</td>
                        <td>${item.tanggal_survey}</td>
                        <td>${item.jumlah_bulan}</td>
                        <td>${item.email}</td>
                        <td>${item.notelp}</td>
                        <td>Rp ${item.harga_sewa.toLocaleString()}</td>
                        <td>Rp ${totalHarga.toLocaleString()}</td>
                    </tr>
                `;
                });

                tableBody.innerHTML = rows; // Masukkan baris ke dalam tabel

                // Inisialisasi DataTables
                new DataTable("#newsTable");
            })
            .catch(error => {
                console.error("Gagal mengambil data:", error);
            });
    });
    </script>
</body>

</html>