<?php
session_start();
if(!isset($_SESSION['sedang-login'])){
  header('Location: login_admin.php');
  exit;
}

include('config.php');
$q_produk   = mysqli_query($koneksi, "SELECT * FROM produk");
$q_kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
$q_p_terlaris = mysqli_query($koneksi, "SELECT * FROM produk_terlaris");

?>  
<?php include('sidebar.php'); ?>
<h1 style="margin: 0;">Dasbor</h1>
  <a href="akun.php" class="btn btn-success" style="margin-left: auto;"><i class="fas fa-user"></i></a>
</div>

            <!-- CONTENT -->
            <div class="ag-format-container">
              <div class="ag-courses_box">
                <div class="ag-courses_item">
                  <a href="produk.php" class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>
                    <div class="ag-courses-item_title">
                      <center><?= mysqli_num_rows($q_produk); ?><br>Produk</center>
                    </div>
                  </a>
                </div>

                <div class="ag-courses_item">
                  <a href="edit_kategori.php" class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>
                    <div class="ag-courses-item_title">
                      <center><?= mysqli_num_rows($q_kategori); ?><br>Kategori</center>
                    </div>
                  </a>
                </div>

                <div class="ag-courses_item">
                  <a href="produk_terlaris.php" class="ag-courses-item_link">
                    <div class="ag-courses-item_bg"></div>
                    <div class="ag-courses-item_title">
                      <center><?= mysqli_num_rows($q_p_terlaris); ?><br>Produk terlaris</center>
                    </div>
                  </a>
                </div>
              </div>
            </div>
            <!-- AKHIR CONTENT -->

          </div>
        </div>
      </div>
    </div>
  </div>



</body>

</html>

<title>Dasbor</title>

<style>




  /* .atasan .glyphicon-menu-hamburger{
    background-color: grey;
    height: fit-content;
  } */

  .ag-format-container {
    width: 1142px;
    margin: 0 auto;
  }


  .ag-courses_box {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: start;
    -ms-flex-align: start;
    align-items: flex-start;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    padding: 50px 0;
  }

  .ag-courses_item {
    width: 30%;


    margin: 0 15px 30px;

    overflow: hidden;

  }

  .ag-courses-item_link {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 30px 20px;
    background-color: #121212;
    border-radius: 2rem;
    text-decoration: none;
    overflow: hidden;

    position: relative;
  }

  .ag-courses-item_link:hover,
  .ag-courses-item_link:hover .ag-courses-item_date {
    text-decoration: none;
    color: #FFF;
  }

  .ag-courses-item_link:hover .ag-courses-item_bg {
    -webkit-transform: scale(10);
    -ms-transform: scale(10);
    transform: scale(10);
  }

  .ag-courses-item_title {
    min-height: 87px;
    margin: 0 0 25px;
    display: flex;
    justify-content: center;
    align-content: center;
    overflow: hidden;

    font-weight: bold;
    font-size: 30px;
    color: #FFF;

    z-index: 2;
    position: relative;
  }

  .ag-courses-item_date-box {
    font-size: 18px;
    color: #FFF;

    z-index: 2;
    position: relative;
  }

  .ag-courses-item_date {
    font-weight: bold;
    color: #f9b234;

    -webkit-transition: color .5s ease;
    -o-transition: color .5s ease;
    transition: color .5s ease
  }

  .ag-courses-item_bg {
    height: 128px;
    width: 128px;
    background-color: #f9b234;

    z-index: 1;
    position: absolute;
    top: -75px;
    right: -75px;

    border-radius: 50%;

    -webkit-transition: all .5s ease;
    -o-transition: all .5s ease;
    transition: all .5s ease;
  }

  .ag-courses_item:nth-child(2n) .ag-courses-item_bg {
    background-color: grey;
  }

  .ag-courses_item:nth-child(3n) .ag-courses-item_bg {
    background-color: #e44002;
  }

  .ag-courses_item:nth-child(4n) .ag-courses-item_bg {
    background-color: #952aff;
  }

  .ag-courses_item:nth-child(5n) .ag-courses-item_bg {
    background-color: #cd3e94;
  }

  .ag-courses_item:nth-child(6n) .ag-courses-item_bg {
    background-color: #4c49ea;
  }



  @media only screen and (max-width: 979px) {
    .ag-courses_item {
      -ms-flex-preferred-size: calc(50% - 30px);
      flex-basis: calc(50% - 30px);
    }

    .ag-courses-item_title {
      font-size: 24px;
    }
  }

  @media only screen and (max-width: 767px) {
    .ag-format-container {
      width: 96%;
    }

  }

  @media only screen and (max-width: 639px) {
    .ag-courses_item {
      -ms-flex-preferred-size: 100%;
      flex-basis: 100%;
    }

    .ag-courses-item_title {
      min-height: 72px;
      line-height: 1;

      font-size: 24px;
    }

    .ag-courses-item_link {
      padding: 22px 40px;
    }

    .ag-courses-item_date-box {
      font-size: 16px;
    }
  }
</style>

<script>
  $(document).ready(function () {
    $("#menu-toggle").click(function (e) {
      e.preventDefault();
      $("#wrapper").toggleClass("menuDisplayed");
    });
  });
</script>