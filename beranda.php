<?php
include 'koneksi.php';

$query = "SELECT * FROM tb_biodata;";
$sql = mysqli_query($conn, $query);
$no = 0;





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            // Mengubah warna background navbar jika page di scroll
            $(window).on('scroll', function() {
                if ($(this).scrollTop() > 50) {
                    $('.navbar').addClass('navbar-dark-custom');
                } else {
                    $('.navbar').removeClass('navbar-dark-custom');
                }
            });
        });
    </script>


    <!-- Styling background image -->
    <style>
        .full-screen-img {
            position: fixed;
            /* Menempatkan gambar di posisi tetap */
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            /* 100% dari tinggi viewport */
            object-fit: cover;
            /* Memastikan gambar tidak terdistorsi */
            z-index: -1;
            /* Memastikan gambar berada di belakang konten */
        }

        body {
            margin: 0;

            /* Menghilangkan margin default body */
        }
    </style>
    <!-- Background putih di belakang tabel -->
    <style>
        .full-screen-img {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            object-fit: cover;
            z-index: -1;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
    <!-- style hover navbar -->
    <style>
        .navbar-dark-custom {
            background-color: #343a40 !important;
            /* Dark background */
            color: white;
            /* White text */
        }

        .navbar-dark-custom .nav-link {
            color: white;
            /* White text for links */
        }

        .navbar-dark-custom .navbar-brand {
            color: white;
            /* White text for brand */
        }
    </style>

</head>




<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold fs-9" href="#">KelolaUang.com</a>
            <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="sidebar offcanvas offcanvas-start bg-dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">KelolaUang.com</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item mx-4 fs-5">
                            <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                        </li>

                        <li class="nav-item mx-4 fs-5">
                            <a class="nav-link " href="datapemasukan.php">Data Pemasukan</a>
                        </li>

                        <li class="nav-item mx-4 fs-5">
                            <a class="nav-link " href="datapengeluaran.php">Data Pengeluaran</a>
                        </li>

                        <li class="nav-item mx-4 fs-5">
                            <a class="nav-link " href="logout.php">Logout</a>
                        </li>


                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- jumbotron -->
    <section class="jumbotron jumbotron-fluid text-center pt-5 mt-5">
        <div class="container">
            <img src="/pic/kelola.png" alt="logo" width="200" class="rounded-circle mt-5">
            <h1 class="display-4 text-white">Organize Your Money</h1>
            <p class="lead text-white mb-5">KelolaUang.com</p>
        </div>
    </section>
    <!-- akhir jumbotron -->

    <!-- about -->
    <section id="about">
        <div class="container">
            <div class="row text-center mb-4">
                <div class="col">
                    <h2 class="text-white mt-5">About Us</h2>
                </div>
            </div>
            <div class="row justify-content-center fs-5">
                <div class="col-md-9">
                    <p class="text-white mb-5">Selamat datang di KelolaUang.com, platform digital terdepan untuk manajemen dan pengelolaan uang. Kami hadir dengan tujuan untuk mempermudah anda dalam mengelola uang, khususnya untuk pemasukan dan pengeluaran anda.</p>
                </div>
            </div>
        </div>
    </section>


    <!-- akhir about -->

    <!-- Projects -->

    <section id="projects">
        <div class="container">
            <div class="row text-center mb-4">
                <div class="col">
                    <h2 class="text-white mt-5 mb-4">Pantau Pemasukan dan Pengeluaran Anda</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="/pic/money.jpeg" class="card-img-top" alt="project1">
                        <div class="card-body">
                            <p class="card-text">Kami berkomitmen untuk membantu anda dalam pengelolaan uang.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="/pic/money.jpeg" class="card-img-top" alt="project1">
                        <div class="card-body">
                            <p class="card-text">Kami membantu anda untuk mencatat dan memantau setiap pengeluaran.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="/pic/money.jpeg" class="card-img-top" alt="project1">
                        <div class="card-body">
                            <p class="card-text">Kami akan membantu anda dalam meraih kebebasan finansial anda di usia muda.</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <!-- akhir projects -->

    <!-- footer -->

    <footer>
        <p class="text-white text-center fw-bold mt-5">2024-KelolaUang.com</p>
    </footer>

    <!-- akhir footer -->

    <img src="/pic/bg1.jpg" class="img-fluid full-screen-img" alt="Responsive full screen image">

    <div style="position: relative; z-index: 1; text-align: center; color: white; margin-top: 300px;">
    </div>

</body>

</html>