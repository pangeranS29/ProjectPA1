<?php
session_start();
if (!isset($_SESSION['sedang-login'])) {
    header('Location: login_admin.php');
    exit;
}

include('config.php');

// Mendapatkan data dari form
$id_kategori = $_POST['id'];
$nama_kategori = $_POST['nama'];

// Mendapatkan data gambar
$gambar = $_FILES['gambar'];
$nama_file_baru = '';

if ($gambar['error'] == 0) {
    $nama_file = $gambar['name'];
    $ukuran_file = $gambar['size'];
    $tipe_file = $gambar['type'];
    $nama_file_baru = time() . '_' . $nama_file;
    $allowed_types = array('image/jpeg', 'image/png', 'image/gif', 'image/jpg');

    if (in_array($tipe_file, $allowed_types)) {
        // Pindahkan file gambar ke direktori yang diinginkan
        $tmp_file = $gambar['tmp_name'];
        $path = "../image/" . $nama_file_baru;
        $upload_sukses = move_uploaded_file($tmp_file, $path);

        if (!$upload_sukses) {
            $_SESSION['gagal-upload'] = true;
            header("Location: edit_kategori.php?id=$id_kategori");
            exit;
        }
    } else {
        $_SESSION['tipe-gambar'] = true;
        header("Location: kategori_edit.php?id=$id_kategori");
        exit;
    }
}

// Query untuk melakukan update data
if (!empty($nama_kategori)) {
    // Periksa apakah ada kategori dengan nama yang sama
    $sql_cek_nama = "SELECT * FROM kategori WHERE nama_kategori = '$nama_kategori' AND id_kategori != '$id_kategori'";
    $result_cek_nama = mysqli_query($koneksi, $sql_cek_nama);
    if (mysqli_num_rows($result_cek_nama) > 0) {
        $_SESSION['namasama'] = true;
        header("Location: kategori_edit.php?id=$id_kategori");
        exit;
    }

    if ($nama_file_baru == '') {
        $sql = "UPDATE kategori SET nama_kategori='$nama_kategori' WHERE id_kategori='$id_kategori'";
        $result = mysqli_query($koneksi, $sql);
    } else {
        // Hapus gambar lama jika ada
        $sql_select = "SELECT gambar_kategori FROM kategori WHERE id_kategori='$id_kategori'";
        $result_select = mysqli_query($koneksi, $sql_select);
        $row_select = mysqli_fetch_assoc($result_select);
        $gambar_lama = $row_select['gambar_kategori'];
        $sql = "UPDATE kategori SET nama_kategori='$nama_kategori', gambar_kategori='$nama_file_baru' WHERE id_kategori='$id_kategori'";
        $result = mysqli_query($koneksi, $sql);

        if (!empty($gambar_lama)) {
            unlink("../image/" . $gambar_lama);
        }
    }

    if ($result) {
        $_SESSION['teredit'] = true;
        header('Location: edit_kategori.php');
        exit;
    } else {
        echo "Gagal mengupdate data. <a href='edit_kategori.php'>Kembali</a>";
    }
}
?>
