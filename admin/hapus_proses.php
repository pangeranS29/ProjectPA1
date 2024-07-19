<?php 

session_start();
if (!isset($_SESSION['sedang-login'])) {
    header('Location: login_admin.php');
    exit;
}

include('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the image file name from the database
    $query = "SELECT foto FROM produk WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
    $gambar = $row['foto'];

    // Delete the image file
    $file_path = '../image/' . $gambar;
    if (file_exists($file_path)) {
        unlink($file_path);
    }

    // Delete data from the produk_terlaris table
    $query_terlaris = "DELETE FROM produk_terlaris WHERE id_produk = '$id'";
    $result_terlaris = mysqli_query($koneksi, $query_terlaris);

    // Delete data from the produk table
    $query = "DELETE FROM produk WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result && $result_terlaris) {
        $_SESSION['terhapus'] = true;
        header('Location: produk.php');
        exit;
    } else {
        echo '<script>alert("Gagal menghapus data produk");</script>';
        header('Location: produk.php');
        exit;
    }
} else {
    header('Location: produk_terlaris.php');
    exit;
}


?>