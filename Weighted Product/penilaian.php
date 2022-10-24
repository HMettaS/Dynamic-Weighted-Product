<h1 align="center">Hasil Perhitungan</h1>
<br>

<?php
	$kriteria = ambil("SELECT*FROM kriteria");
  $subkriteria = ambil("SELECT*FROM subkriteria");
  $alternatif = ambil("SELECT*FROM alternatif");
  $num = 1;
?>

<h3>Bobot Per Kriteria :</h3>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kode Kriteria</th>
      <th scope="col">Nama Kriteria</th>
      <th scope="col">Bobot Kriteria</th>
    </tr>
  </thead>
  <tbody>
  <?php $sumkriteria = 0; foreach ($kriteria as $datakriteria) {  ?>
    <tr>
      <th scope="row"><?= $num; ?></th>
      <td><?= $datakriteria["kodekriteria"]; ?></td>
      <td><?= $datakriteria["namakriteria"]; ?></td>
      <td><?= $datakriteria["bobotkriteria"]; ?></td>
    </tr>
  <?php
    $sumkriteria = $sumkriteria + $datakriteria["bobotkriteria"];
    $num++;
    }
    $num = 1; 
  ?>
  </tbody>
</table>
<h3>Total Bobot Kriteria : <?= $sumkriteria ?></h3>

<br><br>

<h3>Perbaikan Bobot per Kriteria :</h3>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kode Kriteria</th>
      <th scope="col">Bobot Hasil Perbaikan</th>
    </tr>
  </thead>
  <tbody>
    <?php $bobotperbaikan = []; foreach ($kriteria as $datakriteria) {  ?>
    <tr>
      <th scope="row"><?= $num; ?></th>
      <td><?= $datakriteria["kodekriteria"]; ?></td>
      <td><?= round($datakriteria["bobotkriteria"]/$sumkriteria, 4); ?></td>
    </tr>
  <?php
    $bobotperbaikan[] = round($datakriteria["bobotkriteria"]/$sumkriteria, 4);
    $num++;
    }
    $num = 1;
  ?>
  </tbody>
</table>

<br><br>

<h3>Alternatif dan Kriteria :</h3>
<table class="table table-hover mt-2">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Alternatif</th>
      <?php foreach ($kriteria as $datakriteria) { ?>
      <th scope="col"><?= $datakriteria['kodekriteria'] ?> (<?= $datakriteria['namakriteria'] ?>)</th>
      <?php } ?>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($alternatif as $dataalternatif) { ?>
    <tr>
      <th scope="row"><?= $num ?></th>
      <td><?= $dataalternatif["namaalternatif"]; ?></td>
      <?php foreach ($kriteria as $datakriteria) { 
        $editstring = str_replace(' ', '', $datakriteria['namakriteria']);
        $editstring = str_replace('-', '', $editstring);
        $editstring = str_replace(',', '', $editstring);
        $editstring = str_replace('.', '', $editstring);
      ?>
      <td scope="row"><?= $dataalternatif[$editstring]; ?></td>
      <?php } ?>
    </tr>
    <?php $num++; } $num = 1; ?>
  </tbody>
</table>

<br><br>

<h3>Nilai Bobot per Alternatif berdasarkan Subkriteria :</h3>
<table class="table table-hover mt-2">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Alternatif</th>
      <?php foreach ($kriteria as $datakriteria) { ?>
      <th scope="col"><?= $datakriteria['kodekriteria'] ?> (<?= $datakriteria['namakriteria'] ?>)</th>
      <?php } ?>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($alternatif as $dataalternatif) { ?>
    <tr>
      <th scope="row"><?= $num ?></th>
      <td><?= $dataalternatif["namaalternatif"]; ?></td>
      <?php
        foreach ($kriteria as $datakriteria) {
        $editstring = str_replace(' ', '', $datakriteria['namakriteria']);
        $editstring = str_replace('-', '', $editstring);
        $editstring = str_replace(',', '', $editstring);
        $editstring = str_replace('.', '', $editstring);
        $kodekriteria = $datakriteria['kodekriteria']; 
        $namasub = $dataalternatif[$editstring];
        $bobotsubkriteria = ambil("SELECT*FROM subkriteria WHERE kodekriteria = '$kodekriteria' AND namasubkriteria = '$namasub'");
        foreach ($bobotsubkriteria as $datsubkriteria => $bobot) {
          ?>
          <td><?= $bobot['bobot'] ?></td>
          <?php
        }
        }
      ?>
    </tr>
    <?php $num++; } $num = 1; ?>
  </tbody>
</table>

<br><br>

<h3>Nilai Vektor S :</h3>
<?php
  $index = 0;
  $hasil = 1;
  $Stotal = 0;
  $hasilS = [];
  foreach ($alternatif as $dataalternatif) {
    echo '<div>S'.$num.' = ';
    foreach ($kriteria as $datakriteria) {
      $editstring = str_replace(' ', '', $datakriteria['namakriteria']);
      $editstring = str_replace('-', '', $editstring);
      $editstring = str_replace(',', '', $editstring);
      $editstring = str_replace('.', '', $editstring);
      $kodekriteria = $datakriteria['kodekriteria']; 
      $namasub = $dataalternatif[$editstring];
      $bobotsubkriteria = ambil("SELECT*FROM subkriteria WHERE kodekriteria = '$kodekriteria' AND namasubkriteria = '$namasub'");
      foreach ($bobotsubkriteria as $datsubkriteria => $bobot) {
        if (($index+1) <= count($bobotperbaikan)) {
          if (strtolower($datakriteria['tipekriteria']) == "cost") {
            $pangkat = $bobot['bobot'] ** (-$bobotperbaikan[$index]);
            $hasil = round($hasil * $pangkat, 4);
            echo "(".$bobot['bobot']."^-".$bobotperbaikan[$index].")";
            $index++;
          } else {
            $pangkat = $bobot['bobot'] ** $bobotperbaikan[$index];
            $hasil = round($hasil * $pangkat, 4);
            echo "(".$bobot['bobot']."^".$bobotperbaikan[$index].")";
            $index++;
          }
        }
      }
    }
    echo " = ".$hasil."</div>";
    $Stotal = $Stotal + $hasil;
    $hasilS[] = $hasil;
    $index = 0;
    $hasil = 1;
    $num++;
  }
  $num = 1;
?>

<br><br>

<h3>Nilai Total Vektor S : <?= $Stotal ?></h3>

<br><br>

<h3>Nilai Vektor V :</h3>
<?php
  $semuaV = [];
  foreach ($hasilS as $S => $valueS) {
    $nilaiV = round($valueS / $Stotal, 4);
    echo "V".$num. " = ".$valueS."/".$Stotal." = ".$nilaiV."<br>";
    $semuaV[] = $nilaiV;
    $num++;
  }
  $num = 1; 
?>

<br><br>

<h3>Rank :</h3>
<?php 
  foreach ($semuaV as $V => $valueV) {
    $kodealternatif = array_search(max($semuaV), $semuaV);
    echo "Rank ".$num." : A".($kodealternatif+1)." dengan nilai V : ".max($semuaV)."<br>";
    $semuaV[$kodealternatif] = 0;
    $num++;
  }
?>