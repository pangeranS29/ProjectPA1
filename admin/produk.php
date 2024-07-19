    <?php
    session_start();
    if(!isset($_SESSION['sedang-login'])){
        header('Location: login_admin.php');
        exit;
    } ?>

    <?php if (isset($_SESSION['gagaldata'])): ?>
    <div class="gagal-data" data-gagaldata="<?php echo $_SESSION['gagaldata']; ?>"></div>
    <?php unset($_SESSION['gagaldata']); endif; ?>

    <?php if (isset($_SESSION['namasama'])): ?>
    <div class="nama-sama" data-namasama="<?php echo $_SESSION['namasama']; ?>"></div>
    <?php unset($_SESSION['namasama']); endif; ?>

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
    $q_produk   = mysqli_query($koneksi, "SELECT * FROM produk p INNER JOIN kategori k ON p.kategori_id = k.id_kategori ");
    $q_kategori = mysqli_query($koneksi, "SELECT * FROM kategori");

    ?>

    <?php include('sidebar.php'); ?>
    <h1>Produk</h1>
    </div>

    <!-- CONTENT -->
    <center>
        <h1 class="title">Data Produk</h1>
        <br>
    </center>
    <nav class="breadcrumbs mb-1 ">
        <a href="index.php" class="breadcrumbs__item">Dasbor</a>
        <a href="produk.php" class="breadcrumbs__item is-active">Produk</a>
    </nav>


    <div class="konten-produk">
        <div class="atas_tabel">
            <button class="btn btn-primary mb-2 btn-tambah-produk" id="openModalBtn"> <i class="fa solid fa-square-plus"></i> Tambah Produk</button>
            <div class="cari"  style="display:flex; ">
                <a href="produk_terlaris.php" class="btn btn-success mb-2" ><i class="fa-solid fa-medal"></i>&nbsp;Produk terlaris</a>

                &nbsp;<input type="text" class=" pencarian form-control-sm mb-2 " name="nama" id="floatingInputGroup1"
                    placeholder="Cari produk" style="height: 40px">

            </div>
        </div>

        <table class="table caption-top table-striped" border="1">



            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                                        $i = 1;
                                        while($produk = mysqli_fetch_assoc($q_produk)){ ?>

                <tr>
                    <td><?= $i++; ?>.</td>
                    <td><?= $produk['nama']; ?></td>
                    <td><?= "Rp ". number_format($produk['harga'], 0, ',', '.');; ?></td>
                    <td><?= $produk['nama_kategori']; ?></td>
                    <td class="truncate"><?= $produk['detail']; ?></td>
                    <td><img src="../image/<?=$produk['foto']; ?>" alt="<?= $produk['foto']; ?>" class="foto"></td>
                    <td style="align-item: center; ">
                        <div style="display:flex;">
                            <a href="edit_produk.php?id=<?=$produk['id']; ?>" class="btn btn-primary"><i
                                    class="fas fa-pencil-square"></i></a>&nbsp;
                            <a href="hapus_proses.php?id=<?=$produk['id']; ?>" class="btn btn-danger btn-hapus"
                                id="hproduk"><i class="fas fa-trash-can"></i></a>
                        </div>
                    </td>
    </div>

    </tr>
    <?php } ?>
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
                <h2> Tambahkan produk</h2>
            </center>
            <hr>
            <br>
            <form action="tambah_produk_proses.php" method="post" enctype="multipart/form-data">
                <div class="baris">
                    <div class="col1"><label for="nama_produk">Nama Produk:</label></div>
                    <div class="col2" style="display:block;" >
                    <input type="text" id="nama_produk" name="nama_produk" placeholder="Nama produk" required style="display:flex; width: 100%;" >
                    <div id="nama_produk_status"></div>
                </div>
                                
                </div>
                

                <div class="baris">
                    <div class="col1"><label for="kategori">Kategori Produk:</label></div>
                    <div class="col2">
                        <select id="kategori" name="kategori">
                            <option value="" disabled selected>-- Pilih kategori --</option>
                            <?php
                while($kategori = mysqli_fetch_assoc($q_kategori)){ ?>
                            <option value="<?= $kategori['id_kategori']; ?>"><?= $kategori['nama_kategori']; ?></option>
                            <?php } ?>
                        </select></div>
                </div>

                <div class="baris">
                    <div class="col1"><label for="harga">Harga:</label></div>
                    <div class="col2">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp.</span>
                            <div class="form-floating">
                            <input type="number" class="form-control" value="<?= $produk['harga']; ?>" name="harga" id="floatingInputGroup1" placeholder="Harga" min="1000">
                                <label for="floatingInputGroup1">Harga</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="baris">
                    <div class="col1"><label for="gambar">Gambar:</label></div>
                    <div class="col2"><input type="file" id="gambar-produk" type="file" name="gambar"
                            class="form-control" required accept=".jpg, .jpeg, .png"></div>
                </div>

                <div class="baris"><textarea id="deskripsi-produk" name="deskripsi"
                            style=" width:100%; max-width:100%; text-align: justify; height:100;" placeholder="Deskripsi produk" required></textarea>

                </div>
 <br>


                <center><input type="submit" id="submit-produk" name="tambah" value="Tambahkan"
                        class="btn btn-primary"></input></center>
            </form>
        </div>

    </div>

    <title>Produk</title>

    </html>

    <style>
        .truncate {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 15ch;
        }

        .foto {
            width: 50px;
            border-radius:7px;
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
            position: fixed;
            z-index: 1;
            height: 100vh;
            left: 0;
            top: 0;
            width: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: white;
            margin: 5% auto;
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

        .pencarian {
            height: 50rem;
        }

        @media (max-width: 700px) {
            .atas_tabel {
                display: block;
            }
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


        $(document).ready(function () {
            $('#tambah-produk').click(function () {
                $('#modal-tambah-produk').modal('show');
            });
        });

        $('#floatingInputGroup1').keyup(function () {
            var input = $(this).val().toLowerCase();
            $('tbody tr').filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(input) > -1);
            });

            // Menampilkan pesan jika tidak ada nama yang ditemukan
            if ($('tbody tr:visible').length == 0) {
                $('#pesan').html('<p>Tidak ada produk yang ditemukan</p>');
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
            $(document).on('click', '#hproduk', function (e) {
                e.preventDefault();
                var link = $(this).attr('href');
                Swal.fire({
                    title: 'Anda yakin?',
                    text: "Data produk ini akan terhapus",
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
                    text: 'Data produk berhasil dihapus'
                });
            }

            const tambahdata = $('.tambah-data').data('tambahdata');
            if (tambahdata) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Data produk berhasil ditambahkan'
                });
            }

            const editdata = $('.edit-data').data('editdata');
            if (editdata) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Data produk berhasil diubah'
                });
            }

            const gagaldata = $('.gagal-data').data('gagaldata');
            if (gagaldata) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Tipe file yang diunggah harus berupa gambar (JPEG, PNG, atau JPG)'
                });
            }

            const namasama = $('.nama-sama').data('namasama');
            if (namasama) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Nama produk sudah digunakan'
                });
            }

        });

        $(document).ready(function() {
      $('#nama_produk').on('input', function() {
        var nama_produk = $(this).val();

        if (nama_produk.trim() === '') {
          // Jika inputan kosong, tampilkan status kosong
          $('#nama_produk_status').html('');
        } else {
          // Jika inputan tidak kosong, lakukan permintaan Ajax
          $.ajax({
            url: 'check_nama.php', // Ganti dengan URL yang sesuai dengan backend Anda
            type: 'POST',
            data: { nama_produk: nama_produk },
            success: function(response) {
              if (response == 'available') {
                $('#nama_produk_status').html('<span style="color:green;">Nama produk tersedia</span>');
              } else {
                $('#nama_produk_status').html('<span style="color:red;">Nama produk sudah digunakan</span>');
              }
            }
          });
        }
      });
    });
    </script>

    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <div id="nama_produk_status"></div>
