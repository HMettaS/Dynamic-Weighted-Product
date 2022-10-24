<?php 
  include 'function.php';
  $data = [];
  $a = 0;
  $dataquery = "";
  $nama = $_POST['nama'];
  array_splice($_POST,0,1);
  foreach ($_POST as $dataalternatif => $value){
    // echo $value.'<br>';
    if ($a < 1) {
      $dataquery .= "'".$value."'";
      $a = $a + 1;
    }
    else {
      $dataquery .= ", '".$value."'";
    }
  }
  $data['query'] = "INSERT INTO alternatif VALUES (
                    '".$nama."',
                    ".$dataquery."
                    )";

  if (tambah($data) > 0) {
      echo "<script>alert('Alternatif Berhasil Di Tambah!');document.location.href = 'index.php?page=alternatif';</script>";
    }
?>