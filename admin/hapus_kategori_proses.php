<?php 
session_start();
if (!isset($_SESSION['sedang-login'])) {
    header('Location: login_admin.php');
    exit;
}

include('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT gambar_kategori FROM kategori WHERE id_kategori = '$id'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
    $gambar = $row['gambar_kategori'];

    // Delete the image file
    $file_path = '../image/' . $gambar;
    if (file_exists($file_path)) {
        unlink($file_path);
    }

    // Hapus data produk yang terkait dengan kategori
    $queryHapusProduk = "DELETE FROM produk WHERE kategori_id = '$id'";
    $resultHapusProduk = mysqli_query($koneksi, $queryHapusProduk);

    if ($resultHapusProduk) {
        // Hapus data kategori dari database
        $queryHapusKategori = "DELETE FROM kategori WHERE id_kategori = '$id'";
        $resultHapusKategori = mysqli_query($koneksi, $queryHapusKategori);

        if ($resultHapusKategori) {
            $_SESSION['terhapus'] = true;
            header('Location: edit_kategori.php');
            exit;
        } else {
            echo '<script>alert("Gagal menghapus data kategori");</script>';
        }
    } else {
        echo '<script>alert("Gagal menghapus produk yang terkait");</script>';
    }
} else {
    header('Location: edit_kategori.php');
    exit;
}


?>