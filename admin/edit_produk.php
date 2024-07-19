<?php 
session_start();
if(!isset($_SESSION['sedang-login'])){
    header('Location: login_admin.php');
    exit;
  }
?>

<?php if (isset($_SESSION['namasama'])): ?>
<div class="nama-sama" data-namasama="<?php echo $_SESSION['namasama']; ?>"></div>
<?php unset($_SESSION['namasama']); endif; ?>

<?php if (isset($_SESSION['tipe-gambar'])): ?>
<div class="gagal-data" data-gagaldata="<?php echo $_SESSION['tipe-gambar']; ?>"></div>
<?php unset($_SESSION['tipe-gambar']); endif; ?>

<?php
include('config.php');
$id_produk  = $_GET['id'];
$q_produk   = mysqli_query($koneksi, "SELECT * FROM produk WHERE id='$id_produk'");
$produk     = mysqli_fetch_assoc($q_produk);
$q_kategori = mysqli_query($koneksi, "SELECT * FROM kategori");

?>
<?php include('sidebar.php'); ?>
<h1>Edit produk</h1>

                        </div>
                        <center >
                                <h1 class="title">Produk <?= $produk['nama']; ?> </h1>
                                <br>
                            </center>
                        <!-- CONTENT -->
                        
                        <nav class="breadcrumbs">
                            <a href="index.php" class="breadcrumbs__item">Dasbor</a>
                            <a href="produk.php" class="breadcrumbs__item">Produk</a> 
                            <a href="#cart" class="breadcrumbs__item is-active">Edit Produk</a>
                            </nav>

                        <form style="padding-inline:2rem;" method="POST" action="edit_produk_proses.php" enctype="multipart/form-data">
                                <input type="hidden" class="form-control" value="<?= $produk['id']; ?>" name="id" readonly ><br>

                            <div class="mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" value="<?= $produk['nama']; ?>" name="nama" id="floatingInputGroup1" placeholder="Nama">
                                    <label for="floatingInputGroup1">Nama produk</label>
                                </div>
                            </div>
                       

                            <div class="mb-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Rp.</span>
                                <div class="form-floating">
                                <input type="number" class="form-control" value="<?= $produk['harga']; ?>" name="harga" id="floatingInputGroup1" placeholder="Harga" min="1000">
                                    <label for="floatingInputGroup1">Harga</label>
                                </div>
                            </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="kategori">Kategori: </label>
                            <select class="form-select" aria-label="Default select example" name="kategori" >
                            <option disabled>-- Pilih kategori --</option>
                                <?php $kategori_terpilih=$produk['kategori_id']; ?>
                                     <?php while ($baris = mysqli_fetch_assoc($q_kategori)) { ?>
                                    <option value="<?= $baris['id_kategori']; ?>" <?php if ($baris['id_kategori'] == $kategori_terpilih) echo "selected"; ?>>
                                      <?= $baris['nama_kategori']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Gambar:</label><br>
                                <div style="display:flex; align-items: center;">
                                    <img id="preview-gambar" src="../image/<?php echo $produk['foto']; ?>" alt="<?php echo $produk['foto']; ?>" style="width:60px;">
                                    &nbsp;<span id="gambar-nama"><?= $produk['foto']; ?></span>
                                </div>
                                <input type="file" name="gambar" class="form-control" accept=".jpg, .jpeg, .png" id="input-gambar">
                            </div>

                            <div class="mb-3">
                            <div class="form-floating">
                            <textarea name="deskripsi" class="form-control" placeholder="Keterangan" id="floatingTextarea" style="height: 150px;text-align: justify;"><?= $produk['detail']; ?></textarea>
                            <label for="floatingTextarea">Keterangan</label>
                            </div>
                            </div><br>
                            
                            <button type="submit" class="btn btn-primary" ><i class="fa-regular fa-floppy-disk"></i>&nbsp;Simpan perubahan</button>
                            <a href="produk.php" class="btn btn-danger"><i class="fa-solid fa-xmark"></i>&nbsp;Batal</a>
                        </form>

                        <!-- AKHIR CONTENT -->

                    </div>
                </div>
            </div>
        </div>
    </div>



</body>
<title>Edit produk</title>
</html>
<script>
    // SIDEBAR
    $(document).ready(function () {
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("menuDisplayed");
        });
    });

    $(document).ready(function () {
        $('#input-gambar').change(function (event) {
            var input = event.target;
            var reader = new FileReader();

            reader.onload = function () {
                $('#preview-gambar').attr('src', reader.result);
                $('#gambar-nama').text(input.files[0].name);
            }

            reader.readAsDataURL(input.files[0]);
        });
    });

    $(document).ready(function() {
        const gagaldata = $('.gagal-data').data('gagaldata');
        if (gagaldata) {
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: "Tipe file yang diunggah harus berupa gambar (JPEG, PNG, atau JPG)"
            });
        }

        const namasama = $('.nama-sama').data('namasama');
            if (namasama) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Nama produk sudah digunakan'
                });
            }
    });
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<style>
    a{
        text-decoration: none;
    }
</style>