<?php 
  if( isset($_POST['kode']) && isset($_POST['nama']) && isset($_POST['bobot']) && isset($_POST['tipe']) > 0 ) {
    include 'function.php';

    $data = [];
    
    $data['kode'] = $_POST['kode'];
    $data['nama'] = $_POST['nama'];
    $data['bobot'] = $_POST['bobot'];
    $data['tipe'] = $_POST['tipe'];

    $data['query'] = "INSERT INTO kriteria (
                        kodekriteria,
                        namakriteria,
                        bobotkriteria,
                        tipekriteria)
                        VALUES (
                        '".$data['kode']."',
                        '".$data['nama']."',
                        '".$data['bobot']."',
                        '".$data['tipe']."'
                      )";

    $editstring = str_replace(' ', '', $data['nama']);
    $editstring = str_replace('-', '', $editstring);
    $editstring = str_replace(',', '', $editstring);
    $editstring = str_replace('.', '', $editstring);

    if (tambah($data) > 0) {
      $data['query'] = "ALTER TABLE alternatif ADD ".$editstring." VARCHAR(100)";
      mysqli_query($conn, $data['query']);
      echo "<script>alert('Kriteria Berhasil Di Tambah!');document.location.href = 'index.php?page=kriteria';</script>";
    }
    
    elseif (tambah($data) < 0) {
      echo "<script>alert('Kode Kriteria Telah Ada !');document.location.href = 'index.php?page=kriteria';</script>";
    }
    
    else echo"<script>alert('Terjadi Kesalahan, hubungi Admin!');document.location.href = 'index.php?page=kriteria';</script>";

  }else echo "<script>alert('Ada Data Yang Kurang! Cek Kembali!');document.location.href = 'index.php?page=kriteria';</script>";
 ?>