<?php
session_start();
if (!isset($_SESSION['sedang-login'])) {
    header('Location: login_admin.php');
    exit;
}

include('config.php');
if (isset($_POST['tambah'])) {
    $nama_kategori = $_POST['nama_kategori'];

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

        // Periksa apakah nama kategori sudah digunakan
        $sql_cek_nama = "SELECT * FROM kategori WHERE nama_kategori = '$nama_kategori'";
        $result_cek_nama = mysqli_query($koneksi, $sql_cek_nama);
        if (mysqli_num_rows($result_cek_nama) > 0) {
            $_SESSION['namasama'] = true;
            header('Location: edit_kategori.php');
            exit;
        }

        $query_tambah = "INSERT INTO kategori VALUES('', '$nama_kategori', '$nama_file_baru')";

        $tambah = mysqli_query($koneksi, $query_tambah);

        $_SESSION['tertambah'] = true;
        header('Location: edit_kategori.php');
        exit;
    } else {
        $_SESSION['gagaldata'] = true;
        header('Location: edit_kategori.php');
        exit;
    }
}
?>
