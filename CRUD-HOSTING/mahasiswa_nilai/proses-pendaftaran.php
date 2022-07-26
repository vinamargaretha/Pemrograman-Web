<?php

include("config.php");
if (isset($_POST['daftar'])) {

    // ambil data dari formulir
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $mk = $_POST['mk'];
    $ta = $_POST['ta'];
    $nilai = $_POST['nilai'];

    // query untuk memasukkan data ke dalam tabel calon_mahasiswa
    $sql = "INSERT INTO mhs (id, nama, alamat, mk_kode, ta_id, nilai) VALUE ('$id', '$nama', '$alamat', '$mk', '$ta', '$nilai')";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if ($query) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: index.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: index.php?status=gagal');
    }
} else {
    die("Akses dilarang...");
}
