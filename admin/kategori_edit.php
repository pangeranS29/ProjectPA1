<?php 
session_start();
if(!isset($_SESSION['sedang-login'])){
    header('Location: login_admin.php');
    exit;
  } ?>

<?php if (isset($_SESSION['namasama'])): ?>
<div class="nama-sama" data-namasama="<?php echo $_SESSION['namasama']; ?>"></div>
<?php unset($_SESSION['namasama']); endif; ?>

<?php if (isset($_SESSION['tipe-gambar'])): ?>
<div class="gagal-data" data-gagaldata="<?php echo $_SESSION['tipe-gambar']; ?>"></div>
<?php unset($_SESSION['tipe-gambar']); endif; ?>


<?php
include('config.php');
$id_kategori  = $_GET['id'];
$q_produk   = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori='$id_kategori'");
$produk     = mysqli_fetch_assoc($q_produk);
$q_kategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori='$id_kategori'");
$kategori     = mysqli_fetch_assoc($q_kategori);
?>

<?php include('sidebar.php'); ?>
<h1>Edit kategori</h1>
</div>
<!-- CONTENT -->
<center>
    <h1 class="title">Kategori <?= $kategori['nama_kategori']; ?></h1>
    <br>
</center>
<nav class="breadcrumbs mb-1 ">
    <a href="index.php" class="breadcrumbs__item">Dasbor</a>
    <a href="edit_kategori.php" class="breadcrumbs__item">Kategori</a>
    <a href="kategori_edit.php" class="breadcrumbs__item is-active">Edit Kategori</a>
</nav>
<br>

<form style="padding-inline:2rem;" method="POST" action="edit_kategori_proses.php" enctype="multipart/form-data">
    <div class="mb-3">
        <input type="hidden" class="form-control" value="<?= $kategori['id_kategori']; ?>" name="id" readonly><br>
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nama</label>
        <input type="text" class="form-control" value="<?= $kategori['nama_kategori']; ?>" name="nama"><br>
    </div>

    <label class="form-label">Gambar</label>
    <div style="display:flex; align-items: center;">
        <img id="preview-gambar" src="../image/<?php echo $kategori['gambar_kategori']; ?>"
            alt="<?php echo $kategori['gambar_kategori']; ?>" style="width:60px;">
        &nbsp;<span id="gambar-nama"><?= $kategori['gambar_kategori']; ?></span>
    </div>
    <div class="mb-3">
        <input type="file" id="input-gambar" name="gambar" accept=".jpg, .jpeg, .png">
    </div>


    <button type="submit" class="btn btn-primary" ><i class="fa-regular fa-floppy-disk"></i>&nbsp;Simpan perubahan</button>
    <a href="edit_kategori.php" class="btn btn-danger"><i class="fa-solid fa-xmark"></i>&nbsp;Batal</a>
</form>

<!-- AKHIR CONTENT -->

</div>
</div>
</div>
</div>
</div>



</body>

<title>Edit kategori</title>

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

    $(document).ready(function () {
        const gagaldata = $('.gagal-data').data('gagaldata');
        if (gagaldata) {
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Gagal melakukan update. Tipe file yang diunggah harus berupa gambar (JPEG, PNG, atau JPG).'
            });
        }

        const namasama = $('.nama-sama').data('namasama');
            if (namasama) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Nama kategori sudah digunakan'
                });
            }
    });
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<style>
    a {
        text-decoration: none;
    }
</style>