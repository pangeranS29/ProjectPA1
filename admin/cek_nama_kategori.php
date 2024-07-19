<?php
include('config.php'); // Menggantikan 'config.php' dengan file konfigurasi database Anda

if(isset($_POST['nama_kategori'])) {
    $namaKategori = $_POST['nama_kategori'];

    // Lakukan query pengecekan nama kategori
    $query = "SELECT COUNT(*) FROM kategori WHERE nama_kategori = '$namaKategori'";
    $result = mysqli_query($koneksi, $query);
    $count = mysqli_fetch_row($result)[0];

    if($count > 0) {
        echo 'exist'; // Nama kategori sudah ada
    } else {
        echo 'not_exist'; // Nama kategori belum ada
    }
}
?>
