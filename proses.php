<?php
	
	$koneksi = mysql_connect("localhost","root","") or die("Koneksi Gagal !" . mysql_error());
	$database = mysql_select_db("kasir");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Proses</title>
<style>
	body {
		color:#FFF;
	}
</style>
</head>

<body  background="background.png">
<?php

	$jumlah = $_POST['jlh_angka'];
	for($i = 1; $i <= $jumlah; $i++)
	{
		$id[$i] = $_POST['id_pembeli'.$i];
		$tgl[$i] = $_POST['tgl_beli'.$i];
		$kd_brg[$i] = $_POST['kd'.$i];
		$satuan_brg[$i] = $_POST['satuan'.$i];
		mysql_query("insert into pembeli values('".$id[$i]."','".$kd_brg[$i]."','".$satuan_brg[$i]."','".$tgl[$i]."')");
		mysql_query("update barang set stok = stok - '".$satuan_brg[$i]."' where kd_brg = '".$kd_brg[$i]."'");
	}
	?>
    <div align="center">
<div style="width:400px; height:auto; background:#03F; padding:10px 0 10px 0; border-radius:10px; -webkit-border-radius:10px;">
    <?php
	echo "<form enctype='multipart/form-data' action='calculation.php' method='post'>
			<table>
			<tr>
			<td><marquee behavior='alternate'>Lihat Daftar Belanja Dan Cetak Pembayaran</marquee></td>
			</tr>
			<tr>
			<td align='center'>
			<input type='hidden' name='aidi' value='".$id[1]."' />
			<input type='submit' value='Lihat Daftar' onclick='muat'/>
			</td>
			</tr>
		</form>";
?>
<script type="text/javascript">
	function muat()
	{
	document.location.href = "calculation.php";
	}
</script>
</div></div>
</body>
</html>
