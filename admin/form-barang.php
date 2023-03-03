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
        
        elseif($_SESSION['level']=="customer"){
		    header("location:index.php?pesan=gagal");
        }
 
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
    <div class="order-form-container">
    <form action="../barang-aksi.php" method="post" >
        <h2>Order Form</h2>
        <label for="namabarang">Nama Barang</label>
        <input type="text" name="namabarang" required>
        <label for="harga">Harga</label>
        <input type="number" name="harga" min="1" step="any" required>

        <label for="deskripsi">Deskripsi</label>
        <input type="text" name="deskripsi" required>
        <button type="submit" name="tambah">Tambah</button>
    </form>
</div>

    
    </main>
</body>
</html>
