<?php
function cariDataById($targetId)
{
  // Baca data dari file JSON
  $json_data = file_get_contents('produk.json');
  $data = json_decode($json_data, true);

  // Loop melalui data
  foreach ($data['produk'] as $item) {
    if ($item['id'] == $targetId) {
      return $item;
    }
  }

  // Jika tidak ditemukan, kembalikan null
  return null;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>SeeFan | Belanja</title>
  <link href="bootstrap-5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <style>
    .overflow {
      overflow: hidden;
      text-overflow: ellipsis;
      display: -webkit-box;
      -webkit-line-clamp: 4;
      -webkit-box-orient: vertical;
    }

    .nav-link {
      color: whitesmoke;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top" data-bs-theme="dark" id="home">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top" />Seefan</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php#hero">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php#about"> About </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php#produk"> Product </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php#kontak"> Contact </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="belanja.php"> Belanja </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- album -->
  <div class="album py-5 bg-body-tertiary">
    <div class="container">
      <form action="proses.php" method="post">
        <div class="row row-cols-1 lg-p-5 justify-content-center">
          <?php
          // Baca data dari file JSON
          $targetId = $_GET['id'];
          $result = cariDataById($targetId);
          if ($result != null) {
          ?>
            <div class="col-10">
              <div class="card shadow-sm">
                <!-- carousel -->
                <div id="carouselExampleIndicators" class="carousel slide">
                  <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                  </div>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="img/produk/<?= $result['gambar1'] ?>" class="d-block h-70 w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="img/produk/<?= $result['gambar2'] ?>" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="img/produk/<?= $result['gambar3'] ?>" class="d-block w-100" alt="...">
                    </div>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
                <!-- Akhir carousel -->
                <div class="card-body">
                  <h3 class=""><b><?= $result['nama'] ?></b></h3>
                  <p class="card-text">
                    <?= $result['deskripsi'] ?>
                  </p>
                  <span class="btn btn-success btn-md"><?= "Rp " . $result['harga'] ?></span>
                  <a href="<?= $result['link'] ?>" class="btn btn-secondary btn-md" target="_blank">Vidio Produk</a>
                  <div><small class="badge text-bg-success"><?= $result['status'] ?></small></div>
                  <!-- <div class="d-flex justify-content-between align-items-center py-2">
                    <label class="" for="<?= $result['id'] . "jumlah" ?>"><small class="text-body-success">Jumlah</small></label>
                    <input type="number" min="0" name="jumlah[<?= $result['id'] ?>]" class="form-control" style="margin-right: 20%; margin-left: 2%;" id="<?= $result['id'] . "jumlah" ?>">
                    <input type="hidden" name="keranjang[<?= $result['id'] ?>]" id="<?= $produk['id'] ?>" value="<?= $result['id'] ?>">
                  </div> -->
                  <div class="mt-2">
                    <a href="belanja.php" class="btn btn-sm btn-primary">
                      Kembali
                    </a>
                    <!-- <button class="btn btn-success btn-sm px-4">Beli</button> -->
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </form>
    </div>
  </div>
  <!-- akhir album -->
  <!-- footer -->
  <div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
      <div class="col-md-4 d-flex align-items-center">
        <a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
          <svg class="bi" width="30" height="24">
            <use xlink:href="#bootstrap"></use>
          </svg>
        </a>
        <span class="mb-3 mb-md-0 text-body-secondary">© 2023 Seefan, Zahruddin Fanani</span>
      </div>

      <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
        <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24">
              <use xlink:href="#twitter"></use>
            </svg></a></li>
        <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24">
              <use xlink:href="#instagram"></use>
            </svg></a></li>
        <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24">
              <use xlink:href="#facebook"></use>
            </svg></a></li>
      </ul>
    </footer>
  </div>
  <!-- Alhir footer -->
  <script src="bootstrap-5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
