<?php 

  if( isset($_POST['nama']) && isset($_POST['bobot']) > 0 ) {
    include 'function.php';

    $data = [];
    
    $data['nama'] = $_POST['nama'];
    $data['bobot'] = $_POST['bobot'];
    $data['kode'] = $_GET['id'];
    $data['query'] = "INSERT INTO subkriteria (
                        namasubkriteria,
                        bobot,
                        kodekriteria)
                        VALUES (
                        '".$data['nama']."',
                        '".$data['bobot']."',
                        '".$data['kode']."'
                      )";


    if (tambah($data) > 0) {
      echo "<script>alert('Subkriteria Berhasil Di Tambah!');document.location.href = 'index.php?page=subkriteria&id=".$data['kode']."';</script>";
    }
    
    elseif (tambah($data) < 0) {
      echo "<script>alert('Nama Subkriteria Telah Ada !');document.location.href = 'index.php?page=subkriteria&id=".$data['kode']."';</script>";
    }
    
    else echo"<script>alert('Terjadi Kesalahan, hubungi Admin!');document.location.href = 'index.php?page=subkriteria&id=".$data['kode']."';</script>";

  }
  
  else {
    $data['kode'] = $_GET['id'];
    echo "<script>alert('Ada Data Yang Kurang! Cek Kembali!');document.location.href = 'index.php?page=subkriteria&id=".$data['kode']."';</script>";
  }
?>