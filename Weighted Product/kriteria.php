<h2 align="center">Daftar Kriteria</h2>

	<?php
		$kriteria = ambil("SELECT*FROM kriteria")
	?>

<!-- button pop up tambah -->
<div class="mt-4 ml-5">
	<button
  class="btn btn-primary col-2"
  data-bs-toggle="modal"
  data-bs-target ="#modal-kriteria">  <!-- nama modal untuk trigger pop up -->
  Input Kriteria Baru   <!-- text button -->
  </button>
</div>

<!-- pop up tambah -->
<div class="modal fade" id="modal-kriteria" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">  <!-- Header pop up -->
        <h5 class="modal-title" id="modal-title">Silahkan input kriteria</h5> 
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">  <!-- Body pop up -->
        <div class="row">
            <div class="col">
              <form method="post" action="addkriteria.php">
                <div class="form-group">
                  <label for="kode">Kode Kriteria :</label>
                  <input type="text" id="kode" name="kode"
                  class="form-control" placeholder="C.."
                  maxlength="3" oninput="this.value = this.value.toUpperCase()">
                  <br>
                </div>
                <div class="form-group">
                  <label for="nama">Nama Kriteria :</label>
                  <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama kriteria..">
                  <br>
                </div>
                <div class="form-group">
                  <label for="bobot">Bobot :</label>
                  <input type="number" id="bobot" name="bobot"
                  class="form-control" placeholder="1 - 10" min="1" max="10">
                  <br>
                </div>
                <div class="form-group">
                  <label for="tipe">Tipe kriteria :</label>
                  <div class="ms-4">
                    <input type="radio" id="benefit" name="tipe" value="benefit">
                    <label for="benefit">Benefit</label><br>
                    <input type="radio" id="cost" name="tipe" value="cost">
                    <label for="cost">Cost</label><br>
                  </div>
                  <br>
                </div>
                <div class="row mt-5">
                <button type="reset" class="btn btn-secondary col">
                  Reset Form
                </button>
                <div class="col"></div>
                <div class="col"></div>
                <button type="submit" class="btn btn-primary col" name="add">
                  Tambah Kriteria
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
      <th scope="col">Kode Kriteria</th>
      <th scope="col">Nama Kriteria</th>
      <th scope="col">Bobot Kriteria</th>
      <th scope="col">Tipe Kriteria</th>
      <th scope="col">Aksi</th>
    </tr>
	</thead>

	<?php $num = 1; ?>
	<?php foreach ($kriteria as $data) :	?>

  <tbody>
    <tr>
      <th scope="row"><?= $num; ?></th>
      <td><?= $data["kodekriteria"]; ?></td>
      <td><?= $data["namakriteria"]; ?></td>
      <td><?= $data["bobotkriteria"]; ?></td>
      <td><?= $data["tipekriteria"]; ?></td>
      <td>
        <!-- button pop up edit -->
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target = "#modal-editkriteria<?= $data["kodekriteria"]; ?>">Ubah</button> 
        <a class="btn btn-danger" href="hapusKriteria.php?id=<?= $data["kodekriteria"]; ?>">Hapus</a>
        <a class="btn btn-success" href="?page=subkriteria&id=<?= $data["kodekriteria"]; ?>">Subkriteria</a>
      </td>
    </tr>
  </tbody>

  <!-- Pop Up Edit -->
  <div class="modal fade" id="modal-editkriteria<?= $data["kodekriteria"]; ?>" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">  <!-- Header pop up -->
          <h5 class="modal-title" id="modal-title">Silahkan Edit Kriteria</h5> 
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">  <!-- Body pop up -->
          <div class="row">
              <div class="col">
                <form method="post" action="editkriteria.php?id=<?= $data["kodekriteria"]; ?>">
                  <div class="form-group">
                    <label for="kode">Kode Kriteria :</label>
                    <input type="text" id="kode" name="kode"
                    class="form-control" placeholder="C.."
                    maxlength="3" oninput="this.value = this.value.toUpperCase()" value="<?= $data["kodekriteria"]; ?>">
                    <br>
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama Kriteria :</label>
                    <input type="text" id="nama" name="nama" class="form-control" 
                    placeholder="Nama kriteria.." value="<?= $data["namakriteria"]; ?>">
                    <br>
                  </div>
                  <div class="form-group">
                    <label for="bobot">Bobot :</label>
                    <input type="number" id="bobot" name="bobot"
                    class="form-control" placeholder="1 - 10" min="1" max="10"
                    value="<?= $data["bobotkriteria"]; ?>">
                    <br>
                  </div>
                  <div class="form-group">
                    <label for="tipe">Tipe kriteria :</label>
                    <div class="ms-4">
                      <?php 
                      if ($data["tipekriteria"] == "benefit") {
                        //untuk radio benefit by default
                        echo '
                        <input type="radio" id="benefit" name="tipe" value="benefit" checked="true">
                        <label for="benefit">Benefit</label><br>
                        <input type="radio" id="cost" name="tipe" value="cost">
                        <label for="cost">Cost</label><br>
                        ';
                      } else {
                        //untuk radio Cost by default
                        echo '
                        <input type="radio" id="benefit" name="tipe" value="benefit">
                        <label for="benefit">Benefit</label><br>
                        <input type="radio" id="cost" name="tipe" value="cost" checked="true">
                        <label for="cost">Cost</label><br>
                        ';
                      }
                      
                      ?>
                    </div>
                    <br>
                  </div>
                  <div class="row mt-5">
                  <button type="reset" class="btn btn-secondary col">
                    Reset Form
                  </button>
                  <div class="col"></div>
                  <div class="col"></div>
                  <button type="submit" class="btn btn-primary col" name="edit">
                    Edit Kriteria
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

