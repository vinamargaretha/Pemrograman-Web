<?php

include("config.php");

if (!isset($_GET['id'])) {
	// kalau tidak ada id di query string
	header('Location: index.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database

$sql = "SELECT * FROM item WHERE id='$id'";
$query = mysqli_query($db, $sql);
$barang = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if (mysqli_num_rows($query) < 1) {
	die("data tidak ditemukan...");
}

?>


<!DOCTYPE html>
<html>

<head>
	<title>Formulir Edit Barang | Toko Semar Mesem</title>
</head>

<body>
	<header>
		<h3>Formulir Edit Barang</h3>
	</header>

	<form action="proses-edit.php" method="POST">

		<fieldset>

			<input type="text" name="id" value="<?php echo $barang['id'] ?>"><br>

			<p>
				<label for="nama">Nama: </label>
				<input type="text" name="nama" placeholder="nama lengkap" value="<?php echo $barang['nama'] ?>" />
			</p>

			<p>
				<label for="jenis">Jenis: </label>
				<select name="item_grp_id">
					<?php
					$sql_item_grp = "SELECT * FROM item_grp";
					$res_item_grp = mysqli_query($db, $sql_item_grp);
					while ($item_grp = $res_item_grp->fetch_array(MYSQLI_BOTH)) {
						if ($item_grp['id'] == $barang['item_grp_id'])
							$select = 'selected="selected"';
						else
							$select = '';
						echo "<option value='" . $item_grp['id'] . "' $select>" . $item_grp['nama'] . "</option>";
					}
					?>
				</select>
			</p>
			<p>
				<label for="satuan">Satuan: </label>
				<select name="satuan_id">
					<?php
					$sql_satuan = "SELECT * FROM satuan";
					$res_satuan = mysqli_query($db, $sql_satuan);
					while ($satuan = $res_satuan->fetch_array(MYSQLI_BOTH)) {
						if ($satuan['id'] == $barang['satuan_id'])
							$select = 'selected="selected"';
						else
							$select = '';
						echo "<option value='" . $satuan['id'] . "' $select>" . $satuan['nama'] . "</option>";
					}
					?>
				</select>
			</p>
			<p>
				<label for="hpp">Harga : </label>
				<input type="text" name="hpp" value="<?= $barang['hpp'] ?>"><br>
			</p>
			<p>
				<input type="submit" value="Update" name="update" />
			
				<input type="submit" value="Back" name="back" />
				</p>
		</fieldset>


	</form>

</body>

</html>