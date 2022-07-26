<?php

include("config.php");

if (isset($_GET['id'])) {

	// ambil id dari query string
	$id = $_GET['id'];

	// buat query hapus
	$sql = "DELETE FROM item
			WHERE id='$id'";
	$query = mysqli_query($db, $sql);

	// apakah query hapus berhasil?
	if ($query) {
		// kalau berhasil alihkan ke halaman index.php dengan status=sukses
		header('Location: index.php?load=yes');
	} else {
		// kalau gagal alihkan ke halaman indek.php dengan status=gagal
		header('Location: index.php?load=not');
	}
} else {
	die("akses dilarang...");
}
