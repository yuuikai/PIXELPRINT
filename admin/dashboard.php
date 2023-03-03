<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PixelPrint</title>
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    
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
                <a href="form-barang.php">Tambah Barang</a>
                <a href="katalog-barang.php">Katalog</a>
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
                <a href="katalog-barang.php" class="hero-section-button">Mulai Belanja</a>
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

                        <div class="btn-area">
                            <a href="form-update.php?id=<?php echo $products['id']; ?>" class="btn-add">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ff4e50" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg>

                                <p>Edit</p>
                            </a>

                            <a href="../hapus-barang.php?id=<?php echo $products['id']; ?>" action="../hapus-barang.php" method='post' href="" class="btn-erase">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                </svg>

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