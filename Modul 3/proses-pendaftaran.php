<?php

include("config.php");
if (isset($_POST['daftar'])) {

    // ambil data dari formulir
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $item_grp_id = $_POST['item_grp_id'];
    $satuan_id = $_POST['satuan_id'];
    $hpp = $_POST['hpp'];

    // query untuk memasukkan data ke dalam tabel 
    $sql = "INSERT INTO item (id, nama, item_grp_id, satuan_id, hpp)
            VALUES ('$id', '$nama', '$item_grp_id', '$satuan_id', '$hpp')";
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
