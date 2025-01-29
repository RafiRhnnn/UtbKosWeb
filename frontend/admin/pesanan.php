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
            <h2 class="mb-4">List News</h2>

            <table id="newsTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pemesan</th>
                        <th>alamat kos</th>
                        <th>Image</th>
                        <th>tanggal survey</th>
                        <th>jumlah kamar</th>
                        <th>jumlah bulan</th>
                        <th>Email</th>
                        <th>Harga Sewa /Bulan</th>
                        <th>Total Harga Sewa</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    </div>


    <script src="../assets/js/scriptstambah.js">

    </script>
</body>

</html>