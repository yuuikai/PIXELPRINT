<?php

include 'koneksi.php';

$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];

$query_sql = "INSERT INTO users (name, username, password, level) 
                                    VALUES ('$name', '$username', '$password', 'customer')";

if (mysqli_query($koneksi, $query_sql)) {


    header("location:index.php?pesan=daftar berhasil");
 
            

} else {
      echo "Pendaftaran Gagal : " . mysqli_error($koneksi);
}
?>