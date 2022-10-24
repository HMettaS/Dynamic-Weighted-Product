<?php 
	$data = [];
	include "function.php";

	$id=$_GET['id'];

	// mencari nama kriteria 
	$data['query'] = "SELECT * FROM kriteria WHERE kodekriteria = '$id'";
	$result = mysqli_query($conn, $data['query']);
	foreach ($result as $data);

	$data['query'] = "DELETE FROM kriteria WHERE kodekriteria = '$id'";

	if (tambah($data) > 0) {
		$data['query'] = "ALTER TABLE alternatif DROP ".str_replace(' ', '', $data['namakriteria']);
    	mysqli_query($conn, $data['query']);
    	echo "<script>alert('Kriteria Berhasil Di Hapus !');document.location.href = 'index.php?page=kriteria';</script>";
    }
    elseif (tambah($data) < 0 ) {
    	echo "<script>alert('Hapus Subkriteria dulu !');document.location.href = 'index.php?page=kriteria';</script>"; 
    }
    else echo"<script>alert('Kriteria Tidak Ditemukan');document.location.href = 'index.php?page=kriteria';</script>";
?>