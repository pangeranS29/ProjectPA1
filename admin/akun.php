<?php
session_start();
if(!isset($_SESSION['sedang-login'])){
  header('Location: login_admin.php');
  exit;
}

include('sidebar.php');
include('config.php');
$query = mysqli_query($koneksi, 'SELECT * FROM users WHERE id = 1');
$users = mysqli_fetch_assoc($query);

if (isset($_POST['edit'])) {
  $editMode = true;
} else {
  $editMode = false;
}

if (isset($_POST['save'])) {
  $email = $_POST['email'];
  $telepon = $_POST['telepon'];
  
  // Proses penyimpanan perubahan data ke dalam tabel 'users'
  $updateQuery = "UPDATE users SET email='$email', telepon='$telepon' WHERE id = 1";
  $result = mysqli_query($koneksi, $updateQuery);
  $_SESSION['teredit'] = true;
  header('location:akun.php');
  exit;
  
  if ($result) {
    // Jika berhasil menyimpan perubahan
    $editMode = false;
  } else {
    // Jika terjadi kesalahan dalam penyimpanan
    echo "Terjadi kesalahan dalam penyimpanan perubahan.";
  }
}

?>

<?php if (isset($_SESSION['teredit'])): ?>
<div class="edit-data" data-editdata="<?php echo $_SESSION['teredit']; ?>"></div>
<?php unset($_SESSION['teredit']); endif; ?>

<h1>Akun</h1>
</div>

<!-- CONTENT -->
<center> <h1>Data akun</h1> </center>
<br>

<form action="" method="post">

  <div class="mb-3">
    <div class="form-floating">
      <input type="email" class="form-control" value="<?= $users['email']; ?>" name="email" id="floatingInputGroup1" placeholder="Email" <?= $editMode ? '' : 'readonly'; ?>>
      <label for="floatingInputGroup1"><i class="fa-solid fa-envelope"></i>&nbsp;Email</label>
    </div>
  </div>

  <div class="mb-3">
    <div class="form-floating">
    <input type="text" class="form-control" value="<?= $users['telepon']; ?>" name="telepon" id="floatingInputGroup2" placeholder="Telepon" <?= $editMode ? '' : 'readonly'; ?> pattern="\d{13}" maxlength="13" required>
      <label for="floatingInputGroup2"><i class="fa-solid fa-phone"></i>&nbsp;Telepon</label>
    </div>
    <font style="color:#333; font-size:14px;" >Menggunakan format 13 digit. Contoh: 6281234567890</font>
  </div>

  <?php if ($editMode) : ?>
    <div style="display:flex;">
      <button class="btn btn-success" name="save"><i class="fa-solid fa-floppy-disk"></i>&nbsp; Simpan Perubahan</button>&nbsp;
      <button class="btn btn-danger" name="cancel"><i class="fa-solid fa-xmark"></i>&nbsp;Batal</button>
    </div>
  <?php else : ?>
    <div style="display:flex;">
      <button class="btn btn-primary" name="edit"><i class="fas fa-pencil-square" ></i>&nbsp;Edit</button>
    </div>
  <?php endif; ?>
</form>

<!-- AKHIR CONTENT -->

</div>
</div>
</div>
</div>
</div>

</body>
</html>

<title>Akun</title>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
  $(document).ready(function () {
    $("#menu-toggle").click(function (e) {
      e.preventDefault();
      $("#wrapper").toggleClass("menuDisplayed");
    });
  });

  $(document).ready(function() {
  const editdata = $('.edit-data').data('editdata');
  if (editdata) {
    Swal.fire({
      icon: 'success',
      title: 'Berhasil',
      text: 'Data akun berhasil diubah'
    });
  }
});



</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

