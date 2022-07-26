<?php
include "koneksi.php";

//Menambah Data
if (isset($_POST['proses']) and $_POST['proses'] == 'SIMPAN'){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $item_grp_id = $_POST['item_grp_id'];
	$barcode = $_POST['barcode'];
    $satuan_id = $_POST['satuan_id']; 
    $hpp = $_POST['hpp'];
	$supplier = $_POST['supplier'];

    $sql = "INSERT INTO item (id, nama, item_grp_id, barcode, satuan_id, hpp, supplier)
            VALUES ('$id', '$nama', '$item_grp_id', '$barcode', '$satuan_id', '$hpp', '$supplier')";
    if (!$res = $conn->query($sql))
        echo $sql;
    else 
        header("Location: penjualan.php");
}

//Mengubah Data
if(isset($_POST['proses']) && $_POST['proses']=='PERBAHARUI'){
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$item_grp_id = $_POST['item_grp_id'];
	$barcode = $_POST['barcode'];
	$satuan_id = $_POST['satuan_id'];
	$hpp = $_POST['hpp'];
	$supplier = $_POST['supplier'];
	

	$sql = "UPDATE item
			SET nama='$nama', item_grp_id='$item_grp_id', barcode='$barcode',
			satuan_id='$satuan_id', hpp='$hpp', supplier='$supplier'
		WHERE id='$id'";
	if(!$res = $conn->query($sql))
		echo $sql;
	else
		header("Location: penjualan.php");
}

//Menghapus data
if(isset($_POST['proses']) && $_POST['proses']=='HAPUS'){
	echo "hapus";
	$id = $_POST['id'];
	$sql = "DELETE FROM item
			WHERE id='$id'";
	if(!$res = $conn->query($sql))
		echo $sql;
	else
		header("Location: penjualan.php");
}

?>
