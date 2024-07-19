<?php
    session_start();
    if(!isset($_SESSION['sedang-login'])){
        header('Location: login_admin.php');
        exit;
    }
?>

<?php if (isset($_SESSION['h-produkterlaris'])): ?>
<div class="flash-data" data-flashdata="<?php echo $_SESSION['h-produkterlaris']; ?>"></div>
<?php unset($_SESSION['h-produkterlaris']); endif; ?>

<?php if (isset($_SESSION['t-produkterlaris'])): ?>
<div class="tambah-data" data-tambahdata="<?php echo $_SESSION['t-produkterlaris']; ?>"></div>
<?php unset($_SESSION['t-produkterlaris']); endif; ?>

<?php    include('config.php');
    $q_produk   = mysqli_query($koneksi, "SELECT * FROM produk p INNER JOIN kategori k ON p.kategori_id = k.id_kategori LEFT JOIN produk_terlaris pt ON p.id = pt.id_produk ORDER BY id_produk_terlaris DESC");
    $q_kategori = mysqli_query($koneksi, "SELECT * FROM kategori");

    ?>

<?php include('sidebar.php'); ?>
<h1>Produk Terlaris</h1>
                            </div>

                            <!-- CONTENT -->
                            <center>
                                <h1 class="title">Data Produk Terlaris</h1>
                                <br>
                            </center>   

                            


                            <div class="konten-produk">
                                
                        
                            <table class="table caption-top table-striped " style="dispay:flex;">
                            <nav class="breadcrumbs">
  <a href="index.php" class="breadcrumbs__item">Dasbor</a>
  <a href="produk.php" class="breadcrumbs__item">Produk</a> 
  <a href="#cart" class="breadcrumbs__item is-active">Produk Terlaris</a>
</nav>
                                
                            <div class="atas_tabel" style="display:flex; justify-content: flex-end;"  >
                                <div class="cari">
                                    Cari:&nbsp;
                                    <input type="text" class="pencarian" id="cari_produk" placeholder="Cari produk">
                                </div>
                                </div>

                                
                                <thead>   
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 0;
                                        while($produk = mysqli_fetch_assoc($q_produk)){  
                                            $i++; ?>
                                        
                                        <tr>
                                        <th><?= $i; ?></th>
                                        <td><?= $produk['nama']; ?></td>
                                        <td><?= "Rp ". number_format($produk['harga'], 0, ',', '.');; ?></td>
                                        <td><?= $produk['nama_kategori']; ?></td>
                                        <td><img src="../image/<?=$produk['foto']; ?>" alt="$produk['foto']; ?>" class="foto"></td>
                                        <td>
                                        <div style="display:flex; align-items: center;">
                                        <?php if (empty($produk['id_produk_terlaris'])) { ?>
                                            <a href="tambahprodukterlaris.php?id=<?=$produk['id']; ?>" class="btn btn-primary btn-tambah" id="tprodukterlaris" ><i class="fa solid fa-square-plus"></i>&nbsp; Tambahkan ke produk terlaris</a>
                                        <?php }else{ ?>
                                            <a href="hapusprodukterlaris.php?id=<?=$produk['id']; ?>" class="btn btn-danger btn-hapus" id="hprodukterlaris" ><i class="fas fa-trash-can"></i>&nbsp; Hapus produk terlaris</a>
                                        <?php } ?>
                                        </div>
                                        </td>
                                        </div> 
                                        
                                    </tr>
                                    <?php    } 
                                    ?>
                                </tbody>
                            </table>
                            <div id="pesan"></div>
                            </div>

                            <!-- AKHIR CONTENT -->

                        </div>
                    </div>
                </div>
            </div>
        </div>



    </body>


    
<title>Produk Terlaris</title>
    </html>

    <style>
        .breadcrumbs {
  border: 1px solid #cbd2d9;
  border-radius: 0.3rem;
  display: inline-flex;
  overflow: hidden;
}

.breadcrumbs__item {
  background: #fff;
  color: #333;
  outline: none;
  padding: 0.75em 0.75em 0.75em 1.25em;
  position: relative;
  text-decoration: none;
  transition: background 0.2s linear;
}

.breadcrumbs__item:hover:after,
.breadcrumbs__item:hover {
  background: #edf1f5;
}



.breadcrumbs__item:after,
.breadcrumbs__item:before {
  background: white;
  bottom: 0;
  clip-path: polygon(50% 50%, -50% -50%, 0 100%);
  content: "";
  left: 100%;
  position: absolute;
  top: 0;
  transition: background 0.2s linear;
  width: 1em;
  z-index: 1;
}

.breadcrumbs__item:before {
  background: grey;
  margin-left: 1px;
}

.breadcrumbs__item:last-child {
  border-right: none;
}

.breadcrumbs__item.is-active {
  background: #edf1f5;
}



    a{
        text-decoration: none;
    }
    .truncate {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 15ch;
    }

    .foto{
        width: 50px;
    }

    .genap{
        background-color: whitesmoke;
    }

    .baris{
        display:flex;
        padding-inline: 1rem;
        padding-block: 0.5rem;
    }

    .col1{
        width: 30%;
        max-width: 30%;
        display: flex;
    }

    .col2{
        width: 72%;
        display: flex;
    }

    .col2 input{
        width: 100%;
    }

    .col2 select{
        width: 100%;
    }

    @media only screen and (max-width: 490px){
        .baris{
            display: block;
        }

        .col1{
            width: 100%;
            max-width: 100%;
        }

        .col2{
            width: 100%;
            max-width: 100%;
        }

        .col2 input{
            width: 100%;
            max-width: 100%;
        }


    }


    /* The Modal (background) */
    .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content/Box */
    .modal-content {
    background-color: white;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 1rem;
    border: 1px solid #888;
    width: fit-content; /* Could be more or less, depending on screen size */
    max-width: 80%;
    overflow: hidden;
    }

    /* Close Button */
    .close {
    color: black;
    float: right;
    font-size: 28px;
    font-weight: bold;
    }

    .close:hover,
    .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
    }


    </style>

    <script>
        // SIDEBAR
        $(document).ready(function () {
            $("#menu-toggle").click(function (e) {
                e.preventDefault();
                $("#wrapper").toggleClass("menuDisplayed");
            });
        });


    $(function() {
  $(document).on('click', '#tprodukterlaris', function(e) {
    e.preventDefault();
    var link = $(this).attr('href');
    Swal.fire({
      title: 'Anda yakin?',
      text: "Produk ini akan tergolong produk terlaris",
      icon: 'question',
      showCancelButton: true,
      cancelButtonText: 'Batal',
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, tambahkan!'
    }).then((result) => {
      if (result.value) {
        document.location.href = link;
      }
    });
  });
  
  const tambahdata = $('.tambah-data').data('tambahdata');
  if (tambahdata) {
    Swal.fire({
      icon: 'success',
      title: 'Berhasil',
      text: 'Produk berhasil ditambahkan ke produk terlaris'
    });
  }
});

$(function() {
  $(document).on('click', '#hprodukterlaris', function(e) {
    e.preventDefault();
    var link = $(this).attr('href');
    Swal.fire({
      title: 'Anda yakin?',
      text: "Data produk ini akan terhapus dari produk terlaris",
      icon: 'warning',
      showCancelButton: true,
      cancelButtonText: 'Batal',
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
      if (result.value) {
        document.location.href = link;
      }
    });
  });
  
  const flashdata = $('.flash-data').data('flashdata');
  if (flashdata) {
    Swal.fire({
      icon: 'success',
      title: 'Berhasil',
      text: 'Produk berhasil dihapus dari produk terlaris'
    });
}s
});


</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
