<?php
include('config.php');

if(isset($_POST['keyword'])) {
  $keyword = $_POST['keyword'];

  $query = mysqli_query($koneksi, "SELECT * FROM produk WHERE nama LIKE '%$keyword%'");

  if(mysqli_num_rows($query) > 0) {
    $i = 0;
    while($data = mysqli_fetch_assoc($query)) { 
    $i++;    
        ?>

   <tr>
   <th scope="row"><?= $i; ?></th>
    <td><?= $data['nama']; ?></td>
    <td><?= $data['harga']; ?></td>
    <td><?= $data['kategori_id']; ?></td>
    <td><?= $data['detail']; ?></td>
    <td><?= $data['foto']; ?></td>
    <td>
        <button class="btn btn-primary">Edit</button>
        <button class="btn btn-danger">hapus</button>
    </td>
   </tr>

 <?php  }
  } else {
    echo '<p>Tidak ditemukan produk yang sesuai dengan kata kunci "'.$keyword.'"</p>';
  }
}
?>
