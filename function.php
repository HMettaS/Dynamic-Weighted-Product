<?php
	$conn = mysqli_connect("localhost", "root", "", "weightedproduct");

	function ambil($query) {
		global $conn;
		$result = mysqli_query($conn, $query);
		$rows = [];
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		return $rows;
	}

	function tambah($data){
		global $conn;

		mysqli_query($conn, $data["query"]);

		return mysqli_affected_rows($conn);
	}

	function hapus($data){
		global $conn;
		
		mysqli_query($conn, $data["query"]);

		return mysqli_affected_rows($conn);
	}

	function edit($data){
		global $conn;
		
		mysqli_query($conn, $data["query"]);

		return mysqli_affected_rows($conn);
	}
?>