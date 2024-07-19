<?php
// hapus_produk.php

// Lakukan koneksi ke database

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
  $idProduk = $_POST['id'];


}
