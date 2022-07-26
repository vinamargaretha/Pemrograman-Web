<?php include("config.php");
$rand = mt_rand(1000, 9999);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Formulir Penginputan Nilai MK | Universitas Hangtuahs</u></title>
</head>

<body>
    <header>
        <h3>Formulir Penginputan Nilai MK</h3>
    </header>

    <form action="proses-pendaftaran.php" method="POST">

        <fieldset>

            <p>
                <label for="id">NIM: </label><br>
                <input type="text" name="id" value="<?php echo $rand ?>" readonly>
            </p>
            <p>
                <label for="nama">Nama: </label><br>
                <input type="text" name="nama" placeholder="nama lengkap" />
            </p>
            <p>
                <label for="alamat">Alamat: </label><br>
                <textarea name="alamat"></textarea>
            </p>
            <p>
                <label for="mk">Mata Kuliah: </label><br>
                <select name="mk">
                    <?php
                    $sql = "SELECT * FROM mk";
                    $query = mysqli_query($db, $sql);
                    while ($rows = mysqli_fetch_array($query)) {
                        echo "<option value='" . $rows['kode'] . "'>" . $rows['nama'] . "</option>";
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
                        echo "<option value='" . $rows['id'] . "'>" . $rows['nama'] . "</option>";
                    }
                    ?>
                </select>
            </p>
            <p>
                <label for="nilai">Nilai: </label><br>
                <input type="number" name="nilai" placeholder="Masukkan Nilai" />
            </p>


            <p>
                <input type="submit" value="Submit" name="daftar" />
                <a href='index.php'>Back</a>
            </p>

        </fieldset>

    </form>

</body>

</html>