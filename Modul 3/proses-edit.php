<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if (isset($_POST['update'])) {

	// ambil data dari formulir
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$item_grp_id = $_POST['item_grp_id'];
	$satuan_id = $_POST['satuan_id'];
	$hpp = $_POST['hpp'];

	// buat query update
	$sql = "UPDATE item
			SET nama='$nama', item_grp_id='$item_grp_id',
			satuan_id='$satuan_id',hpp='$hpp'
		WHERE id='$id'";
	$query = mysqli_query($db, $sql);

	// apakah query update berhasil?
	if ($query) {
		// kalau berhasil alihkan ke halaman list-siswa.php
		header('Location: index.php');
	} else {
		// kalau gagal tampilkan pesan
		die("Gagal menyimpan perubahan...");
	}
} else {
			header('Location: index.php');
}
