<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>SeeFan</title>
  <link href="bootstrap-5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <style>
    .nav-link {
      color: whitesmoke;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top" data-bs-theme="dark" id="home">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="img/logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top" /><b>Seefan</b></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#hero">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#about"> About </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#produk"> Product </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#kontak"> Contact </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="belanja.php"> Belanja </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Hero -->
  <section id="hero">
    <div class="container col-xxl-8 px-4 py-3">
      <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
          <img src="img/logo.png" class="d-block mx-lg-auto img-fluid" alt="Logo" width="700" height="500" loading="lazy" />
        </div>
        <div class="col-lg-6">
          <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">
            <span><b>SeeFan</b></span>
          </h1>
          <p class="lead">
            Jelajahi dunia mikrokontroller dengan Seefan, tempat yang
            menyediakan segala yang Anda butuhkan. Dari modul hingga sensor,
            kami hadir untuk memenuhi kebutuhan eksperimen dan proyek Anda.
          </p>
          <a href="belanja.php" class="btn btn-primary btn-lg">Belanja Sekarang</a>
        </div>
      </div>
    </div>
  </section>
  <!-- Akhir hero -->
  <!-- About -->
  <section class="text-center container" id="about">
    <div class="row py-lg-5 mb-5">
      <div class="col-lg-10 col-md-10 mx-auto">
        <h1 class="fw-light py-1"><b>Tentang Kami</b></h1>
        <p class="lead text-body-secondary">
          Seefan adalah toko online yang mengkhususkan diri dalam menyediakan
          berbagai barang kebutuhan mikrokontroller. Dengan fokus pada inovasi
          teknologi, Seefan menawarkan koleksi produk terkini yang mencakup
          modul, sensor, dan peralatan berkualitas tinggi untuk memenuhi
          kebutuhan eksplorasi dan pengembangan proyek anda.
        </p>
      </div>
    </div>
  </section>
  <!-- Akhir About -->
  <!-- produk -->
  <div class="container" id="produk">
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
      <h1 class="fw-light"><b>Produk Kami</b></h1>
    </div>
    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3 text-bg-primary border-primary">
            <h4 class="my-0 fw-normal">Mikrokontroller</h4>
          </div>
          <img src="img/produk/uno1.jpg" alt="" class="m-3">
          <div class="card-body">
            <a href="belanja.php" class="w-100 btn btn-lg btn-primary">Beli Disini</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3 text-bg-primary border-primary">
            <h4 class="my-0 fw-normal">Sensor</h4>
          </div>
          <img src="img/produk/soil1.jpg" alt="" class="m-3">
          <div class="card-body">
            <a href="belanja.php" class="w-100 btn btn-lg btn-primary">Beli Disini</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3 text-bg-primary border-primary">
            <h4 class="my-0 fw-normal">Paket Project</h4>
          </div>
          <img src="img/produk/rfid2.jpg" alt="" class="m-3">
          <div class="card-body">
            <a href="belanja.php" class="w-100 btn btn-lg btn-primary">Beli Disini</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Akhir produk -->
  <section class="text-center container" id="kontak">
    <div class="row py-lg-5 mb-5">
      <div class="col-lg-10 col-md-10 mx-auto">
        <h1 class="fw-light py-1"><b>Kontak Kami</b></h1>
        <h5 class="fw-light py-2"><a href="https://wa.me/62895631337014" style="text-decoration: none; color: black;" target="_blank">WA: 08956337014</a></h2>
          <a href="https://wa.me/62895631337014" target="_blank" class="btn btn-success" class="mx-5">Whastapp</a>
      </div>
    </div>
  </section>
  <!-- footer -->
  <div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center pb-3 mt-1 my-4 border-top">
      <div class="col-md-4 d-flex align-items-center">
        <a href="#" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
          <img src="img/logo.png" width="30" height="24" alt="">
        </a>
        <a href="https://github.com/zahruddin" class="text-decoration-none"><span class="mb-3 mb-md-0 text-body-secondary ">© 2023 Seefan, Zahruddin Fanani</span></a>
      </div>
      <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
        <li class="ms-3">
          <a class="text-body-secondary" href="https://github.com/zahruddin" target="_blank">
            <img src="img/github.png" width="33" height="33" alt="">
          </a>
        </li>
        <li class="ms-3">
          <a class="text-body-secondary" href="https://instagram.com/zaa_fa17" target="_blank">
            <img src="img/instagram.png" width="20" height="20" alt="">
          </a>
        </li>
        <li class="ms-3">
          <a class="text-body-secondary" href="#">
            <img src="img/logo.png" width="30" height="24" alt="">
          </a>
        </li>
      </ul>
    </footer>
  </div>
  <!-- Alhir footer -->
  <script src="bootstrap-5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
