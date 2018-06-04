<?php
	$koneksi = mysql_connect("localhost","root","") or die("Koneksi Gagal !" . mysql_error());
	$database = mysql_select_db("kasir");
	
	$kd = $_POST['kd'];
	$nama = $_POST['nama'];
	$hrg = $_POST['hrg'];
	$satuan = $_POST['satuan'];
	
	$simpan = mysql_query("insert into barang values('$kd','$nama','$hrg','$satuan')");
	$simpan_a = mysql_query("insert into stok values('$kd','$satuan')");
?>

<script type="text/javascript">
	var retVal = confirm("Data tersimpan dan Apa Anda Masih Ingin Menambah Pesanan ?");
	if( retVal == true){
      alert("Oke Silahkan Tambah Lagi");
	  document.location.href = "tambah_barang.html";
	  }
	  else{
      alert("Kembali ke daftar Pesanan!");
	  document.location.href = "index.php";
   }
</script>