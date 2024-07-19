<?php
session_start();
if (!isset($_SESSION['sedang-login'])) {
    header('Location: login_admin.php');
    exit;
}

include('config.php');
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama_produk'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    // Mengambil informasi file yang diunggah
    $gambar = $_FILES['gambar']['name'];
    $tmp_name = $_FILES['gambar']['tmp_name'];
    $target_dir = "../image/";

    // Mendapatkan ekstensi file
    $ext = strtolower(pathinfo($gambar, PATHINFO_EXTENSION));

    // Daftar tipe file yang diizinkan (file gambar)
    $allowed_extensions = array('jpg', 'jpeg', 'png');

    // Memeriksa apakah ekstensi file yang diunggah termasuk dalam daftar tipe yang diizinkan
    if (in_array($ext, $allowed_extensions)) {
        // Membuat penamaan file dengan format "time_namafile"
        $nama_file_baru = time() . '_' . $gambar;
        $target_file = $target_dir . $nama_file_baru;

        // Memindahkan file yang diunggah ke folder tujuan
        move_uploaded_file($tmp_name, $target_file);

        // Memeriksa apakah produk dengan nama yang sama sudah ada dalam database
        $query_cek_produk = "SELECT * FROM produk WHERE nama = '$nama'";
        $result_cek_produk = mysqli_query($koneksi, $query_cek_produk);
        if (mysqli_num_rows($result_cek_produk) > 0) {
            $_SESSION['namasama'] = true;
            header('Location: produk.php');
            exit;
        } 
        else {
            $query_tambah = "INSERT INTO produk VALUES('', '$kategori', '$nama', '$harga', '$nama_file_baru', '$deskripsi')";
            $tambah = mysqli_query($koneksi, $query_tambah);

            $_SESSION['tertambah'] = true;
            header('Location: produk.php');
            exit;
        }
    } else {
        $_SESSION['namasama'] = true;
        header('Location: produk.php');
        exit;
    }
}
?>
