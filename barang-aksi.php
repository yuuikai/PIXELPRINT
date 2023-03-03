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


$sql = "SELECT * FROM barang";


$result = "INSERT INTO barang (kodebarang, namabarang, harga, stok, deskripsi) 
                                    VALUES ('$newkodebarang', '$namabarang', '$harga', 'tersedia', '$deskripsi')";

if (mysqli_query($koneksi, $result)) {


    header("location:admin/dashboard.php?pesan=barang-berhasil-ditambahkan");
 
            

} else {
      echo "gagal menambahkan : " . mysqli_error($koneksi);
}



?>