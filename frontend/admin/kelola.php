<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Kosan</title>
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
            <h2 class="mt-5">Daftar Kosan</h2>
            <table id="newsTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kost</th>
                        <th>Alamat Kost</th>
                        <th>Harga Sewa</th>
                        <th>Tipe</th>
                        <th>No Telepone</th>
                        <th>Fasilitas</th>
                        <th>Detail kos</th>
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
            $('#newsTable').DataTable({
                'processing': true,
                'serverSide': true,
                'ajax': function(data, callback) {
                    axios.get('http://localhost/UtbKosWeb/backend/listkos.php', {
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
                        'data': 'namakos'
                    },
                    {
                        'data': 'alamatkos'
                    },
                    {
                        'data': 'hargasewa'
                    },
                    {
                        'data': 'tipe'
                    },
                    {
                        'data': 'notelp'
                    },
                    {
                        'data': 'fasilitas'
                    },
                    {
                        'data': 'detailkost'
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
                            return '<button class="btn btn-danger btn-sm" onclick="deletekos(' + row
                                .id + ')">Delete</button>' +
                                '<form action="editkos.php" method="post" style="display:inline;">' +
                                '<input type="hidden" name="id" value="' + row.id + '">' +
                                '<button type="submit" class="btn btn-primary btn-sm">Edit</button>' +
                                '</form>';
                        }
                    }
                ]
            });
        });

        function deletekos(id) {
            var formData = new FormData();
            formData.append('idkos', id);

            Swal.fire({
                title: "Apakah Anda yakin?",
                text: "Data ini akan dihapus secara permanen!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.post('http://localhost/UtbKosWeb/backend/deletekos.php', formData)
                        .then(function(response) {
                            Swal.fire({
                                title: "Deleted!",
                                text: "Kos berhasil dihapus!",
                                icon: "success",
                                showConfirmButton: false,
                                timer: 2000
                            });

                            $('#newsTable').DataTable().ajax.reload();
                        })
                        .catch(function(error) {
                            Swal.fire("Error!", "Gagal menghapus data.", "error");
                        });
                }
            });
        }
    </script>
</body>

</html>