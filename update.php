<?php
	$koneksi = mysql_connect("localhost","root","") or die("Koneksi Gagal !" . mysql_error());
	$database = mysql_select_db("kasir");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update Barang</title>
<style>
	a {
		color:#FFF;
	}
</style>
</head>

<body background="background.png">
<h1 align="center">Update Barang</h1>
<div align="center">
<div style="width:700px; height:auto; background:#03F; padding:10px 0 10px 0; border-radius:10px; -webkit-border-radius:10px;">
<form action="proses_update.php" method="post" enctype="multipart/form-data">
<table width="600" align="center" cellpadding="6">
	<tr>
    	<td>Kode Pemesan</td>
        <td>Nama Pesanan</td>
        <td>Harga</td>
        <td>Jumlah</td>
    </tr>
    <tr>
        <?php
		$kd = $_POST['kd'];
			$lihat_1 = mysql_query("select * from barang where barang.kd_brg = '$kd'");
			$arr_lihat1 = mysql_fetch_array($lihat_1);
		?>
        <td><input type="text" value="<?php echo $arr_lihat1['kd_brg']; ?>" disabled="disabled" /><input type="hidden" name="kd_brg" value="<?php echo $arr_lihat1['kd_brg']; ?>" /></td>
        <td><input type="text" name="name" value="<?php echo $arr_lihat1['nama_brg']; ?>" /></td>
        <td><input type="text" name="hrg" value="<?php echo $arr_lihat1['harga']; ?>"  /></td>
        <td><input type="text" name="satuan" value="<?php echo $arr_lihat1['stok']; ?>" /></td>
    </tr>
    <tr>
    	<td colspan="4" align="center"><input type="submit" value="Update" /> &nbsp;&nbsp; <input type="reset" value="Hapus" />&nbsp;&nbsp;<a href="index.php">&lt;&lt; Back TO INDEX</a></td>
    </tr>
</table>
</form>
</div>
</div>
</body>
</html>