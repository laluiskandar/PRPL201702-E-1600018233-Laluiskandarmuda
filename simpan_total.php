<?php

	$koneksi = mysql_connect("localhost","root","") or die("Koneksi Gagal !" . mysql_error());
	$database = mysql_select_db("kasir");
	
	$total = $_POST['jlh_total'];
	$id = $_POST['id'];
	
	$simpan = mysql_query("insert into total values('$id''$total')");

?>