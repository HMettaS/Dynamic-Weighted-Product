<?php 
	$data = [];
	include "function.php";

	$id=$_GET['id'];

	$data['query'] = "DELETE FROM alternatif WHERE namaalternatif = '$id'";

	if (tambah($data) > 0) {
    	echo "<script>alert('Alternatif Berhasil Di Hapus !');document.location.href = 'index.php?page=alternatif';</script>";
    }

    else echo"<script>alert('Error');document.location.href = 'index.php?page=alternatif';</script>";
?>