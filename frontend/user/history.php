<?php
include "header.php";  // Memasukkan header di atas konten
include "../check_session.php";
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="../assets/images/logo.ico">
    <link rel="stylesheet" href="../assets/css/stylehistoryyy.css">

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="wrapper">
        <div class="content">
            <div class="container mt-5">
                <h2 class="mb-4">Riwayat Pesanan</h2>
                <table id="historyTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pemesan</th>
                            <th>Alamat Kos</th>
                            <th>Tanggal Survey</th>
                            <th>Jumlah Bulan</th>
                            <th>Email</th>
                            <th>No Whatsapp</th>
                            <th>Harga Sewa / Bulan</th>
                            <th>Total Harga Sewa</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>

        <!-- Footer -->
        <footer>
            <?php include "footer.php"; ?>
        </footer>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const tableBody = document.querySelector("#historyTable tbody");
        const sessionToken = localStorage.getItem('session_token');

        if (!sessionToken) {
            alert("Anda belum login! Silakan login kembali.");
            window.location.href = "../../login.php";
            return;
        }

        axios.get(`http://localhost/UtbKosWeb/backend/listhistory.php?session_token=${sessionToken}`)
            .then(response => {
                if (response.data.error) {
                    alert(response.data.error);
                    window.location.href = "../login.php";
                    return;
                }

                const data = response.data;
                let rows = "";

                if (Array.isArray(data)) {
                    data.forEach((item, index) => {
                        const totalHarga = item.harga_sewa * item.jumlah_bulan;

                        let statusText = "Pending";
                        let statusClass = "status-pending";

                        if (item.status === "disetujui") {
                            statusText = "Disetujui";
                            statusClass = "status-disetujui";
                        } else if (item.status === "ditolak") {
                            statusText = "Ditolak";
                            statusClass = "status-ditolak";
                        }

                        rows += `
                            <tr>
                                <td>${index + 1}</td>
                                <td>${item.nama_pemesan}</td>
                                <td>${item.nama_kos}</td>
                                <td>${item.tanggal_survey}</td>
                                <td>${item.jumlah_bulan}</td>
                                <td>${item.email}</td>
                                <td>${item.no_telp}</td>
                                <td>Rp ${item.harga_sewa.toLocaleString()}</td>
                                <td>Rp ${totalHarga.toLocaleString()}</td>
                                <td><span class="${statusClass}">${statusText}</span></td>
                                <td>
                                    <button class="btn btn-danger btn-sm" onclick="hapusPesanan(${item.id})">Hapus</button>
                                </td>
                            </tr>
                        `;
                    });

                    tableBody.innerHTML = rows;
                    new DataTable("#historyTable");
                } else {
                    console.error("Data yang diterima bukan array:", data);
                }
            })
            .catch(error => {
                console.error("Gagal mengambil data:", error);
            });
    });

    function hapusPesanan(id) {
        const sessionToken = localStorage.getItem('session_token');
        if (!sessionToken) {
            alert("Anda harus login terlebih dahulu.");
            return;
        }

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
                const formData = new FormData();
                formData.append('session_token', sessionToken);
                formData.append('pesanan_id', id);

                axios.post('http://localhost/UtbKosWeb/backend/delete_pesanan.php', formData)
                    .then(response => {
                        if (response.data.status === 'success') {
                            Swal.fire({
                                title: "Success!",
                                text: "Pesanan berhasil dihapus!",
                                icon: "success",
                                confirmButtonColor: "#3085d6",
                                confirmButtonText: "OK"
                            }).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire("Gagal!", "Gagal menghapus pesanan: " + response.data.message,
                                "error");
                        }
                    })
                    .catch(error => {
                        console.error("Terjadi kesalahan:", error);
                        Swal.fire("Error!", "Terjadi kesalahan saat menghapus pesanan.", "error");
                    });
            }
        });
    }
    </script>

</body>

</html>