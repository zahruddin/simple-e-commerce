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
  <div class="album pt-3 bg-body-tertiary">
    <div class="container">
      <form action="proses.php" method="post">
        <!-- Input vocher -->
        <!-- <h5>Lakukan Simpan Data Terlebih Dahulu</h5> -->
        <div class="mb-2">
          <div class="form-text" id="basic-addon4">Masukan Nama Anda disini</div>
          <div class="input-group">
            <span class="input-group-text" id="basic-addon3">Nama</span>
            <input type="text" class="form-control" id="nama" name="nama" aria-describedby="basic-addon3 basic-addon4" required>
          </div>
        </div>
        <div class="mb-2">
          <div class="form-text" id="basic-addon4">Masukan Alamat Anda disini</div>
          <div class="input-group">
            <span class="input-group-text" id="basic-addon3">Alamat</span>
            <input type="text" class="form-control" id="alamat" name="alamat" aria-describedby="basic-addon3 basic-addon4" required>
          </div>
        </div>
        <!-- <div class="mb-3">
          <button class="btn btn-sm btn-success" onclick="simpanData()">Simpan</button>
          <button class="btn btn-sm btn-danger" onclick="resetData()">Reset</button>
        </div> -->
        <div class="mb-3">
          <div class="form-text" id="basic-addon4">Masukan Kode voucher disini</div>
          <div class="input-group">
            <span class="input-group-text" id="basic-addon3">Kode Voucher</span>
            <input type="text" class="form-control" name="vocher" id="vocher" aria-describedby="basic-addon3 basic-addon4">
          </div>
        </div>

        <!-- Akhir Input vocher -->

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
          <?php
          // Baca data dari file JSON
          $json_data = file_get_contents('produk.json');
          $data = json_decode($json_data, true);
          foreach ($data['produk'] as $produk) {
          ?>
            <div class="col">
              <div class="card shadow-sm">
                <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"></rect>
              <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
            </svg> -->
                <!-- <img src="http://source.unsplash.com/300x200?arduino" alt=""> -->
                <img src="img/produk/<?= $produk['gambar1'] ?>" alt="">
                <div class="card-body">
                  <h3 class=""><b><?= $produk['nama'] ?></b></h3>
                  <p class="card-text overflow">
                    <?= $produk['deskripsi'] ?>
                  </p>
                  <p><span class="badge text-bg-success"><?= "Rp " . $produk['harga'] ?></span></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <a href="detail.php?id=<?= $produk['id'] ?>" class="btn btn-sm btn-primary">
                        Detail Produk
                      </a>
                    </div>
                    <small class="text-body-success"><?= $produk['status'] ?></small>
                  </div>
                  <div class="d-flex justify-content-between align-items-center py-2">
                    <label class="" for="<?= $produk['id'] . "jumlah" ?>"><small class="text-body-success">Jumlah</small></label>
                    <input type="number" name="jumlah[<?= $produk['id'] ?>]" class="form-control" style="margin-right: 20%; margin-left: 2%;" id="<?= $produk['id'] . "jumlah" ?>" min="0" value="1">
                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                      <input type="checkbox" class="btn-check" name="keranjang[<?= $produk['id'] ?>]" id="<?= $produk['id'] ?>" autocomplete="off" value="<?= $produk['id'] ?>">
                      <label class="btn btn-sm btn-outline-success" for="<?= $produk['id'] ?>">Keranjang</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
        <div class="sticky-bottom d-flex justify-content-center mt-3">
          <button type="submit" class="btn btn-success btn-md px-5" style="margin-bottom: 5%;">Beli</button>
        </div>
      </form>
    </div>
  </div>
  <!-- akhir album -->
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
  <script>
    function simpanData() {
      var dataNama = document.getElementById('nama').value;
      sessionStorage.setItem('nama', dataNama);
      var dataAlamat = document.getElementById('alamat').value;
      sessionStorage.setItem('alamat', dataAlamat);
      alert('Data berhasil disimpan!');
    }

    // Fungsi untuk mereset session
    function resetData() {
      // Menghapus data dari session storage
      sessionStorage.removeItem('nama');
      sessionStorage.removeItem('alamat');
      alert('Session storage berhasil direset!');
    }
    window.onload = function() {
      var simpanNama = sessionStorage.getItem('nama');
      var simpanAlamat = sessionStorage.getItem('alamat');
      if (simpanNama) {
        // Jika ada data, tetapkan nilai input ke nilai yang tersimpan
        document.getElementById('nama').value = simpanNama;
      }
      if (simpanAlamat) {
        // Jika ada data, tetapkan nilai input ke nilai yang tersimpan
        document.getElementById('alamat').value = simpanAlamat;
      }
    };
  </script>



  <script src="bootstrap-5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
