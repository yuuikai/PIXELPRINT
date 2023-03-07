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

    if ($_SESSION['level'] == "") {
        header("location:../index.php?pesan=gagal");
    }



    ?>

    <?php


    $sql = "SELECT * FROM transaksi INNER JOIN barang ON transaksi.kodebarang = barang.kodebarang WHERE status = 0";
    $result = $koneksi->query($sql);


    if (isset($_POST["konfirmasi"])) {
        $id = $_GET["id"];
        $sql = "UPDATE transaksi SET status = 2 WHERE kodetransaksi='$id'";


        if (mysqli_query($koneksi, $sql)) {
            header("location:transaksi.php?p=Berhasil_melakukan_konfirmasi_transaksi");
        }
    }

    if (isset($_POST["tolak"])) {
        $id = $_GET["id"];
        $sql = "UPDATE transaksi SET status = 1 WHERE kodetransaksi='$id'";

        if (mysqli_query($koneksi, $sql)) {
            header("location:transaksi.php?p=Berhasil_menolak_transaksi");
        }
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

                <p>Halo, <b><?= $_SESSION['username']; ?>!</b></p>

                <a class="logout-btn" href="../logout.php">Logout</a>

            </div>
        </nav>
    </header>
    <main class="p-5">

        <?php

        if ($result->num_rows > 0) { ?>
            <table class='table table-bordered'>
                <thead class='thead-light'>
                <tr>
                    <th>Kode</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Pembeli</th>
                    <th>Konfirmasi</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()) {

                    $kodebarang2 = $row["kodebarang"];
                    $kodetransaksi2 = $row["kodetransaksi"]; ?>

                    <tr>
                        <td><?= $row["kodetransaksi"] ?></td>
                        <td><?= $row["namabarang"] ?> </td>
                        <td><?= number_format( $row["harga"]) ?> </td>
                        <td> <?= $row["jumlah"] ?> </td>
                        <td> <?= number_format($row["harga"] * $row["jumlah"]) ?> </td>
                        <td> <?= $row["name"] ?></td>
                        <td>

                            <form action='?id=<?= $kodetransaksi2 ?>' method='post'>
                                <!-- <input type='hidden' name='kodebarang' value='<?= $kodebarang2; ?>'> -->

                                <button type='submit' name="konfirmasi" class='mr-2 btn btn-primary'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check-lg' viewBox='0 0 16 16'>
                                        <path d='M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z' />
                                    </svg></button>


                                <button type='submit' name="tolak" class='btn btn-outline-danger'>

                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x-lg' viewBox='0 0 16 16'>
                                        <path d='M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z' />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>


                <?php } ?>

                </thead>
            </table>
        <?php } else {
            echo "0 results";
        }







        $koneksi->close();
        ?>





        
    </main>

    <section id="aboutus" class="about-us-section">
            <h2 class="sub-title">About Us</h2>
            <p>Kami adalah penyedia printer bekas paling terpercaya di Indonesia <br> yang juga memiliki dukungan sistem dan customer service yang baik.</p>
            <p>Copyright ©2023 PixelPrint</p>
        </section>

    <script>
        $('#myModal').on('shown.bs.modal', function() {
            $('#myInput').trigger('focus')
        })
    </script>
</body>

</html>