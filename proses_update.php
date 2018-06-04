<?php

$koneksi = mysql_connect("localhost","root","") or die("Koneksi Gagal !" . mysql_error());
	$database = mysql_select_db("kasir");
	
	$kode = $_POST['kd_brg'];
	$nama = $_POST['name'];
	$hrg = $_POST['hrg'];
	$satuan = $_POST['satuan'];
	
	$simpan = mysql_query("update barang set nama_brg = '$nama', harga = '$hrg', stok = '$satuan' where kd_brg = '$kode'");
	$simpan_a = mysql_query("update stok set stok = '$satuan' where kd_brg = '$kode'");

?>

<script type="text/javascript">
	document.location.href = "index.php";
	
</script>