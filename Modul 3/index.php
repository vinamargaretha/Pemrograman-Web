<?php include("config.php"); ?>
<!DOCTYPE html>
<html>

<head>
	<title>Laporan Penjualan | Toko Semar Mesem</title>
</head>

<body>
	<header>
		<center>
			<h3>Laporan Penjualan</h3>
		</center>
	</header>

	<nav>
		<a href="form-daftar.php">[+] Tambah Baru</a>
	</nav>

	<br>

	<table border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>ID</th>
				<th>Nama</th>
				<th>Jenis</th>
				<th>Satuan</th>
				<th>Harga</th>
				<th>Action</th>
				
			</tr>
		</thead>
		<tbody>

			<?php
			$sql = "SELECT I.*,IG.id as ig_id, IG.nama as ig_nama, S.id as s_id, S.nama as s_nama
			FROM item I
			JOIN item_grp IG ON I.item_grp_id = IG.id
			JOIN satuan S ON I.satuan_id = S.id";

			$query = $db->query($sql);
			$i = 0;
			while ($barang = $query->fetch_array(MYSQLI_BOTH)) {
				$i++;
				echo "<tr>";
				echo "<td align='center'>$i</td>";
				echo "<td>" . $barang['id'] . "</td>";
				echo "<td>" . $barang['nama'] . "</td>";
				echo "<td>" . $barang['ig_nama'] . "</td>";
				echo "<td>" . $barang['s_nama'] . "</td>";
				echo "<td>" . $barang['hpp'] . "</td>";
				


				echo "<td>";
				echo "| <a href='form-edit.php?id=" . $barang['id'] . "'>Edit</a> | ";
				echo "<a href='hapus.php?id=" . $barang['id'] . "'>Hapus</a> | ";


				// <?php
				echo "</td>";

				echo "</tr>";
			}
			?>

		</tbody>
	</table>

	<p>Total: <?php echo mysqli_num_rows($query) ?></p>




	<?php if (isset($_GET['status'])) : ?>
		<p>
			<?php
			if ($_GET['status'] == 'sukses') {
			?>
				<script>
					alert("Selamat Data Dapat Tersubmit");
				</script>
			<?php
			} else {
			?>
				<script>
					alert("Maaf Data Tidak Dapat Tersubmit, Silahkan dicoba kembali!");
				</script>
			<?php
			}
			?>
		</p>
	<?php endif; ?>

	<?php if (isset($_GET['load'])) : ?>
		<p>
			<?php
			if ($_GET['load'] == 'yes') {
			?>
				<script>
					alert("Data Sudah Terhapus!");
				</script>
			<?php
			} else {
			?>
				<script>
					alert("Maaf Data Tidak Dapat Terhapus, Silahkan dicoba kembali!");
				</script>
			<?php
			}
			?>
		</p>
	<?php endif; ?>

</body>

</html>