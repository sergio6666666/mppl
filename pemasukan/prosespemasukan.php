<?php

include 'fungsipemasukan.php';

if (isset($_POST['aksi'])) {
    if ($_POST['aksi'] == "add") {

        $berhasil = tambah_data3($_POST, $_FILES);

        if ($berhasil) {
            header("location: datapemasukan.php");
        } else {
            echo $berhasil;
        }

    } else if ($_POST['aksi'] == "edit") {
        $berhasil = ubah_data3($_POST, $_FILES);
        if ($berhasil) {
            header("location: datapemasukan.php");
        } else {
            echo $berhasil;
        }
    }
}

if (isset($_GET['hapus'])) {

    $berhasil = hapus_data3($_GET);
    if ($berhasil) {
        header("location: datapemasukan.php");
        
    } else {
        echo $berhasil;
    }
}
