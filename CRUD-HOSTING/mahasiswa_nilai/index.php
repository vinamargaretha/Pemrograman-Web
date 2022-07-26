<?php include("config.php"); ?>
<!DOCTYPE html>
<html>

<head>
	<title>Sistem Informasi Universitas Olelo</title>
</head>

<body>
	<header>
		<center>
			<h3>Daftar Nilai Mahasiswa</h3>
		</center>
	</header>

	<nav>
		<a href="form-daftar.php">[+] Tambah Baru</a>
	</nav>

	<br>

	<table border='1' width='100%'>
		<thead>
			<tr>
				<th>No</th>
				<th>NIM</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Mata Kuliah</th>
				<th>Tahun Akademik</th>
				<th>Nilai</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>

			<?php
			$sql = "SELECT M.*,MK.kode as mk_kode, MK.nama as mk_nama, T.id as t_id, T.nama as t_nama
			FROM mhs M
			JOIN mk MK ON M.mk_kode = MK.kode
			JOIN ta T ON M.ta_id = T.id";
			$query = $db->query($sql);
			$i = 0;
			while ($mahasiswa = $query->fetch_array(MYSQLI_BOTH)) {
				$i++;
				echo "<tr>";
				echo "<td align='center'>$i</td>";
				echo "<td align='center'>" . $mahasiswa['id'] . "</td>";
				echo "<td align='center'>" . $mahasiswa['nama'] . "</td>";
				echo "<td align='center'>" . $mahasiswa['alamat'] . "</td>";
				echo "<td align='center'>" . $mahasiswa['mk_nama'] . "</td>";
				echo "<td align='center'>" . $mahasiswa['t_nama'] . "</td>";
				echo "<td align='center'>" . $mahasiswa['nilai'] . "</td>";

				echo "<td align='center'>";
				echo "| <a href='form-edit.php?id=" . $mahasiswa['id'] . "'>Edit</a> | ";
				echo "<a href='hapus.php?id=" . $mahasiswa['id'] . "'>Hapus</a> | ";


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