<?php $kodekriteria = $_GET['id'];
	$subkriteria = ambil("SELECT*FROM subkriteria WHERE kodekriteria='$kodekriteria' ORDER BY bobot DESC");
  $kriteria = ambil("SELECT*FROM kriteria WHERE kodekriteria='$kodekriteria'");
  foreach ($kriteria as $datakriteria); // Agar data yang didapat di database bisa diolah dalam php
?>

<h2 align="center">Daftar Subkriteria <?= $kodekriteria ?></h2>
<div class="row ms-2">
  <div class="col container mt-4 bg-light">
    <div class="row justify-content-md-left row-cols-2">
      <h5>Kode Kriteria :</h5>
      <label><?= $datakriteria['kodekriteria'];?></label>
      <h5 class="mt-3">Nama Kriteria :</h5>
      <label class="mt-3"><?= $datakriteria['namakriteria'];?></label>
      <h5 class="mt-3">Tipe Kriteria :</h5>
      <label class="mt-3"><?= $datakriteria['tipekriteria'];?></label>
    </div>
  </div>
  <div class="col"></div> <!-- Buat Spacing -->
  <div class="col"></div> <!-- Buat Spacing -->
</div>

<div class="row ms-2 mt-4">
  <button class="col btn btn-success col-2" data-bs-toggle="modal" data-bs-target="#modal-tambahsubkriteria">
    Tambah Subkriteria
  </button>
  <a href="?page=kriteria" class="col btn btn-warning col-2 ms-2">
    Kembali
  </a>
</div>

<!-- pop up tambah -->
    <div class="modal fade" id="modal-tambahsubkriteria" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Header pop up -->
          <div class="modal-header">  
            <h5 class="modal-title" id="modal-title">Silahkan Tambah Subkriteria</h5> 
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
            <div class="row">
              <div class="col">
              
              <form method="post" action="addsubkriteria.php?id=<?= $kodekriteria ?>">
              
                <div class="form-group">
                    <label for="nama">Nama Subkriteria :</label>
                    <input type="text" id="nama" name="nama" class="form-control" 
                    placeholder="Nama Subkriteria..">
                    <br>
                </div>

                <div class="form-group">
                  <label for="bobot">Bobot :</label>
                  <input type="number" id="bobot" name="bobot"
                  class="form-control" placeholder="1 - 10" min="1" max="10">
                  <br>
                </div>

                <div class="row mt-5">
                  <button type="reset" class="btn btn-secondary col">
                    Reset Form
                  </button>
                  <div class="col"></div>
                  <div class="col"></div>
                  <button type="submit" class="btn btn-primary col" name="tambah">
                    Tambah Subkriteria
                  </button>
                </div>

              </form>

              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

<div class="mt-4">
  <table class="table table-hover mt-4">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Subkriteria</th>
        <th scope="col">Bobot Subkriteria</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>

    <?php $num = 1; ?>
    <?php foreach ($subkriteria as $datasub) :  ?>

    <tbody>
      <tr>
        <th scope="row"><?= $num; ?></th>
        <td><?= $datasub["namasubkriteria"]; ?></td>
        <td><?= $datasub["bobot"]; ?></td>
  
        <td> <!-- button pop up edit -->
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-editsubkriteria<?=$datasub["namasubkriteria"]; ?>">Ubah</button>  
          <a class="btn btn-danger" href="hapusSubkriteria.php?id=<?= $datasub["namasubkriteria"]; ?>&krit=<?= $kodekriteria ?>">Hapus</a> 
        </td> 
      </tr>


  <!-- pop up edit -->
    <div class="modal fade" id="modal-editsubkriteria<?= $datasub["namasubkriteria"]; ?>" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Header pop up -->
          <div class="modal-header">  
            <h5 class="modal-title" id="modal-title">Silahkan Edit Subkriteria</h5> 
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
            <div class="row">
              <div class="col">
                <form method="post" action="
                  editsubkriteria.php?id=<?= $datasub["namasubkriteria"]; ?>&krit=<?= $kodekriteria ?>
                  ">
                  
                  <div class="form-group">
                    <label for="nama">Nama Subkriteria :</label>
                    <input type="text" id="nama" name="nama" class="form-control" 
                    placeholder="Nama Subkriteria.." value="<?= $datasub["namasubkriteria"]; ?>">
                    <br>
                  </div>

                  <div class="form-group">
                    <label for="bobot">Bobot :</label>
                    <input type="number" id="bobot" name="bobot"
                    class="form-control" placeholder="1 - 10" min="1" max="10"
                    value="<?= $datasub["bobot"]; ?>">
                    <br>
                  </div>

                  <!-- button -->
                  <div class="row mt-5">
                    <button type="reset" class="btn btn-secondary col">
                      Reset Form
                    </button>
                    <div class="col"></div>
                    <div class="col"></div>
                    <button type="submit" class="btn btn-primary col" name="edit">
                      Edit Subkriteria
                    </button>
                  </div>

                </form>
              </div>
            </div>
          </div>

        </div>
      </div>
      </div>

    <?php 
      $num++; 
      endforeach;
    ?>
  </tbody>
  </table>
</div>