<?php
include 'koneksi.php';

$query = "SELECT * FROM tb_pemasukan;";
$sql = mysqli_query($conn, $query);
$no = 0;





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pemasukan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">


    <!-- Data Tables -->
    <link rel="stylesheet" href="/datatables/datatables.css">
    <script type="text/javascript" src="/datatables/datatables.js"></script>


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
    <!-- Background gambar di belakang tabel -->
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

        body {
            margin: 0;
        }

        /* Tambahkan gaya untuk latar belakang tabel */
        .table-container {
            background-color: white;
            /* Warna latar belakang putih */
            padding: 20px;
            /* Padding di sekitar tabel */
            border-radius: 8px;
            /* Opsional: membuat sudut bulat */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Opsional: memberikan bayangan */
        }

        /* Styles for the dark navbar */
        .navbar-dark-custom {
            background-color: #343a40 !important; /* Dark background */
            color: white; /* White text */
        }

        .navbar-dark-custom .nav-link {
            color: white; /* White text for links */
        }

        .navbar-dark-custom .navbar-brand {
            color: white; /* White text for brand */
        }
    </style>


</head>

<script type="text/javascript">
    $(document).ready(function() {
        $('#dt').DataTable();

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

<body>
    <img src="/pic/bg1.jpg" class="img-fluid full-screen-img" alt="Responsive full screen image">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold fs-9" href="#">KelolaUang.com</a>
            <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- SideBar -->
            <div class="sidebar offcanvas offcanvas-start bg-dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">KelolaUang.com</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item mx-4 fs-5">
                            <a class="nav-link " aria-current="page" href="beranda.php">Beranda</a>
                        </li>

                        <li class="nav-item mx-4 fs-5 ">
                            <a class="nav-link active" href="datapemasukan.php">Data Pemasukan</a>
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
    <!-- Judul-->
    <div class="container">
        <h1 class="mt-5 pt-5 text-light ps-1">Data Pemasukan</h1>

        <a href="kelola.php" type="button" class="btn btn-primary mb-3 ms-1">
            <i class="fa-solid fa-plus"></i>
            Tambah Data
        </a>

        <!-- Tabel -->
        <div class="table-responsive table-container">
            <table id="dt" class="table align-middle table-bordered table-hover ">
                <thead>
                    <tr>
                        <th>
                            <center>No.</center>
                        </th>
                        <th>
                            <center>Tanggal</center>
                        </th>
                        <th>
                            <center>Keterangan</center>
                        </th>
                        <th>
                            <center>Jumlah</center>
                        </th>
                        <th>
                            <center>Aksi</center>
                        </th>
                    </tr>

                </thead>
                <tbody>
                    <?php
                    while ($result = mysqli_fetch_assoc($sql)) {
                    ?>
                        <tr>
                            <td>
                                <center>
                                    <?php echo ++$no; ?>.
                                </center>
                            </td>
                            <td>
                                <center><?php echo $result['tanggal'] ?></center>
                            </td>
                            <td>
                                <center><?php echo $result['nama'] ?></center>
                            </td>
                            <td>
                                <center><?php echo $result['jumlah'] ?></center>
                            </td>
                            <td>
                                <center>
                                    <a href="kelola.php?ubah=<?php echo $result['id_pemasukan'] ?>" type="button" class="btn btn-success btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="proses.php?hapus=<?php echo $result['id_pemasukan'] ?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Apakah kamu yakin ingin menghapus data tersebut ?')">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </center>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>


                </tbody>
            </table>

        </div>
    </div>

    <div class="mb-5"></div>
</body>

</html>