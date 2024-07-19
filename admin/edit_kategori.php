<?php
    session_start();
    if(!isset($_SESSION['sedang-login'])){
        header('Location: login_admin.php');
        exit;
    }
?>

<?php if (isset($_SESSION['namasama'])): ?>
<div class="nama-sama" data-namasama="<?php echo $_SESSION['namasama']; ?>"></div>
<?php unset($_SESSION['namasama']); endif; ?>

<?php if (isset($_SESSION['gagaldata'])): ?>
<div class="gagal-data" data-gagaldata="<?php echo $_SESSION['gagaldata']; ?>"></div>
<?php unset($_SESSION['gagaldata']); endif; ?>

<?php if (isset($_SESSION['teredit'])): ?>
<div class="edit-data" data-editdata="<?php echo $_SESSION['teredit']; ?>"></div>
<?php unset($_SESSION['teredit']); endif; ?>

<?php if (isset($_SESSION['tertambah'])): ?>
<div class="tambah-data" data-tambahdata="<?php echo $_SESSION['tertambah']; ?>"></div>
<?php unset($_SESSION['tertambah']); endif; ?>

<?php if (isset($_SESSION['terhapus'])): ?>
<div class="flash-data" data-flashdata="<?php echo $_SESSION['terhapus']; ?>"></div>
<?php unset($_SESSION['terhapus']); endif; ?>

<?php 
include('config.php');
    $q_produk       = mysqli_query($koneksi, "SELECT * FROM produk p INNER JOIN kategori k ON p.kategori_id = k.id_kategori ");
    $q_kategori     = mysqli_query($koneksi, "SELECT * FROM kategori ");

    ?>
<?php include('sidebar.php'); ?>
<h1>Kategori</h1>
</div>
<!-- CONTENT -->
<center>
    <h1 class="title">Data Kategori</h1>
    <br>
</center>
<nav class="breadcrumbs mb-1 ">
    <a href="index.php" class="breadcrumbs__item">Dasbor</a>
    <a href="edit_kategori.php" class="breadcrumbs__item is-active">Kategori</a>
</nav>


<div class="konten-produk">


    <table class="table caption-top table-striped" border="1" >
        <div class="atas_tabel mb-1 ">
            <button class="btn btn-primary btn-tambah-produk" id="openModalBtn"><i class="fa solid fa-square-plus"></i> Tambah kategori</button>
            <div class="cari">
                Cari:&nbsp;
                <input type="text" class="pencarian" id="cari_produk" placeholder="Cari kategori">
            </div>
        </div>
        

        <thead>
            <tr>
                <!-- <th scope="col">No.</th> -->
                <th scope="col">Nama</th>
                <th scope="col">Gambar</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                                        $i = 0;
                                        while($kategori = mysqli_fetch_assoc($q_kategori)){  
                                            $i++; ?>

            <tr class="<?php if($i%2 == 0){
                                            echo 'genap';
                                        } ?>">
                <!-- <th scope="row" ><?= $i; ?></th> -->
                <td><?= $kategori['nama_kategori']; ?></td>
                <td><img src="../image/<?=$kategori['gambar_kategori']; ?>" alt="<?= $kategori['gambar_kategori']; ?>"
                        class="foto"></td>
                <td style="align-item: center; ">
                    <div style="display:flex;">
                        <a href="kategori_edit.php?id=<?=$kategori['id_kategori']; ?>" class="btn btn-primary"><i
                                class="fas fa-pencil-square"></i></a>&nbsp;
                        <a href="hapus_kategori_proses.php?id=<?=$kategori['id_kategori']; ?>"
                            class="btn btn-danger btn-hapus" id="hkategori"><i class="fas fa-trash-can"></i></a>
                    </div>
                </td>
</div>

</tr>
<?php } 
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
<!-- MODAL -->
<div id="inputModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <center>
            <h2> Tambahkan kategori</h2>
        </center>
        <hr>
        <br>
        <form action="tambah_kategori_proses.php" method="post" enctype="multipart/form-data">
            <div class="baris">
                <div class="col1"><label for="nama_kategori">Nama kategori:</label></div>
                <div class="col2" style="display:block;"><input type="text" id="nama_kategori" name="nama_kategori" placeholder="Nama kategori"
                        required style="display:flex; width: 100%;">
                        <p id="status" style="color:red;" ></p>
                        </div>
            </div> 

            <div class="baris">
                <div class="col1"><label for="gambar">Gambar:</label></div>
                <div class="col2"><input type="file" id="gambar-produk" type="file" name="gambar" class="form-control"
                        required accept=".jpg, .jpeg, .png"></div>
            </div> <br>


            <center><input type="submit" id="submit-produk" name="tambah" value="Tambahkan"
                    class="btn btn-primary"></input></center>
        </form>
    </div>

</div>

<title>Kategori</title>

</html>

<script>
    // SIDEBAR
    $(document).ready(function () {
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("menuDisplayed");
        });
    });


    $(document).ready(function () {
        $('#tambah-produk').click(function () {
            $('#modal-tambah-produk').modal('show');
        });
    });

    $('#cari_produk').keyup(function () {
        var input = $(this).val().toLowerCase();
        $('tbody tr').filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(input) > -1);
        });

        // Menampilkan pesan jika tidak ada nama yang ditemukan
        if ($('tbody tr:visible').length == 0) {
            $('#pesan').html('<p>Tidak ada kategori yang ditemukan</p>');
        } else {
            $('#pesan').html('');
        }
    });


    // MODAL
    // Get the modal
    var modal = document.getElementById("inputModal");

    // Get the button that opens the modal
    var btn = document.getElementById("openModalBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function () {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    $(function () {
        $(document).on('click', '#hkategori', function (e) {
            e.preventDefault();
            var link = $(this).attr('href');
            Swal.fire({
                title: 'Anda yakin?',
                text: "Data kategori dan produk yang memiliki kategori ini akan terhapus",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Batal',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
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
                text: 'Data kategori berhasil dihapus'
            });
        }

        const tambahdata = $('.tambah-data').data('tambahdata');
        if (tambahdata) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Data kategori berhasil ditambahkan'
            });
        }

        const editdata = $('.edit-data').data('editdata');
        if (editdata) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Data kategori berhasil diubah'
            });
        }

        const gagaldata = $('.gagal-data').data('gagaldata');
        if (gagaldata) {
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Tipe file yang diunggah harus berupa gambar (JPEG, PNG, atau JPG).'
            });
        }

        const namasama = $('.nama-sama').data('namasama');
            if (namasama) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Nama kategori sudah digunakan'
                });
            }



    });

    $(document).ready(function() {
  $('#nama_kategori').on('input', function() {
    var namaKategori = $(this).val();

    $.ajax({
      url: 'cek_nama_kategori.php', // Ganti dengan URL file PHP yang melakukan pengecekan
      method: 'POST',
      data: { nama_kategori: namaKategori },
      success: function(response) {
        if (response == 'exist') {
          $('#status').text('Nama kategori sudah gigunakan');
        } else {
          $('#status').text('');
        }
      }
    });
  });
});

</script>



<style>
    .truncate {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 15ch;
    }

    .foto {
        width: 50px;
    }

    .genap {
        background-color: whitesmoke;
    }

    .baris {
        display: flex;
        padding-inline: 1rem;
        padding-block: 0.5rem;
    }

    .col1 {
        width: 30%;
        max-width: 30%;
        display: flex;
    }

    .col2 {
        width: 72%;
        display: flex;
    }

    .col2 input {
        width: 100%;
    }

    .col2 select {
        width: 100%;
    }

    @media only screen and (max-width: 490px) {
        .baris {
            display: block;
        }

        .col1 {
            width: 100%;
            max-width: 100%;
        }

        .col2 {
            width: 100%;
            max-width: 100%;
        }

        .col2 input {
            width: 100%;
            max-width: 100%;
        }


    }


    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: white;
        margin: 15% auto;
        /* 15% from the top and centered */
        padding: 1rem;
        border: 1px solid #888;
        width: fit-content;
        /* Could be more or less, depending on screen size */
        max-width: 80%;
        overflow: hidden;
    }

    /* Close Button */
    .close {
        display: flex;
        position: flex-end;
        width: fit-content;
        color: black;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: red;
        text-decoration: none;
        cursor: pointer;
    }
</style>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
