<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PixelPrint</title>
    <link rel="stylesheet" type="text/css" href="../css/customer.css">
    
</head>

<body>

    <?php

    include '../koneksi.php';


    session_start();

    if ($_SESSION['level'] == "") {
        header("location:../index.php?pesan=gagal");
    }


    ?>

    <?php


    $sql = "SELECT * FROM barang ORDER BY tanggal DESC LIMIT 3" ;
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
        <section class="hero-section">
            <div class="hero-section-text">
                <p>Selamat datang kembali <b><?php echo $_SESSION['username']; ?></b>.
                <p>
                <h1>Selamat datang di PixelPrint</h1>
                <p>Toko jual beli printer bekas terpercaya.</p>
                <a href="katalog.php" class="hero-section-button">Mulai Belanja</a>
            </div>
        </section>
        <?php
        // if ($result->num_rows > 0) {
        //     echo "<table><tr><th>Kode</th><th>Produk</th><th>Harga</th><th>Stok</th></tr>";
        //     // output data of each row
        //     while($row = $result->fetch_assoc()) {
        //         echo "<tr><td>" . $row["kodebarang"]. "</td><td>" . $row["namabarang"]. "</td><td>" . $row["harga"]. "</td><td>" . $row["stok"]. "</td></tr>";
        //     }
        //     echo "</table>";
        // } else {
        //     echo "0 results";
        // }
        // $koneksi->close();
        ?>
        <section id="produk" class="featured-products-section">
            <h2>Barang Terbaru</h2>
            <div class="featured-products-container">
                
            
                <?php

                while ($products = $result->fetch_assoc()) {
                ?>
                    <div class="featured-product">
                        <img style="border-radius : 50%;" src="https://via.placeholder.com/80">
                        <h3><?= $products["namabarang"] ?></h3>
                        <p><b>Harga : </b><?= number_format($products["harga"])  ?></p>
                        <p><b>Stok : </b><?= $products["stok"] ?></p>

                        <div name="checkout" class="btn-area">
                            <a href="form-beli.php?id=<?php echo $products['id']; ?>" class="btn-add">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ff4e50" class="bi bi-bag" viewBox="0 0 16 16">
                                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                            </svg>

                                <p>Beli</p>
                            </a>

                        </div>


                    </div>
                <?php }; ?>

            </div>
        </section>
        <section id="aboutus" class="about-us-section">
            <h2 class="sub-title">About Us</h2>
            <p>Kami adalah penyedia printer bekas paling terpercaya di Indonesia <br> yang juga memiliki dukungan sistem dan customer service yang baik.</p>
            <p>Copyright ©2023 PixelPrint</p>
        </section>
    </main>
</body>

</html>