<h2 align="center">Daftar Alternatif</h2>

	<?php
		$alternatif = ambil("SELECT*FROM alternatif");
    $kriteria = ambil("SELECT*FROM kriteria");
	?>

<!-- button pop up tambah -->
<div class="mt-4 ml-5">
	<button
  class="btn btn-primary col-2"
  data-bs-toggle="modal"
  data-bs-target ="#modal-alternatif">  <!-- nama modal untuk trigger pop up -->
  Input Alternatif Baru   <!-- text button -->
  </button>
</div>

<!-- pop up tambah -->
<div class="modal fade" id="modal-alternatif" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">  <!-- Header pop up -->
        <h5 class="modal-title" id="modal-title">Silahkan input Alternatif</h5> 
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">  <!-- Body pop up -->
        <div class="row">
            <div class="col">
              <form method="post" action="addalternatif.php">
                <div class="form-group">
                  <label for="nama">Nama Alternatif :</label>
                  <input type="text" id="nama" name="nama"
                  class="form-control" placeholder="Nama Alternatif">
                  <br>
                </div>

                <!-- Ambil Kriteria sebagai label dan Subkriteria sebagai pilihan -->
                <?php foreach ($kriteria as $datakriteria) { 
                    $editstring = str_replace(' ', '', $datakriteria['namakriteria']);
                    $editstring = str_replace('-', '', $editstring);
                    $editstring = str_replace(',', '', $editstring);
                    $editstring = str_replace('.', '', $editstring);
                  ?>
                <div class="row form-group mt-4">
                <label class="col-lg-5"><?= $datakriteria['namakriteria'] ?> :</label>

                <select class="form-select col" name=<?= $editstring ?>>
                  <option selected disabled="true">Select menu</option>
                  <?php
                    
                    $kodekriteria = $datakriteria['kodekriteria']; 
                    $subkriteria = ambil("SELECT*FROM subkriteria WHERE kodekriteria = '$kodekriteria' ");
                    foreach ($subkriteria as $datasub) {
                      ?>
                      <option value="<?= $datasub['namasubkriteria'] ?>"><?= $datasub['namasubkriteria'] ?></option>
                      <?php
                    }
                  ?>
                </select>
                </div>
                <?php } ?>

                <div class="row mt-5">
                <button type="reset" class="btn btn-secondary col">
                  Reset Form
                </button>
                <div class="col"></div>
                <div class="col"></div>
                <button type="submit" class="btn btn-primary col">
                  Tambah Alternatif
                </button>
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>    
  </div>
</div>

<!-- Tabel Kriteria -->
<table class="table table-hover mt-4">
	<thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Alternatif</th>
      <?php foreach ($kriteria as $datakriteria) { ?>
      <th scope="col"><?= $datakriteria['namakriteria'] ?></th>
      <?php } ?>
      <th scope="col">Aksi</th>
    </tr>
	</thead>

	<?php $num = 1;?>
	<?php foreach ($alternatif as $dataalternatif) :	?>

  <tbody>
    <tr>
      <th scope="row"><?= $num; ?></th>
      <td><?= $dataalternatif["namaalternatif"]; ?></td>
      <?php foreach ($kriteria as $datakriteria) {
        $editstring = str_replace(' ', '', $datakriteria['namakriteria']);
        $editstring = str_replace('-', '', $editstring);
        $editstring = str_replace(',', '', $editstring);
        $editstring = str_replace('.', '', $editstring);
      ?>
      <td scope="row"><?= $dataalternatif["$editstring"]; ?></td>
      <?php } ?>
      <td>
        <!-- button pop up edit -->
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target = "#modal-editalternatif<?= str_replace(' ', '', $dataalternatif["namaalternatif"]) ?>">Ubah</button> 
        <a class="btn btn-danger" href="hapusalternatif.php?id=<?= $dataalternatif["namaalternatif"] ?>">Hapus</a>
      </td>
    </tr>
  </tbody>

  <!-- Pop Up Edit -->
  <div class="modal fade" id="modal-editalternatif<?= str_replace(' ', '', $dataalternatif["namaalternatif"]) ?>" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">  <!-- Header pop up -->
          <h5 class="modal-title" id="modal-title">Silahkan Edit Alternatif</h5> 
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">  <!-- Body pop up -->
          <div class="row">
              <div class="col">
                <form method="post" action="editalternatif.php?id=<?= $dataalternatif["namaalternatif"]; ?>">
                  <div class="form-group">
                    <label for="kode">Nama Alternatif :</label>
                    <input type="text" id="kode" name="namaalternatif"
                    class="form-control" placeholder="Nama Alternatif" value="<?= $dataalternatif["namaalternatif"]; ?>">
                    <br>
                  </div>

                  <?php foreach ($kriteria as $datakriteria) { ?>  
                  <div class="form-group">
                  <label for="nama"><?= $datakriteria['namakriteria'] ?> :</label>
                    <select type="text" id="nama" name="<?= str_replace(' ', '', $datakriteria['namakriteria']) ?>" class="form-select" 
                    placeholder="Nama kriteria..">

                    <!-- mengambil data alternatif lama dari tabel sebagai option default -->
                    <<?php 
                      $editstring = str_replace(' ', '', $datakriteria['namakriteria']);
                      $editstring = str_replace('-', '', $editstring);
                      $editstring = str_replace(',', '', $editstring);
                      $editstring = str_replace('.', '', $editstring);
                      $sublama = $dataalternatif[$editstring] ?>
                    <option selected disabled value="$sublama"><?= $sublama ?></option>
                  <?php
                    $kodekriteria = $datakriteria['kodekriteria']; 
                    $subkriteria = ambil("SELECT*FROM subkriteria WHERE kodekriteria = '$kodekriteria' AND namasubkriteria != '$sublama' ");
                    foreach ($subkriteria as $datasub) {
                      ?>
                      <option value="<?= $datasub['namasubkriteria'] ?>"><?= $datasub['namasubkriteria'] ?></option>
                      <?php
                    }
                  ?>
                    </select>
                  </div>
                  <br>
                  <?php } ?>
                  <div class="row mt-5">
                  <button type="reset" class="btn btn-secondary col">
                    Reset Form
                  </button>
                  <div class="col"></div>
                  <div class="col"></div>
                  <button type="submit" class="btn btn-primary col">
                    Edit Alternatif
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

</table>

