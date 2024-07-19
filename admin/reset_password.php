<?php 

session_start();

?>

<?php 
if(!isset($_SESSION['ganti_password'])){
    header('Location:konfirmasi_otp');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="../img/logo2.png" type="image/png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <div class="form" >
        <center><h3>Atur ulang kata sandi&nbsp;<i class="fa-sharp fa-solid fa-lock"></i></h3></center>
<br>
        <?php
if(isset($_SESSION['konfirsalah'])){
    ?>
    <div style="background-color: #F6D9D8; color:#6E211E; padding:1rem;" class="mb-2">
        Konfirmasi password gagal. Coba lagi!
    </div>
    <?php
    unset($_SESSION['konfirsalah']);
}
?>


    <form action="reset_proses.php" method="POST"   >
        <div class="mb-2" >
        <div>Password baru:</div>
        <input type="password"  class="form-control" name="new_password" id="new_password" required placeholder="Masukkan password baru" >
        </div>
        <div class="mb-2">
        <div>Konfirmasi Password:</div>
        <input type="password"  class="form-control" name="confirm_password" id="confirm_password" required placeholder="Masukkan ulang password baru" >
        </div>
        <input type="submit" name="submit_password" class="btn btn-success form-control p-3 " value="Reset Password">
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