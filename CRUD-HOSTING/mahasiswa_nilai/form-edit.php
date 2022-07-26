<?php

include("config.php");

if (!isset($_GET['id'])) {
	// kalau tidak ada id di query string
	header('Location: list-siswa.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM mhs WHERE id=$id";
$query = mysqli_query($db, $sql);
$siswa = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if (mysqli_num_rows($query) < 1) {
	die("data tidak ditemukan...");
}

?>


<!DOCTYPE html>
<html>

<head>
	<title>Formulir Update Nilai MK | Universitas Hangtuahs</title>
</head>

<body>
	<header>
		<h3>Formulir Update Nilai MK Mahasiswa</h3>
	</header>

	<form action="proses-edit.php" method="POST">

		<fieldset>

			<input type="hidden" name="id" value="<?php echo $siswa['id'] ?>" />

			<p>
				<label for="nama">Nama: </label><br>
				<input type="text" name="nama" placeholder="Masukkan Nama Lengkap" value="<?php echo $siswa['nama'] ?>" />
			</p>
			<p>
				<label for="alamat">Alamat: </label><br>
				<textarea name="alamat"> <?php echo $siswa['alamat'] ?> </textarea>
			</p>
			<p>
				<label for="mk">Mata Kuliah: </label><br>
				<select name="mk">
					<?php
					$sql = "SELECT * FROM mk";
					$query = mysqli_query($db, $sql);
					while ($rows = mysqli_fetch_array($query)) {
						if ($rows['id'] == $row['item_grp_id'])
							$select = 'selected="selected"';
						else
							$select = '';
						echo "<option value='" . $rows['id'] . "' $select>" . $rows['nama'] . "</option>";
						//echo "<option value='" . $rows['kode'] . "'>" . $rows['nama'] . "</option>";
					}
					?>
				</select>
			</p>
			<p>
				<label for="ta">Tahun Akademik : </label><br>
				<select name="ta">
					<?php
					$sql = "SELECT * FROM ta";
					$query = mysqli_query($db, $sql);
					while ($rows = mysqli_fetch_array($query)) {
						if ($rows['id'] == $row['ta_id'])
							$select = 'selected="selected"';
						else
							$select = '';
						echo "<option value='" . $rows['id'] . "' $select>" . $rows['nama'] . "</option>";
						//echo "<option value='" . $rows['id'] . "'>" . $rows['nama'] . "</option>";
					}
					?>
				</select>
			</p>
			<p>
				<label for="nilai">Nilai: </label><br>
				<input type="number" name="nilai" placeholder="Masukkan Nilai" value="<?php echo $siswa['nilai'] ?>" />
			</p>
			<p>
				<input type="submit" value="Update" name="simpan" />
				<a href='index.php'>Back</a>
			</p>

		</fieldset>


	</form>

</body>

</html>