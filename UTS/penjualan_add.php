<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data</title>
</head>
<body>
	<h2>Tambah Data Barang</h2>
	<a href="penjualan_add.php">TAMBAH</a> <a href="penjualan.php">LIHAT</a>
	<br>
	<form action="penjualan_proc.php" method="post">
		ID<br>
		<input type="text" name="id"><br>
		Nama<br>
		<input type="text" name="nama"><br>
		Jenis<br>
		<select name="item_grp_id">
			<?php 
				$sql = "SELECT * FROM item_grp";
				$res = $conn->query($sql);
				while($rows = $res->fetch_array(MYSQLI_BOTH)){
					echo "<option value='".$rows['id']."'>".$rows['nama']."</option>";
				}
			?>
		</select><br>
		Barcode<br>
		<input type="text" name="barcode"><br>
		Satuan<br>
		<select name="satuan_id">
			<?php 
				$sql = "SELECT * FROM satuan";
				$res = $conn->query($sql);
				while ($rows = $res->fetch_array(MYSQLI_BOTH)){
					echo "<option value ='".$rows['id']."'>".$rows['nama']."</option>";
				}
			?>
		</select><br>
		Harga<br>
		<input type="text" name="hpp"><br>
		supplier<br>
		<input type="text" name="supplier"><br>
		<input type="submit" name="proses" value="SIMPAN">
</form>
</body>
</html>