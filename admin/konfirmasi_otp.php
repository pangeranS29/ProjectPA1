<?php
session_start();


if(isset($_SESSION['konfir_otp']) && $_SESSION['konfir_otp'] === true) {
  if(isset($_POST['submit_otp'])) {
    $input_otp = $_POST['otp'];
    $stored_otp = $_SESSION['otp'];

    if($input_otp == $stored_otp) {
      // Kode OTP sesuai, arahkan ke halaman reset password
      $_SESSION['ganti_password'] = true;
      unset($_SESSION['konfir_otp']);
      header('Location: reset_password.php');
      exit;
    } else {
      // Kode OTP tidak sesuai, tampilkan pesan error
      $error_message = 'Kode OTP tidak sesuai. Silakan coba lagi.';
    }
  }
} else {
  header('Location: saas.php');
  exit;
}
?>

<?php if (isset($_SESSION['dikirimkan'])): ?>
<div class="nama-sama" data-namasama="<?php echo $_SESSION['dikirimkan']; ?>"></div>
<?php unset($_SESSION['dikirimkan']); endif; ?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="../img/logo2.png" type="image/png">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi OTP</title>
</head>
<body>
    <div class="form" >
    <center><img src="../img/logo.png" style="width:100px;" ></center>
  <hr>
<center><h2>Konfirmasi OTP</h2></center>
<hr>
<br>
    <?php if(isset($error_message)){ ?>
        <div style="background-color: #F6D9D8; color:#6E211E; padding:1rem;" class="mb-2" >
        <?php echo $error_message; ?>
        </div>
    <?php } ?>
    <form action="konfirmasi_otp.php" method="POST">
      Masukkan kode OTP
        <div class="form-floating">
        <input type="number" class="form-control mb-2 " name="otp" id="floatingInputGroup1" placeholder="OTP">
        <label for="floatingInputGroup1">Masukkan OTP</label>
        </div> 

        <input type="submit" class="btn btn-success form-control p-3 "  name="submit_otp" value="Verifikasi">
    </form>
    </div>
</body>
</html>

<style>
    *{
  font-family: 'Montserrat', sans-serif;
}
    body {
  margin: 0;
  padding: 0;
  color: #222222;
  background:linear-gradient(to bottom, orangered, orange);
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  background-attachment: fixed;
  padding: 20px;
  overflow-x: hidden;
  display: flex;
  justify-content: center;
}

.form{
  background-color: whitesmoke;
  padding-inline: 3rem;
  padding-block: 3rem;
  border-radius: 1rem;
  width: 33%;
  height: fit-content;
  -webkit-box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1),
    0 10px 10px -5px rgba(0, 0, 0, 0.04);
  box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3),
    0 10px 10px -5px rgba(0, 0, 0, 0.2);
}

@media(max-width:962px){
    .form{
      width: 70%;
    }
  }

  @media(max-width:602px){
    .form{
      width: 80%;
    }
  }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    $(document).ready(function() {
        const namasama = $('.nama-sama').data('namasama');
        if (namasama) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Kode OTP sudah dikirimkan ke email anda. Silahkan masukkan kode OTP pada form ini',
                footer: '<a href="http://gmail.com" target="_blank">Lihat Email</a>'
            });
        }
    });
</script>



