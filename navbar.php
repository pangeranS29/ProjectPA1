  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container-fluid">
      <img src="img/logo.png" alt="logo.png" style="width:15vh;" >
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
        aria-controls="navbarText" aria-expanded="true" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <span class="login" id="tlogin" style="margin-right: 1rem;">
        <a href="admin/login_admin.php" style="border:none; background: transparent; margin-inline: 1rem;"><i class="fas fa-user"></i></a>
      </span>

      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav ms-auto mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="index.php">BERANDA</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="produk.php">PRODUK</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tentang_kami.php">TENTANG KAMI</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <style>
  .navbar{
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);

  }
  a :is(:link, :active, :visited).active{
    color: orangered;
  }
  
  .navbar .login {
  order: 1;
}

@media (max-width: 991px) {
  .navbar .login {
  order: 0;
}
}

</style>

  <script>
    const activePage = window.location.pathname;
const navLinks = document.querySelectorAll('nav a').forEach(link => {
  if(link.href.includes(`${activePage}`)){
    link.classList.add('active');
    console.log(link);
  }
})
  </script>