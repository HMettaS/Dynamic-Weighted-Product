<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Weighted Product</title>
  </head>
  <body>
    <main>
      <div class="container-fluid">
        <div class="row flex-nowrap">
          <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">    
              <span class="mt-3 fs-5 d-none d-sm-inline">Weighted Product</span>
              <span class="mt-3 fs-5 d-none d-sm-inline text-muted">Menu</span>               
              <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start px-4 mt-3" id="menu">
                <li class="col">
                  <a href="index.php" class="row btn btn-secondary align-middle">
                    <span class="ms-1 d-none d-sm-inline">Beranda</span>
                  </a>
                </li>
                <br>
                <li>
                  <a href="?page=kriteria" class="row btn btn-secondary align-middle">
                    <span class="ms-1 d-none d-sm-inline">Kriteria</span>
                  </a>
                </li>
                <br>
                <li>
                  <a href="?page=alternatif" class="row btn btn-secondary align-middle">
                    <span class="ms-1 d-none d-sm-inline">Alternatif</span>
                  </a>
                </li>
                <br>
                <li>
                  <a href="?page=penilaian" class="row btn btn-secondary align-middle ">
                    <span class="ms-1 d-none d-sm-inline">Hasil</span>
                  </a>
                </li>
                <br>
                <li>
                  <button class="row align-middle btn btn-danger" data-bs-toggle="modal" data-bs-target ="#modal-hapussemua">
                    <span class="ms-1 d-none d-sm-inline">Hapus Semua</span>
                  </button>
                </li>
              </ul>             
            </div>
        </div>
        <div class="modal fade" id="modal-hapussemua" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">  <!-- Header pop up -->
                <h5 class="modal-title" id="modal-title">Konfirmasi</h5> 
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="row justify-content-center">
                  <p class="mb-2">Apakah anda yakin ingin menghapus semua kriteria, subkriteria dan alternatif ?</p>
                  <a class="btn btn-success col-2" href="hapussemua.php">Yakin</a>
                  <span class="col-2"></span> <!-- Buat spacing -->
                  <button class="btn btn-danger col-2" data-bs-dismiss="modal">Tidak</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col py-3">
          <?php
            include 'function.php';

            if (isset($_GET['page'])){
              switch ($_GET['page']) {
                case 'alternatif':
                  include('alternatif.php');
                  break;                                    
                case 'kriteria':
                  include('kriteria.php');
                  break;
                case 'penilaian':
                  include('penilaian.php');
                  break;
                case 'subkriteria':
                  include('subkriteria.php');
                  break;
                default: // blank
                  break;
              }
            } 
            else { 
              ?>
              <br>
              <h1 align="center" class="mt-3">Selamat Datang !</h1>
              <br>
              <h3 align="center">Ini adalah program Weighted Product dinamis</h3>
              <h3 align="center">berbasis PHP dan MySQL</h3>
              <?php 
            } ?>
        </div>
    </div>
</div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/sidebars.js"></script>
  </body>
</html>