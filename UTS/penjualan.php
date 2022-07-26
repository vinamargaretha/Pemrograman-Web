<?php
include "koneksi.php";
?>

<html lang="en">
<head>
    <title>HYPERMART</title>
</head>
<body>
    <center><h2>TRANSMART</h2></center>
    <a href="penjualan_add.php">TAMBAH</a>  <a href="penjualan.php">LIHAT</a>
    <br>
    <?php
        //pilih semua dari tabel item aliaskan I, join item grup aliaskan ig pada tabel item kolom item grup id = item grup kolom id, join satuan aliaskan s pada tabel item kolom satuan id= tabel satuan kolom id
        //tabel ig kolom id aliaskan ig_id, tabel ig kolom nama aliaskan ig_nama, tabel satuan kolom id aliaskan s_nama, tabel satuan kolom nama aliaskan s_nama
        $sql = "SELECT I.*,IG.id as ig_id, IG.nama as ig_nama, S.id as s_id, S.nama as s_nama
                FROM item I
                JOIN item_grp IG ON I.item_grp_id = IG.id
                JOIN satuan S ON I.satuan_id = S.id";
        $res = $conn->query($sql);
        $jumlah_data = $res->num_rows;
                            //menghitung semua kolom pada tabel

        echo "Ditemukan $jumlah_data data";
        echo "<table width='100%' border='1'>";
    	echo "	<thead>
				<tr>
					<td width='5%'><b><center>No.</td>
					<td width='5%'><b><center>Act</td>
					<td width='6%'><b><center>ID</td>
					<td width='20%'><b><center>Nama</td>
					<td width='15%'><b><center>Jenis</td>
                    <td width='15%'><b><center>Barcode</td>
					<td width='10%'><b><center>Satuan</td>
					<td width='10%'><b><center>Harga</td>
                    <td width='10%'><b><center>supplier</td>	
				</tr>
			</thead>
			<tbody>";

        $i = 0;
        while($rows = $res->fetch_array(MYSQLI_BOTH)){
        //perulangan dimulai dari 0, kolom dijadika array dimulai dari index 0, dan ditampilkan pada kolom(td)
            $i++;
            echo "<tr>
            <td align='center'>$i</td>
            <td align='center'>
                <a href='penjualan_detil.php?id=".$rows['id']."'>DETAIL</a>
            </td>
            <td>".$rows['id']."</td>
            <td>".$rows['nama']."</td>
            <td>".$rows['ig_nama']."</td>
            <td>".$rows['barcode']."</td>
            <td>".$rows['s_nama']."</td>
            <td>".$rows['hpp']."</td>
            <td>".$rows['supplier']."</td>
        </tr>";
        }
        echo "	</tbody>
		</table>"
    ?>
</body>
</html>