<?php 
	$data = [];
	include "function.php";

	$id=$_GET['id'];
	$krit=$_GET['krit'];

	$data['query'] = "DELETE FROM subkriteria WHERE namasubkriteria = '$id' AND kodekriteria = '$krit'" ;

	if (hapus($data) > 0) {
      echo "<script>alert('Subkriteria Berhasil Di Hapus !');document.location.href = 'index.php?page=subkriteria&id=".$krit."';</script>";
    }
    elseif (hapus($data) < 0 ) {
    	$krit=$_GET['krit'];
    	echo "<script>alert('Error !');document.location.href = 'index.php?page=subkriteria&id=".$krit."';</script>"; 
    }
    else {
    	$krit=$_GET['krit'];
    	echo"<script>alert('Subkriteria Tidak Ditemukan');document.location.href = 'index.php?page=subkriteria&id=".$krit."';</script>";
	}
?>