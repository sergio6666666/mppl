<?php

include 'koneksi.php';
function tambah_data3($data, $files)
{


    $tanggal = $data['tanggal'];
    $ket = $data['ket'];
    $berat = $data['berat'];
    $total = $data['total'];


    $query = "INSERT INTO tb_pemasukan VALUES(null, '$tanggal', '$ket', '$berat', '$total')";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

function ubah_data3($data, $files)
{
    $id = $data['id'];
    $tanggal = $data['tanggal'];
    $ket = $data['ket'];
    $berat = $data['berat'];
    $total = $data['total'];

    $queryShow = "SELECT * FROM tb_pemasukan WHERE id = '$id';";
    $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    $query = "UPDATE tb_pemasukan SET tanggal='$tanggal', ket='$ket', berat='$berat', total='$total' WHERE  id='$id';";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

function hapus_data3($data)
{
    $id = $data['hapus'];

    $queryShow = "SELECT * FROM tb_pemasukan WHERE id = '$id';";
    $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    var_dump($result);




    $query = "DELETE FROM tb_pemasukan WHERE id = '$id' ;";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}
