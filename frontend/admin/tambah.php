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

            <form action="" id="addNewsForm">
                <div>
                    <label for="title">Nama kosan:</label>
                    <input type="text" id="judul" name="judul" class="form-control" maxlength="50" required>
                </div>
                <div>
                    <label for="title">Alamat kosan:</label>
                    <input type="text" id="judul" name="judul" class="form-control" maxlength="50" required>
                </div>
                <div>
                    <label for="title">Harga Sewa /Bulan:</label>
                    <input type="text" id="judul" name="judul" class="form-control" maxlength="50" required>
                </div>

                <div>
                    <label for="title">Fasilitass:</label>
                    <textarea rows="" cols="" class="form-control" id="deskripsi" name="deskripsi" required></textarea>
                </div>

                <div>
                    <label for="title">Foto kosan :</label>
                    <input type="file" id="url_image" name="url_image" class="form-control file" accept="image/*"
                        required>
                </div>


                <button type="button" class="btn btn-primary " onclick="addNews()">Tambah Kosan</button>
            </form>
        </div>
    </div>


    <script src="../assets/js/scriptstambah.js">

    </script>
</body>

</html>