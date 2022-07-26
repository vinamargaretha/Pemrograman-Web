<?php include("config.php");
$rand = mt_rand(1000, 9999);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Formulir Penjualan | Toko Semar Mesem</u></title>
</head>

<body>
    <header>
        <h3>Formulir Tambah Data Barang</h3>
    </header>

    <form action="proses-pendaftaran.php" method="POST">

        <fieldset>

            <p>
                <label for="id">ID: </label>
               <input type="text" name="id" value="<?php echo $rand ?>" readonly>
            </p>
            <p>
                <label for="nama">Nama: </label>
                <input type="text" name="nama" placeholder="Masukkan Nama Barang" />
            </p>
            <p>
                <label for="jenis">Jenis : </label>
                <select name="item_grp_id">
                    <?php
                    $sql = "SELECT * FROM item_grp";
                    $res = $db->query($sql);
                    while ($rows = $res->fetch_array(MYSQLI_BOTH)) {
                        echo "<option value='" . $rows['id'] . "'>" . $rows['nama'] . "</option>";
                    }
                    ?>
                </select>
            </p>
            <p>
                <label for="satuan">Satuan: </label>
                <select name="satuan_id">
                    <?php
                    $sql = "SELECT * FROM satuan";
                    $res = $db->query($sql);
                    while ($rows = $res->fetch_array(MYSQLI_BOTH)) {
                        echo "<option value ='" . $rows['id'] . "'>" . $rows['nama'] . "</option>";
                    }
                    ?>

                
            </p>
            <p>
                Harga
                <input type="text" name="hpp" placeholder="Masukkan Harga" />
            </p>
                Harga Jual
                <input type="text" name="hpp" placeholder="Masukkan Harga Jual" />
            <p>
                <input type="submit" value="SIMPAN" name="daftar" />
            </p>

        </fieldset>

    </form>

</body>

</html>