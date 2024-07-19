<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- JQUERY -->

    <!-- BOOTSTRAP 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!-- END BOOTSTRAP 5 -->

    <link rel="stylesheet" href="css_admin.css">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
$(function() {
    $(document).on('click', '#logout', function(e) {
        e.preventDefault();
        var link = $(this).attr('href');
        Swal.fire({
            title: 'Anda yakin?',
            text: "Anda yakin ingin keluar dari halaman admin",
            icon: 'question',
            showCancelButton: true,
            cancelButtonText: 'Batal',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link; // Mengarahkan pengguna ke halaman logout.php
            }
        });
    });
});

    </script>


    <link rel="icon" href="../img/logo2.png" type="image/png">

    </head>

    <body>
        <div id="wrapper">
            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <br>
                    <div style="justify-content: center; display:flex; align-items: center;" >
                    <img src="../img/logo.png" alt="" style="width:120px;" >
                    </div>
                    <br>

                    <li><a href="index.php"><i class="fa-solid fa-gauge fa-xl"></i>&nbsp;Dasbor</a></li>
                    <li><a href="produk.php"><i class="fa-solid fa-bag-shopping fa-xl"></i>&nbsp;Produk</a></li>
                    <li><a href="edit_kategori.php"><i class="fa-solid fa-table fa-xl"></i>&nbsp;Kategori</a></li>
                    <li><a href="logout.php" id="logout" ><i class="fa-solid fa-arrow-right-from-bracket fa-xl"></i>&nbsp;Keluar</a></li>
                </ul>
            </div>

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid" >
                    <div class="row" >
                        <div class="col-lg-12" >
                            <div class="atasan">
                                <a href="#" class="btn" id="menu-toggle"><span
                                        class="fa-solid fa-bars"></span></a>

                                        