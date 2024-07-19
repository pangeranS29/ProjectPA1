<?php
session_start();
if (!isset($_SESSION['sedang-login'])) {
    header('Location: login_admin.php');
    exit;
}

include('config.php');

// Mendapatkan data dari form
$id_produk = $_POST['id'];
$nama_produk = $_POST['nama'];
$harga = $_POST['harga'];
$kategori = $_POST['kategori'];
$deskripsi = $_POST['deskripsi'];

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
            header("Location: edit_produk.php?id=$id_produk");
            exit;
        }
    } else {
        $_SESSION['tipe-gambar'] = true;
        header("Location: edit_produk.php?id=$id_produk");
        exit;
    }
}

// Query untuk melakukan update data
if (!empty($nama_produk) && !empty($harga) && !empty($kategori)) {
    // Periksa apakah ada produk dengan nama yang sama
    $sql_cek_nama = "SELECT * FROM produk WHERE nama = '$nama_produk' AND id != '$id_produk'";
    $result_cek_nama = mysqli_query($koneksi, $sql_cek_nama);
    if (mysqli_num_rows($result_cek_nama) > 0) {
        $_SESSION['namasama'] = true;
        header("Location: edit_produk.php?id=$id_produk");
        exit;
    }

    if ($nama_file_baru == '') {
        $sql = "UPDATE produk SET nama='$nama_produk', harga='$harga', kategori_id='$kategori', detail='$deskripsi' WHERE id='$id_produk'";
        $result = mysqli_query($koneksi, $sql);

        $_SESSION['teredit'] = true;
        header('Location: produk.php');
        exit;
    } else {
        // Hapus gambar lama jika ada
        $sql_select = "SELECT foto FROM produk WHERE id='$id_produk'";
        $result_select = mysqli_query($koneksi, $sql_select);
        $row_select = mysqli_fetch_assoc($result_select);
        $gambar_lama = $row_select['foto'];
        if (!empty($gambar_lama)) {
            unlink("../image/" . $gambar_lama);
        }

        $sql = "UPDATE produk SET nama='$nama_produk', harga='$harga', kategori_id='$kategori', detail='$deskripsi', foto='$nama_file_baru' WHERE id='$id_produk'";
        $result = mysqli_query($koneksi, $sql);

        if ($result) {
            $_SESSION['teredit'] = true;
            header('Location: produk.php');
            exit;
        } else {
            echo "Gagal mengupdate data. <a href='produk.php'>Kembali</a>";
        }
    }
}
?>
