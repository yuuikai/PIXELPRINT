<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PixelPrint</title>
    <link rel="stylesheet" type="text/css" href="../css/customer.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
</head>

<body>

    <?php

    include '../koneksi.php';

    session_start();
    $iduser = $_SESSION["iduser"];

    if ($_SESSION['level'] == "") {
        header("location:../index.php?pesan=gagal");
    }


    ?>

    <?php


    $sql = "SELECT * FROM transaksi INNER JOIN barang ON transaksi.kodebarang = barang.kodebarang WHERE transaksi.iduser = $iduser";
    $result = $koneksi->query($sql);
    ?>

    <header>
        <nav class="navbar">
            <div class="menu">
                <a href="dashboard.php">PixelPrint</a>
                <a href="katalog.php">Katalog</a>
                <a href="transaksi.php">Transaksi</a>
            </div>

            <div class="right-menu">

                <p>Halo,           <b><?= $_SESSION['username'];?>!</b></p>

                <a class="logout-btn" href="../logout.php">Logout</a>

            </div>
        </nav>
    </header>
    <main>

        <?php
         if ($result->num_rows > 0) {
             echo "<table class='table table-bordered'>
             <tr>
             <th>Kode</th>
             <th>Produk</th>
             <th>Harga</th>
             <th>Jumlah</th>
             <th>Status</th>
             </tr>";
             // output data of each row
             while($row = $result->fetch_assoc()) {
                 echo "<tr><td>" . $row["kodebarang"]. "</td><td>" . $row["namabarang"]. "</td><td>" . $row["harga"]. "</td><td>" . $row["jumlah"]. "</td><td>" . $row["stok"]. "</td></tr>";
             }
             echo "</table>";
         } else {
             echo "0 results";
         }
         $koneksi->close();
        ?>

        <section id="aboutus" class="about-us-section">
            <h2 class="sub-title">About Us</h2>
            <p>Kami adalah penyedia printer bekas paling terpercaya di Indonesia <br> yang juga memiliki dukungan sistem dan customer service yang baik.</p>
            <p>Copyright ©2023 PixelPrint</p>
        </section>
    </main>
</body>

</html>