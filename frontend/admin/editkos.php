<?php


// Ambil ID dari $_POST
$id = isset($_POST['id']) ? $_POST['id'] : null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Kos Form</h2>
        <form id="editKosForm">
            <input type="hidden" id="kosId" name="kosId" value="<?php echo $id; ?>">
            <div class="mb-3">
                <label for="namakos" class="form-label">Nama Kosan:</label>
                <input type="text" id="namakos" name="namakos" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="alamatkos" class="form-label">Alamat Kosan:</label>
                <input type="text" id="alamatkos" name="alamatkos" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="hargasewa" class="form-label">Harga Sewa / Bulan:</label>
                <input type="number" id="hargasewa" name="hargasewa" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="fasilitas" class="form-label">Fasilitas:</label>
                <textarea id="fasilitas" name="fasilitas" class="form-control" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="url_image" class="form-label">Foto Kosan:</label>
                <input type="file" id="url_image" name="url_image" class="form-control" accept="image/*">
            </div>
            <button type="button" class="btn btn-primary" onclick="editKos()">Edit Kosan</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
    function getData() {
        const kosId = document.getElementById('kosId').value;
        const formData = new FormData();
        formData.append('idkos', kosId);

        axios.post('http://localhost/UtbKosWeb/backend/selectdatakos.php', formData)
            .then(response => {
                if (response.data.error) {
                    alert(response.data.error);
                } else {
                    document.getElementById('namakos').value = response.data.namakos;
                    document.getElementById('alamatkos').value = response.data.alamatkos;
                    document.getElementById('hargasewa').value = response.data.hargasewa;
                    document.getElementById('fasilitas').value = response.data.fasilitas;
                }
            })
            .catch(error => {
                console.error(error);
                alert('Error fetching kos data.');
            });
    }

    function editKos() {
        const kosId = document.getElementById('kosId').value;
        const namakos = document.getElementById('namakos').value;
        const alamatkos = document.getElementById('alamatkos').value;
        const hargasewa = document.getElementById('hargasewa').value;
        const fasilitas = document.getElementById('fasilitas').value;
        const urlImageInput = document.getElementById('url_image');
        const url_image = urlImageInput.files[0];
        const date = new Date().toISOString().split('T')[0];

        const formData = new FormData();
        formData.append('idkos', kosId);
        formData.append('namakos', namakos);
        formData.append('alamatkos', alamatkos);
        formData.append('hargasewa', hargasewa);
        formData.append('fasilitas', fasilitas);
        formData.append('date', date);

        if (urlImageInput.files.length > 0) {
            formData.append('url_image', url_image);
        }

        axios.post('http://localhost/UtbKosWeb/backend/editkos.php', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            })
            .then(response => {
                alert(response.data.success || response.data.error);
                if (response.data.success) {
                    window.location.href = 'kelola.php';
                }
            })
            .catch(error => {
                console.error(error);
                alert('Error editing kos data.');
            });
    }

    window.onload = getData;
    </script>
</body>

</html>