 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Dashboard</title>
 </head>

 <body>

     <!-- navbar start -->
     <nav class="navbar navbar-expand-lg navbar-light bg-warning sticky-top">
         <div class="container-fluid">
             <a class="navbar-brand" href="#">Utbkos</a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                 aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse">
                 <ul class=" navbar-nav mx-auto">
                     <!-- Menambahkan ms-auto di sini -->
                     <li class="nav-item mx-3">
                         <a class="nav-link" href="#about">Produk</a>
                     </li>
                     <li class="nav-item mx-3">
                         <a class="nav-link" href="#promo">history</a>
                     </li>
                     <li class="nav-item mx-9">
                         <a class="nav-link" href="#" onclick="logout()">logout</a>
                     </li>
                 </ul>
             </div>

         </div>
     </nav>
     <!-- navbar end -->
     <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
     <script>
     function logout() {
         // Mendapatkan session_token dari tempat penyimpanan yang sesuai (misalnya, cookie)
         const sessionToken = localStorage.getItem('session_token'); // Gantilah dengan yang sesuai
         // Hapus 'nama' dari localStorage setelah logout
         localStorage.removeItem('email');

         // Membuat objek FormData
         const formData = new FormData();
         formData.append('session_token', sessionToken);

         // Konfigurasi Axios untuk logout
         axios.post('http://localhost/UtbKosWeb/backend/logout.php', formData)
             .then(response => {
                 // Handle respons dari server
                 if (response.data.status === 'success') {
                     // Jika logout berhasil, arahkan kembali ke halaman login
                     localStorage.removeItem('session_token');
                     window.location.href = '../login.php';
                 } else {
                     // Jika logout gagal, tampilkan pesan kesalahan
                     alert('Logout failed. Please try again.');
                 }
             })
             .catch(error => {
                 // Handle kesalahan koneksi atau server
                 console.error('Error during logout:', error);
             });
     }
     </script>
     <!-- jQuery -->
     <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
     <!-- DataTables JavaScript -->
     <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
     <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
 </body>

 </html>