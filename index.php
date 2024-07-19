<?php
 include "koneksi.php";

 $q_kategori = mysqli_query($con, "SELECT * FROM kategori");
 $q_produk_terlaris   = mysqli_query($con, 
 "SELECT * FROM produk p
 INNER JOIN produk_terlaris pt
 ON p.id = pt.id_produk");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Beranda</title>
  <?php include('header.html'); ?>
</head>

<header>
  <?php include "navbar.php"; ?>
</header>

<body>


  <div class="container-fluid banner d-flex align-items-center">
    <div class="container text-center text-white">
      <center>
        <h1 style="font-family: 'Montserrat', sans-serif;font-family: 'Satisfy', cursive; font-size: 60px;">Toko Online
          Food Mora Toba</h1>
        <h3 style="font-family: 'Montserrat', sans-serif;
font-family: 'Satisfy', cursive; ">Mau cari apa ?</h3>

        <div class="col-8 t-search">
          <form action="produk.php" method="GET">
            <div class="input-group input-group-lg">
              <input type="text" class="form-control i-cari" placeholder="Cari Produk" aria-label="Recipient's username"
                aria-describedby="basic-addon2" name="keyword" style="border-radius:0rem;">
              <button class="btn b-cari" style="border-radius: 0rem;">Telusuri</button>
            </div>
          </form>
        </div>
    </div>
    </center>
  </div>


  <!-- Food Mora Toba About -->

  <br>
  <!-- highlighted kategori -->
  <section id="kategori" class="mt-2">

    <center>
      <h3>Kategori</h3>
    </center>

    <div class="row gy-3 my-3 justify-content-center ">
      <?php while($kategori = mysqli_fetch_assoc($q_kategori)){ ?>
      <div class="col-sm-6 col-md-4 col-lg-3 mt-2 ml-5 mb-2" style="width:28%; min-width: 18rem; ">
        <a href="produk.php?kategori=<?= $kategori['id_kategori']; ?>" class="card ">
          <div>
            <img src="image/<?= $kategori['gambar_kategori']; ?>" alt="<?= $kategori['gambar_kategori']; ?>"
              class="card__img">
          </div>
          <span class="card__footer">
            <center>
              <h5><?= $kategori['nama_kategori']; ?></h5>
            </center>
          </span>
        </a>
      </div>
      <?php } ?>
    </div>



    </div>
  </section>

  <!-- Produk -->
  <!-- BATAS -->
  <div id="produk_terlaris"></div>
  <!-- BATAS -->
  <div class="container-fluid py-5" data-aos="fade-up" data-aos-duration="900">
    <div class="container text-center">
      <h3>Produk Terlaris </h3>
      <div class="row gy-3 my-3">
        <?php while($produk = mysqli_fetch_assoc($q_produk_terlaris)){ ?>
        <div class="col-sm-6 col-mb-4 col-lg-4 ">
          <center>
            <div class="card-lists">
              <a href="detail_produk.php?detail=<?= $produk['id']; ?>">
                <article class="cards">
                  <div class="card-images">
                    <img src="image/<?= $produk['foto']; ?>" alt="<?= $produk['foto']; ?>" class="g-card">
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
        <?php } ?>
      </div>
    </div>
  </div>
  <br>
  <br>
</body>
<footer>
  <?php include('footer.php'); ?>
</footer>

</html>

<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init();
</script>

<style>
    .card {
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;
    overflow: hidden;
  }


  .card__footer {
    width: 100%;
    padding: 7px;
    background-color: #f0f0f0;
    text-align: center;
  }
</style>