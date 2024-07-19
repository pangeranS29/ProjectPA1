<?php
session_start();
include('config.php');

if(isset($_GET['id'])){
    $id_produk = $_GET['id'];

    // Periksa apakah produk sudah ada di tabel produk_terlaris
    $check_query = mysqli_query($koneksi, "SELECT * FROM produk_terlaris WHERE id_produk = '$id_produk'");
    if(mysqli_num_rows($check_query) > 0){
        // Jika produk sudah ada, beri pesan error atau lakukan tindakan yang sesuai
        echo '<script>alert("Produk sudah ada dalam daftar produk terlaris");</script>';
    } else {
        // Jika produk belum ada, lakukan insert ke tabel produk_terlaris
        $insert_query = mysqli_query($koneksi, "INSERT INTO produk_terlaris (id_produk) VALUES ('$id_produk')");
        if($insert_query){
            $_SESSION['t-produkterlaris'] = true;
            header('Location: produk_terlaris.php'); // Ganti "index.php" dengan halaman yang sesuai setelah berhasil tambah produk terlaris
            exit;
        } else {
            // Jika terjadi error saat insert, beri pesan error atau lakukan tindakan yang sesuai
            echo '<script>alert("Terjadi kesalahan saat menambahkan produk terlaris");</script>';
        }
    }
} else {
    // Jika parameter ID tidak ditemukan, beri pesan error atau lakukan tindakan yang sesuai
    echo '<script>alert("ID produk tidak ditemukan");</script>';
}
?>
