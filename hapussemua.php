<?php
	include 'function.php';

	$data = [];

	// subkriteria
	$data['query'] = "DELETE FROM subkriteria";

	if (hapus($data) < 0) {
		echo "<script>alert('Terjadi error ketika ingin menghapus subkriteria !');document.location.href = 'index.php;</script>";
	}

	// alternatif
	$kriteria = ambil("SELECT namakriteria FROM kriteria");
	foreach ($kriteria as $key => $valuekriteria) {
		foreach ($valuekriteria as $key => $namakriteria) {
		$data['query'] = "ALTER TABLE alternatif DROP ".str_replace(' ', '', $namakriteria);
		mysqli_query($conn, $data['query']);
		}
	}
	$data['query'] = "DELETE FROM alternatif";
	if (hapus($data) < 0) {
		echo "<script>alert('Terjadi error ketika ingin menghapus alternatif !');document.location.href = 'index.php;</script>";
	}

	// kriteria
	$data['query'] = "DELETE FROM kriteria";

	if (hapus($data) < 0) {
		echo "<script>alert('Terjadi error ketika ingin menghapus kriteria !');document.location.href = 'index.php;</script>";
	}

	header("location: index.php");
?>