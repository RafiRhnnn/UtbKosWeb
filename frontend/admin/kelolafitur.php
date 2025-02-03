<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Fitur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../assets/images/logo.ico">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <!-- Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <div class="container-fluid d-flex">
        <!-- Sidebar -->
        <div class="sidebar bg-dark text-white p-3" style="width: 280px; height: 100vh;">
            <?php include 'header.php'; ?>
        </div>

        <!-- Konten Utama -->
        <div class="container mt-5">
            <h2 class="mt-5">Daftar Fitur</h2>
            <table id="featuresTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Fitur</th>
                        <th>Deskripsi</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Initialize DataTable
            $('#featuresTable').DataTable({
                'processing': true,
                'serverSide': true,
                'ajax': function(data, callback) {
                    axios.get('http://localhost/UtbKosWeb/backend/listfiture.php', {
                        params: {
                            key: data.search.value
                        }
                    }).then(function(response) {
                        response.data.forEach(function(row, index) {
                            row.no = index + 1;
                        });
                        callback({
                            draw: data.draw,
                            recordsTotal: response.data.length,
                            recordsFiltered: response.data.length,
                            data: response.data
                        });
                    }).catch(function(error) {
                        console.error(error);
                        alert('Error fetching data.');
                    });
                },
                'columns': [{
                        'data': 'no'
                    },
                    {
                        'data': 'namafiture'
                    },
                    {
                        'data': 'descripsi'
                    },
                    {
                        'data': 'img',
                        'render': function(data) {
                            return `<img src="${data}" style="max-width: 100px; max-height: 100px;">`;
                        }
                    },
                    {
                        "data": null,
                        "render": function(data, type, row) {
                            return '<button class="btn btn-danger btn-sm" onclick="deleteFeature(' + row.id + ')">Delete</button>';

                        }
                    }
                ]
            });
        });

        function deleteFeature(id) {
            var formData = new FormData();
            formData.append('id', id);

            Swal.fire({
                title: "Apakah kamu yakin?",
                text: "Fitur ini akan dihapus secara permanen!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.post('http://localhost/UtbKosWeb/backend/deletefiture.php', formData)
                        .then(function(response) {
                            Swal.fire({
                                title: "Berhasil!",
                                text: "Feature berhasil di delete!",
                                icon: "success",
                                showConfirmButton: false,
                                timer: 2000
                            });
                            $('#featuresTable').DataTable().ajax.reload();
                        })
                        .catch(function(error) {
                            Swal.fire({
                                title: "Error!",
                                text: "Terjadi kesalahan saat menghapus fitur.",
                                icon: "error"
                            });
                        });
                }
            });
        }
    </script>
</body>

</html>