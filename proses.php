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
function cariVocher($kode)
{
  // Baca data dari file JSON
  $json_data = file_get_contents('vocher.json');
  $data = json_decode($json_data, true);

  // Loop melalui data
  foreach ($data['vocher'] as $item) {
    if ($item['kode'] == $kode) {
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
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6">
        <h2>Invoice Pembelian</h2>
        <p><strong>Nomor Invoice:</strong> INV-001-<?= date("dmY") ?></p>
        <p><strong>Tanggal:</strong> <?= date("d-F-Y") ?></p>
        <p><strong>Nama Toko:</strong> Seefan</p>
      </div>
      <div class="col-md-6 text-right">
        <h4>Informasi Pembeli</h4>
        <p><strong>Nama :</strong> <span id="nama"><?= $_POST['nama'] ?></span></p>
        <p><strong>Alamat :</strong> <span id="alamat"><?= $_POST['alamat'] ?></span></p>
        <!-- <p><strong>Nama :</strong> <span id="nama"></span></p>
        <p><strong>Alamat :</strong> <span id="alamat"></span></p> -->
        <!-- Anda dapat menambahkan informasi lainnya tentang supplier di sini -->
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-12">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col" class="bg-primary">No.</th>
              <th scope="col" class="bg-primary">Nama Produk</th>
              <th scope="col" class="bg-primary">Harga Satuan</th>
              <th scope="col" class="bg-primary">Jumlah</th>
              <th scope="col" class="bg-primary">Total</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['keranjang'])) {
              // Baca data jumlah berdasarkan ID
              $jumlah_produk = $_POST['jumlah'];
              // Baca data ID produk yang dimasukkan ke keranjang
              $keranjang_produk = $_POST['keranjang'];
              $totalakhir = 0;
              $no = 0;
              // Loop untuk mengakses data tiap ID
              foreach ($keranjang_produk as $id_produk) {
                // Cek apakah ID ada di data jumlah
                if (isset($jumlah_produk[$id_produk])) {
                  $jumlah = $jumlah_produk[$id_produk];
                  $result = cariDataById($id_produk);
                  if ($result != null) {
                    if ($jumlah == null || $jumlah < 0 || $jumlah == 0) {

                      echo "<div class='alert alert-danger' role='alert'>
                              Anda Tidak Memasukan Jumlah Untuk produk " . $result['nama'] . " di Keranjang
                            </div>";
                      continue;
                    }
                    $total = $result['harga'] * $jumlah;
                  }
                  $no++;
                  echo "<tr>
                          <th scope='row'>" . $no . "</th>
                          <td>" . $result['nama'] . "</td>
                          <td>Rp. " . $result['harga'] . "</td>
                          <td>" . $jumlah . "</td>
                          <td>Rp. " . $total . "</td>
                          </tr>";
                  $totalakhir = $totalakhir + $total;
                }
              }
              if (isset($_POST['vocher'])) {
                $resultvocher = cariVocher($_POST['vocher']);
                $potongan = 0;
                if ($resultvocher != null) {
                  $potongan = $resultvocher['potongan'];
                  $totalakhir = $totalakhir - $potongan;
                  if ($totalakhir <= 0) {
                    $totalakhir = 0;
                  }
                } else {
                  echo "<div class='alert alert-secondary' role='alert'>
                             voucher tidak di temukan
                            </div>";
                }
                $no++;
                echo "<tr>
                        <th colspan='4' class='text-right bg-warning'>Potongan Voucher ".@$_POST['vocher']."</th>
                        <td class='bg-warning'>Rp. $potongan</td>
                      </tr>";
              }
              echo "<tfoot>
                      <tr>
                        <th colspan='4' class='text-right'>Total Pembelian</th>
                        <td>Rp. " . $totalakhir . "</td>
                      </tr>
                    </tfoot>";
            } else {
              header("location: belanja.php");
            } ?>
        </table>
      </div>
    </div>

    <div class="row mt-3 mb-5">
      <div class="col-md-12 text-right">
        <a href="belanja.php" class="btn btn-secondary">Kembali</a>
        <a href="https://wa.me/62895631337014" class="btn btn-success" target="_blank">Bayar Invoice</a>
      </div>
    </div>
  </div>
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
    window.onload = function() {
      var simpanNama = sessionStorage.getItem('nama');
      var simpanAlamat = sessionStorage.getItem('alamat');
      if (simpanNama) {
        // Jika ada data, tetapkan nilai input ke nilai yang tersimpan
        document.getElementById('nama').innerText  = simpanNama;
      }
      if (simpanAlamat) {
        // Jika ada data, tetapkan nilai input ke nilai yang tersimpan
        document.getElementById('alamat').innerText  = simpanAlamat;
      }
    };
  </script>
  <script src="bootstrap-5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="js/jquery-3.5.1.slim.min.js"></script>
  <script src="js/popper.min.js"></script>
</body>

</html>
