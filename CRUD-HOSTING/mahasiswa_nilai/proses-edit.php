<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if (isset($_POST['simpan'])) {

	// ambil data dari formulir
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$mk = $_POST['mk'];
	$ta = $_POST['ta'];
	$nilai = $_POST['nilai'];

	// buat query update
	$sql = "UPDATE mhs SET nama='$nama', alamat='$alamat', mk_kode='$mk', ta_id='$ta', nilai='$nilai' WHERE id=$id";
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
	die("Akses dilarang...");
}
