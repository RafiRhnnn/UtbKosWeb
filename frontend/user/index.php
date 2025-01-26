<?php
include "header.php";  // Memasukkan header di atas konten
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UtbKos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="icon" href="assets/images/logo.ico">
    <link rel="stylesheet" href="../assets/css/styleindexuser.css">
    <link rel="stylesheet" href="../assets/css/stlyefooter.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <script src="assets/js/scriptsindex.js"></script>
</head>

<body>
    <!-- project -->
    <section id="project">
        <div class="container">
            <div class="row text-center mb-3">
                <div class="col">
                    <h2>My Project</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="img/project1.jpeg" class="card-img-top" alt="project1" />
                        <div class="card-body">
                            <p class="card-text">
                                Some quick example text to build on the card title and make up
                                the bulk of the card's content.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="img/project2.jpeg" class="card-img-top" alt="project1" />
                        <div class="card-body">
                            <p class="card-text">
                                Some quick example text to build on the card title and make up
                                the bulk of the card's content.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="img/project3.jpg" class="card-img-top" alt="project1" />
                        <div class="card-body">
                            <p class="card-text">
                                Some quick example text to build on the card title and make up
                                the bulk of the card's content.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- project selesai -->

    <?php
    include "footer.php";  // Memasukkan footer di akhir body
    ?>

</body>

</html>