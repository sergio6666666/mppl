<!DOCTYPE html>

<?php
include 'koneksi.php';
session_start();



$tanggal = '';
$nama = '';
$berat = '';
$total = '';

if (isset($_GET['ubah'])) {
    $id = $_GET['ubah'];

    $query =  "SELECT * FROM tb_pemasukan WHERE id = '$id';";
    $sql  = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($sql);

    $tanggal = $result['tanggal'];
    $nama = $result['nama'];
    $berat = $result['berat'];
    $total = $result['total'];
}
?>



<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Panen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

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
            height: 100vh; /* Mengatur tinggi body untuk 100% viewport */
            display: flex;
            justify-content: center; /* Menyusun konten secara horizontal di tengah */
            align-items: center;
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
            <a class="navbar-brand fw-bold fs-9" href="#">PakMul.com</a>
            <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- SideBar -->
            <div class="sidebar offcanvas offcanvas-start bg-dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">PakMul.com</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item mx-4 fs-5">
                            <a class="nav-link " aria-current="page" href="beranda.php">Beranda</a>
                        </li>

                        <li class="nav-item mx-4 fs-5 ">
                            <a class="nav-link active" href="datapekerja.php">Data Pekerja</a>
                        </li>

                        <li class="nav-item mx-4 fs-5">
                            <a class="nav-link " href="datakebun.php">Data Kebun</a>
                        </li>

                        <li class="nav-item mx-4 fs-5 dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Panen
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/pemasukan/datapemasukan.php">Pemasukan</a></li>
                                <li><a class="dropdown-item" href="#">Pengeluaran</a></li>
                            </ul>
                        </li>

                        <li class="nav-item mx-4 fs-5">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>


                    </ul>
                </div>
            </div>
        </div>
    </nav>
    
    <div class="container d-flex justify-content-center" style="min-height: auto;">
        <form method="POST" action="prosespemasukan.php" enctype="multipart/form-data" style="background-color: #fff; padding: 20px; border-radius: 10px; width: 100%; max-width: 700px;">
            <input type="hidden" value="<?php echo $id ?>" name="id">
            <div class="mb-3 row">
                <h2 class="text-center">Edit Data</h2>
            </div>

            <div class="mb-3 row">
                <label for="tanggal" class="col-sm-2 col-form-label text-black">Tanggal</label>
                <div class="col-sm-10">
                    <input required type="date" name="tanggal" class="form-control bg-white text-black" id="tanggal" placeholder="" value="<?php echo $tanggal; ?>" autocomplete="off">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="ket" class="col-sm-2 col-form-label text-black">Keterangan</label>
                <div class="col-sm-10">
                    <input required type="text" name="ket" class="form-control bg-white text-black" id="ket" placeholder="Masukkan Keterangan" value="<?php echo $ket; ?>" autocomplete="off">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="berat" class="col-sm-2 col-form-label text-black">Berat (kg)</label>
                <div class="col-sm-10">
                    <input required type="text" name="berat" class="form-control bg-white text-black" id="berat" placeholder="Masukkan Berat" value="<?php echo $berat; ?>" autocomplete="off">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="total" class="col-sm-2 col-form-label text-black">Total</label>
                <div class="col-sm-10">
                    <input required type="text" name="total" class="form-control bg-white text-black" id="total" placeholder="Masukkan Total" value="<?php echo $total; ?>"  autocomplete="off">
                </div>
            </div>

            <div class="mb-3 row mt-4 d-flex justify-content-center">
                <div class="col text-center">
                    <?php if (isset($_GET['ubah'])) { ?>
                        <button type="submit" name="aksi" value="edit" class="btn btn-primary">
                            <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
                        </button>
                    <?php } else { ?>
                        <button type="submit" name="aksi" value="add" class="btn btn-primary">
                            <i class="fa-solid fa-floppy-disk"></i> Tambahkan
                        </button>
                    <?php } ?>
                    <a href="datakebun.php" type="button" class="btn btn-danger">
                        <i class="fa-solid fa-backward"></i> Kembali
                    </a>
                </div>
            </div>
        </form>
    </div>

</body>

</html>