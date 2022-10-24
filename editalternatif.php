<?php
    include 'function.php';

    $data = [];
    $queue = "";
    $namalama = $_GET['id'];
    $num = 0;

    foreach ($_POST as $namakolom => $value) {
      if ($num < 1) {
        $queue .= $namakolom." = '".$value."'";
        $num++;
      }
      else {
        $queue .= ", ".$namakolom." = '".$value."'";
      }
    }

    $data['query'] = "UPDATE alternatif SET
                        $queue
                        WHERE namaalternatif  = '$namalama'
                        ";

    if (edit($data) > 0) {
      echo "<script>alert('Alternatif Berhasil Di Edit!');document.location.href = 'index.php?page=alternatif';</script>";
    }
    
    else {
      echo "<script>alert('Error !');document.location.href = 'index.php?page=kriteria';</script>";
    }
?>