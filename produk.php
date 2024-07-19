<?php
include('koneksi.php');

$q_kategori = mysqli_query($con, "SELECT * FROM kategori");
if(!isset($_GET['kategori'])){
    $q_produk   = mysqli_query($con, "SELECT * FROM produk");
}
else{
    $id_kategori    = $_GET['kategori'];
    if($id_kategori == "") {
        $q_produk   = mysqli_query($con, "SELECT * FROM produk");
    } else {
        $q_produk   = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id = '$id_kategori'");
    }
}

if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $q_produk = mysqli_query($con, "SELECT * FROM produk WHERE nama LIKE '%$keyword%'");
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Produk</title>
    <?php include 'header.html'; ?>
</head>

<header>
    <?php include('navbar.php'); ?>
</header>

<body>

    <div class="container-fluid banner-produk d-flex align-items-center">
        <div class="container">
            <h1 class="text-white text-center" style="font-family: 'Montserrat', sans-serif;
font-family: 'Satisfy', cursive; font-size: 60px;">Produk</h1>
        </div>
    </div>

    <div class="c-produk">
        <form action="">
            <select name="kategori" id="" style="padding-inline:1rem; background:white;" onchange="this.form.submit()">
                <?php $kategori_terpilih=$_GET['kategori'] ?>
                <option value="#" disabled>--Kategori--</option>
                <option value="">Semua</option>
                <?php while($kategori = mysqli_fetch_assoc($q_kategori)){ ?>
                <option value="<?= $kategori['id_kategori']; ?>"
                    <?php if ($kategori['id_kategori'] == $kategori_terpilih) echo "selected"; ?>>
                    <?= $kategori['nama_kategori']; ?>
                    <?php } ?>
            </select>
        </form>

        <div class="row gy-3 my-3">
            <?php while($produk = mysqli_fetch_assoc($q_produk)){ ?>
            <div class="col-sm-6 col-md-4 col-lg-3" data-aos="zoom-in-up"  >
                <center>
                    <div class="card-lists">
                        <a href="detail_produk.php?detail=<?= $produk['id']; ?>">
                            <article class="cards">
                                <div class="card-images">
                                    <img src="image/<?= $produk['foto']; ?>" alt="<?= $produk['foto']; ?>"
                                        class="g-card">
                                </div>
                                <div class="card-header">
                                    <?= $produk['nama']; ?>
                                </div>
                                <div class="harga"><?= "Rp ". number_format($produk['harga'], 0, ',', '.');; ?></div>
                            </article>
                        </a>
                    </div>
                </center>
            </div>
            <?php }
if(mysqli_num_rows($q_produk) == 0){
    echo "<center><p>Tidak ada produk yang tersedia </p></center>";
} ?>
        </div>
    </div>
    <?php include('footer.php'); ?>

</body>

</html>

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>