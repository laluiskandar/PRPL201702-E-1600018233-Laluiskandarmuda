<?php

	$koneksi = mysql_connect("localhost","root","") or die("Koneksi Gagal !" . mysql_error());
	$database = mysql_select_db("kasir");
	
	$aidi = $_POST['aidi'];
	
	$lihat = mysql_query("select pembeli.id_pembeli,pembeli.kd_brg,barang.nama_brg,format(barang.harga,0) as 'harga',pembeli.jlh_beli,format((barang.harga * pembeli.jlh_beli),0) as 'Total' from pembeli,barang where pembeli.kd_brg = barang.kd_brg and pembeli.id_pembeli = '".$aidi."' order by pembeli.id_pembeli DESC");
	$id = mysql_query("select id_pembeli from pembeli where id_pembeli = '".$aidi."' order by id_pembeli limit 1");
	$ar_id = mysql_fetch_array($id);
?>
<style>
	input {
		border:none;
		color:#FF0;
		background:none;
	}
	
	#lain {
		background:#FC0;
		padding:7px;
		color:#FFF;
		border-radius:10px;
		-webkit-border-radius:10px;
		cursor:pointer;
	}
	a {
		text-decoration:none;
		color:#FFF;
	}
</style>
<body  background="background.png">
<div align="center">
<div style="width:850px; height:auto; background:#03F; padding:0px 0 10px 0; border-radius:10px; -webkit-border-radius:10px;">
<table align="center">
	<tr>
    	<td colspan="5">Pemesan : <?php echo "<input type='text' name='id' value='".$ar_id['id_pembeli']."' />"; ?></td>
    </tr>
	<tr>
    	<td>Kode Pesanan</td>
        <td>Nama Pesanan</td>
        <td>Harga</td>
        <td>Jumlah Pesanan</td>
        <td>Jumlah Harga</td>
    </tr>
    <?php
		while($arr = mysql_fetch_array($lihat))
		{
			echo "<tr>
				<td><input type='text' value = '".$arr['kd_brg']."' /></td>
				<td><input type='text' value = '".$arr['nama_brg']."' /></td>
				<td><input type='text' value = 'Rp.".$arr['harga']."' /></td>
				<td><input type='text' value= '".$arr['jlh_beli']."' /></td>
				<td><input type='text' value = 'Rp.".$arr['Total']."' id = 'test'  /></td>
			</tr>";
		}
		$hasil = mysql_query("select format(sum(barang.harga * pembeli.jlh_beli),0) as 'jlh_total' from pembeli,barang where pembeli.kd_brg = barang.kd_brg and pembeli.id_pembeli = '".$aidi."'");
		$arr_hsl = mysql_fetch_array($hasil);
        echo "<form method='post' action='laporan/laporan.php' enctype='multipart/form-data' target='_blank'>
		<tr>
			<td colspan='5' align='right'>Tolal Harga : <input type='text' value='Rp.".$arr_hsl['jlh_total']."' /><input type='hidden' name='id' value='".$aidi."' /></td>
		</tr>
		<tr>
		<td colspan='5' align='right'><input id='lain' type='submit' value='Cetak' /></td>
		</tr>
		</form>";
	?>
    <tr><td colspan="5">&lt;&lt; <a href="index.php">Back to index</a></td></tr>
</table>
</div></div>