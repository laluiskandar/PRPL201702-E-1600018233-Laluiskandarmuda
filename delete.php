<?php

	$koneksi = mysql_connect("localhost","root","") or die("Koneksi Gagal !" . mysql_error());
	$database = mysql_select_db("kasir");
	
	$kode = $_POST['kd'];
	
	$hapus = mysql_query("delete from barang where kd_brg = '".$kode."'");

?>

<script type="text/javascript">
	alert("Terhapus");
	document.location.href = "index.php";
</script>