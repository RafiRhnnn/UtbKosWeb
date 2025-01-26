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
                    <label for="title">Title:</label>
                    <input type="text" id="judul" name="judul" class="form-control" maxlength="50" required>
                </div>

                <div>
                    <label for="title">Content:</label>
                    <textarea rows="" cols="" class="form-control" id="deskripsi" name="deskripsi" required></textarea>
                </div>

                <div>
                    <label for="title">Image:</label>
                    <input type="file" id="url_image" name="url_image" class="form-control file" accept="image/*"
                        required>
                </div>


                <button type="button" class="btn btn-primary" onclick="addNews()">Add News</button>
            </form>
        </div>
    </div>


    <script>
    // Chart.js Example
    const ctx = document.getElementById('profitChart').getContext('2d');
    const profitChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May'],
            datasets: [{
                label: 'Total Profit',
                data: [12000, 15000, 17000, 14000, 20000],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                }
            }
        }
    });
    </script>
</body>

</html>