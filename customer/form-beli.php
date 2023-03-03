<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PixelPrint</title>
    <link rel="stylesheet" type="text/css" href="../css/form-barang.css">
</head>
<body>

    <?php 
	    session_start();
  
	    if($_SESSION['level']==""){
		    header("location:index.php?pesan=gagal");
        }
        
        elseif($_SESSION['level']=="admin"){
		    header("location:index.php?pesan=gagal");
        }
 
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
        include '../koneksi.php';
         $id = $_GET['id'];
         $query_mysql = mysqli_query($koneksi, "SELECT * FROM barang WHERE id='$id'") or die(mysqli_error($koneksi));



         while ($products = mysqli_fetch_array($query_mysql)) {
    ?> 

    <div class="order-form-container">
        <form action="beli-aksi.php?id=<?php echo $products['id']; ?>" method="post" >
            <h2>Order Form</h2>
            <img style="border-radius : 50%;" src="https://via.placeholder.com/80">
                        <h3><?= $products["namabarang"] ?></h3>
                        <p><b>Harga : </b><?= number_format($products["harga"])  ?></p>
                        <p><b>Stok : </b><?= $products["stok"] ?></p>
                        <p><b><center>Deskripsi : </center></b><br></b><?= $products["deskripsi"] ?></p>
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" min="1" step="any" required>
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" required>
            <button type="submit" name="beli">Beli</button>
        </form>
    </div>
<?php
         };
?>


    
    </main>
</body>
</html>
