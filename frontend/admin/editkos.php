<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Edit News Form</h2>

        <form id="addNewsForm">
            <input type="hidden" id="kosId" name="newsId" value="<?php echo $id; ?>">
            <div>
                <label for="namakos">Nama kosan:</label>
                <input type="text" id="namakos" name="namakos" class="form-control" maxlength="50" required>
            </div>
            <div>
                <label for="alamatkos">Alamat kosan:</label>
                <input type="text" id="alamatkos" name="alamatkos" class="form-control" maxlength="50" required>
            </div>
            <div>
                <label for="hargasewa">Harga Sewa /Bulan:</label>
                <input type="text" id="hargasewa" name="hargasewa" class="form-control" maxlength="50" required>
            </div>
            <div>
                <label for="fasilitas">Fasilitas:</label>
                <textarea rows="3" class="form-control" id="fasilitas" name="fasilitas" required></textarea>
            </div>
            <div>
                <label for="url_image">Foto kosan:</label>
                <input type="file" id="url_image" name="url_image" class="form-control file" accept="image/*" required>
            </div>
            <button type="button" class="btn btn-primary" onclick="editKos()">Edit Kosan</button>
        </form>

    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
function getData() {
    const newsId = document.getElementById('kosId').value;
    var formData = new FormData();
    formData.append('idkos', kosId);
    // Lakukan permintaan AJAX untuk mendapatkan data berita berdasarkan ID
    axios.post('http://localhost/UtbKosWeb/backend/selectdatakos.php', formData)
        .then(function(response) {
            // Isi nilai input dengan data yang diterima
            document.getElementById('namakos').value = response.data.title;
            document.getElementById('alamatkos').value = response.data.desc;
            document.getElementById('hargasewa').value = response.data.desc;
            document.getElementById('fasilitas').value = response.data.desc;
        })
        .catch(function(error) {
            console.error(error);
            alert('Error fetching kos data.');
        });
}

function editKos() {
    const kosId = document.getElementById('kosId').value;
    const namakos = document.getElementById('namakos').value;
    const alamatkos = document.getElementById('alamatkos').value;
    const hargakos = document.getElementById('hargakos').value;
    const fasilitas = document.getElementById('fasilitas').value;
    const urlImageInput = document.getElementById('url_image');
    const url_image = urlImageInput.files[0];
    const tanggal = new Date().toISOString().split('T')[0];

    // Get form data
    var formData = new FormData();
    formData.append('idkos', kosId);
    formData.append('namakos', namakos);
    formData.append('alamatkos', alamatkos);
    formData.append('hargakos', hargakos);
    formData.append('fasilitas', fasilitas);
    formData.append('tanggal', tanggal);

    if (urlImageInput.files.length > 0) {
        formData.append('url_image', url_image);
    } else {
        formData.append('url_image', null);
        // Tidak perlu menambahkan 'url_image' karena tidak ada file yang dipilih
    }

    // Lakukan permintaan AJAX untuk mengedit berita
    axios.post('http://localhost/UtbKosWeb/backend/editkos.php', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
            },
        })
        .then(function(response) {
            console.log(response.data);
            alert(response.data); // Tampilkan pesan berhasil atau tanggapan yang sesuai
            window.location.href = 'kelola.php';
        })
        .catch(function(error) {
            console.error(error);
            alert('Error editing news.');
        });
}
window.onload = getData;
</script>

</html>