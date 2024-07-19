<?php
session_start();
include('koneksi.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include('PHPMailer/src/PHPMailer.php');
include('PHPMailer/src/SMTP.php');
include('PHPMailer/src/Exception.php');

if (isset($_POST['submit_email'])) {
  $email = $_POST['email'];

  // Check if the email exists in the database
  $query = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($con, $query);


  if (mysqli_num_rows($result) == 1) {
    // Generate OTP
    $otp = mt_rand(100000, 999999);

    // Store the OTP and email in session
    $_SESSION['reset_email'] = $email;
    $_SESSION['otp'] = $otp;


    $email_pengirim   = 'vivadvent@gmail.com';
    $nama_pengirim    = 'Food Mora Toba';
    $email_penerima   = $_POST['email'];
    $subjek           = 'Reset Password akun admin Food Mora Toba';
    $pesan = '<span style="font-size: 25px;">Verifikasi Admin Food Mora Toba</span><br>
    <span style="font-size: 18px;">Hai, <strong>Admin!</strong></span><br><br>
    Gunakan kode ini untuk reset password Anda.<br><br><strong><span style="font-size: 30px;">' . $otp . '</span></strong>';



    // Send the OTP to the user's email
    $mail = new PHPMailer;
    $mail->isSMTP();


    $mail->Host = 'smtp.gmail.com'; // Your SMTP server hostname
    $mail->Username = $email_pengirim; // Your SMTP username
    $mail->Password = 'wbyxegogfutqwxsu'; // Your SMTP password
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPDebug = 2;

    $mail->setFrom($email_pengirim, $nama_pengirim);
    $mail->addAddress($email_penerima);
    $mail->isHTML(true);
    $mail->Subject = $subjek;
    $mail->Body = $pesan;

    $send = $mail->send();

    if($send){
      $_SESSION['konfir_otp']  = true;
      $_SESSION['dikirimkan']  = true;
      header('Location:konfirmasi_otp.php');
      exit;
    }else{
      echo 'Gagal dikirim';
    }
  }else{
    $_SESSION['email_error'] = true;
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" href="../img/logo2.png" type="image/png">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lupa Password</title>
</head>

<body>
  <div class="form">
  <center><img src="../img/logo.png" style="width:100px;" ></center>
  <hr>
    <center>
      <h3>Verifikasi Email <i class="fa-regular fa-envelope fa-lg"></i></h3>
    </center>
    <hr>
    <br>
    <?php if(isset($_SESSION['email_error'])){ ?>
    <div style="background-color: #F6D9D8; color:#6E211E; padding:1rem;" class="mb-2">
      Email tidak sesuai. Coba lagi!
    </div>
    <?php unset($_SESSION['email_error']); } ?>
    <form action="lupa_password.php" method="POST">
    <p>Kirimkan kode OTP ke email anda:</p>
      <div class="form-floating">
        <input type="email" class="form-control mb-2 " name="email" id="floatingInputGroup1" placeholder="Nama" required>
        <label for="floatingInputGroup1"><i class="fa-solid fa-envelope"></i>&nbsp;Email </label>
      </div>
      <input type="submit" name="submit_email" class="btn btn-success form-control mb-2 p-3 " value="Kirim">
      <center><a href="login_admin.php">Kembali</a></center>
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
    background: linear-gradient(to bottom, orangered, orange);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    background-attachment: fixed;
    padding: 20px;
    overflow-x: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .form {
    background-color: whitesmoke;
    padding-inline: 2rem;
    padding-block: 3rem;
    border-radius: 1rem;
    width: 33%;
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