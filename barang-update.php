<?php

include 'koneksi.php';

$char = 'PXL';
$query=mysqli_query($koneksi,"SELECT max(kodebarang) as max_kode FROM barang 
    WHERE kodebarang LIKE '{$char}%' ORDER BY kodebarang DESC LIMIT 1");
$data = mysqli_fetch_array($query);
$kodeBarang = $data['max_kode'];
$no = substr($kodeBarang, -3, 3);
 $no = (int) $no; 
 $no += 1;
$newkodebarang = $char . sprintf("%03s", $no);
$namabarang = $_POST['namabarang'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$img = $_FILES['img']['name'];
$img_tmp = $_FILES['img']['tmp_name'];
$sql = "SELECT kodebarang, namabarang, harga, stok FROM barang";


$id = $_GET['id'];


if (mysqli_query($koneksi,"UPDATE barang SET namabarang='$namabarang', harga='$harga', deskripsi ='$deskripsi' where id='$id'")
) {
    header("location:admin/katalog-barang.php?pesan=update-barang-berhasil");
}


?>