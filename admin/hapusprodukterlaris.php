<?php
session_start();
if (!isset($_SESSION['sedang-login'])) {
    header('Location: login_admin.php');
    exit;
}

include('config.php');

if (isset($_GET['id'])) {
    $id_produk = $_GET['id'];

    // Perform the deletion
    $delete_query = "DELETE FROM produk_terlaris WHERE id_produk = $id_produk";
    $result = mysqli_query($koneksi, $delete_query);

    if ($result) {
        $_SESSION['h-produkterlaris'] = true;
        header('Location: produk_terlaris.php'); // Redirect to the desired page after deletion
        exit;
    } else {
        echo '<script>alert("Failed to delete the product.");</script>';
    }
}
?>
