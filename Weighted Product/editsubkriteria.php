<?php 

  if( isset($_POST['nama']) && isset($_POST['bobot']) > 0 ) {
    include 'function.php';

    $data = [];
    
    $namalama= $_GET['id'];
    $krit=$_GET['krit'];
    $nama = $_POST['nama'];
    $bobot = $_POST['bobot'];

    $data['query'] = "UPDATE subkriteria SET
                        namasubkriteria = '$nama',
                        bobot = '$bobot'
                        WHERE namasubkriteria = '$namalama' AND kodekriteria = '$krit'
                        ";


    if (edit($data) > 0) {
      echo "<script>alert('Subkriteria Berhasil Di Edit!');document.location.href = 'index.php?page=subkriteria&id=".$krit."';</script>";
    }
    
    elseif (edit($data) < 0) {
      echo "<script>alert('Kode Subkriteria Telah Ada !');document.location.href = 'index.php?page=subkriteria&id=".$krit."';</script>";
    }
    
    else echo"<script>alert('Terjadi Kesalahan, hubungi Admin!');document.location.href = 'index.php?page=subkriteria&id=".$krit."';</script>";

  }
  
  else{
    $krit=$_GET['krit'];
    echo "<script>alert('Ada Data Yang Kurang! Cek Kembali!');document.location.href = 'index.php?page=subkriteria&id=".$krit."';</script>"; 
  }
 ?>