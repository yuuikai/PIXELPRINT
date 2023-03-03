<?php

session_start();
include '../koneksi.php';

$char = "TRX";
$query=mysqli_query($koneksi,"SELECT max(kodetransaksi) as max_kode FROM transaksi 
    WHERE kodetransaksi LIKE '{$char}%' ORDER BY kodetransaksi DESC LIMIT 1");
$data = mysqli_fetch_array($query);
$kodeTransaksi = $data['max_kode'];
$no = substr($kodeTransaksi, -3, 3);
 $no = (int) $no; 
 $no += 1;
$newkodetransaksi = $char . sprintf("%03s", $no);
$jumlah = $_POST['jumlah'];
$alamat = $_POST['alamat'];



$id = $_GET["id"];
$namabarang = mysqli_query($koneksi, "SELECT namabarang FROM barang WHERE id = $id");
$ambilbarang = mysqli_fetch_assoc($namabarang);
$ambilnamabarang = $ambilbarang["namabarang"];


$querykode = mysqli_query($koneksi, "SELECT kodebarang FROM barang WHERE id = $id");
$ambilkode = mysqli_fetch_assoc($querykode);
$kodebarang = $ambilkode["kodebarang"];

$iduser = $_SESSION["iduser"];



$queryuser= mysqli_query($koneksi, "SELECT name FROM users WHERE iduser = $iduser");
$ambiluser = mysqli_fetch_assoc($queryuser);
$user = $ambiluser["name"];


$result = "INSERT INTO transaksi (iduser, name, kodetransaksi, jumlah, kodebarang, namabarang, alamat) 
                                    VALUES ($iduser, '$user', '$newkodetransaksi', '$jumlah', '$kodebarang', '$ambilnamabarang', '$alamat')";

if (mysqli_query($koneksi, $result)) {


    header("location:dashboard.php?pesan=barang-berhasil-ditambahkan");
 
            

} else {
      echo "gagal menambahkan : " . mysqli_error($koneksi);
}



?>