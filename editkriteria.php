<?php 
  if( isset($_POST['kode']) && isset($_POST['nama']) && isset($_POST['bobot']) && isset($_POST['tipe']) ) {
    include 'function.php';

    $data = [];
    
    $kodelama= $_GET['id'];
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $bobot = $_POST['bobot'];
    $tipe = $_POST['tipe'];

    $data['query'] = "UPDATE kriteria SET
                        kodekriteria = '$kode',
                        namakriteria = '$nama',
                        bobotkriteria = '$bobot',
                        tipekriteria = '$tipe'
                        WHERE kodekriteria = '$kodelama'
                        ";


    if (edit($data) > 0) {
      echo "<script>alert('Kriteria Berhasil Di Edit!');document.location.href = 'index.php?page=kriteria';</script>";
    }
    
    elseif (edit($data) < 0) {
      echo "<script>alert('Kode Kriteria Telah Ada !');document.location.href = 'index.php?page=kriteria';</script>";
    }
    
    else echo"<script>alert('Terjadi Kesalahan, hubungi Admin!');document.location.href = 'index.php?page=kriteria';</script>";

  }else echo "<script>alert('Ada Data Yang Kurang! Cek Kembali!');document.location.href = 'index.php?page=kriteria';</script>";
 ?>