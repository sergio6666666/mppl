<?php

include 'koneksi.php';
function tambah_data($data, $files){


    $tanggal = $data['tanggal'];
    $nama = $data['nama'];
    $jumlah = $data['jumlah'];

    $query = "INSERT INTO tb_pemasukan VALUES(null, '$tanggal', '$nama', '$jumlah')";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

function ubah_data($data, $files){
    $id = $data['id_pemasukan'];
        $tanggal = $data['tanggal'];
        $nama = $data['nama'];
        $jumlah = $data['jumlah'];

        $queryShow = "SELECT * FROM tb_pemasukan WHERE id_pemasukan = '$id';";
        $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        $query = "UPDATE tb_pemasukan SET tanggal='$tanggal', nama='$nama', jumlah='$jumlah' WHERE  id_pemasukan='$id';";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
}

function hapus_data($data){
    $id = $data['hapus'];

    $queryShow = "SELECT * FROM tb_pemasukan WHERE id_pemasukan = '$id';";
    $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    var_dump($result);

    unlink("pic/".$result['foto']);



    $query = "DELETE FROM tb_pemasukan WHERE id_pemasukan = '$id' ;";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}
