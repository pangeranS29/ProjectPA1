<?php

include('config.php');

$nama_produk = $_POST['nama_produk'];

// Query untuk memeriksa apakah nama_produk sudah digunakan
$query = "SELECT * FROM produk WHERE nama = '$nama_produk'";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {
  // Jika nama_produk sudah digunakan
  echo 'used';
} else {
  // Jika nama_produk tersedia
  echo 'available';
}

// Tutup koneksi database

?>
