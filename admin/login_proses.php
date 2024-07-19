<?php
// memulai session
session_start();

// menyertakan file koneksi ke database
require_once('config.php');

// jika form login disubmit
if (isset($_POST['login'])) {
    // mengambil nilai input dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // mencari user berdasarkan username dan password
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $query);

    // jika ditemukan user dengan username dan password yang sesuai
    if (mysqli_num_rows($result) == 1) {
        // menyimpan data user ke session
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['sedang-login'] = true;
        header('Location: index.php');
        exit;
    } else {
        // menampilkan pesan kesalahan
        $_SESSION['gagal'] = true;
        header('Location: login_admin.php');
        exit;
    }
}else{
    echo 'gagal';
}
?>
