<?php
	$koneksi = mysql_connect("localhost","root","") or die("Koneksi Gagal !" . mysql_error());
	$database = mysql_select_db("kasir");
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search Barang</title>
<style>
	#td {
		text-align:center;
		background:#06F;
	}
	
	a {
		color:#000;
		text-decoration:none;
	}
	
	a:hover {
		color:#00F;
	}
	body{
		color :white;
	}
	
</style>
</head>

<body  background="background.png">
<h1 align="center">Searching</h1>
<div style="width:100%">
	<div align="center">
    	<div style="width:600px;">
        	<div style="width:600px; float:left">
            <table align="center" border="1" width="600">
            <tr id="td">
                <td>No.</td>
                <td>Kode Pemesan</td>
                <td>Nama Pesanan</td>
                <td>Harga</td>
                <td>Jumlah</td>
            </tr>
            <?php
            
            $kd_brg = $_POST['kd_brg'];
				if($kd_brg !=''){
			
			$lihat = mysql_query("select *,format(harga,0) as 'harga' from barang where kd_brg = '$kd_brg' or nama_brg like '%$kd_brg%' or harga = '$kd_brg' or stok = '$kd_brg'");
				}
				else {
				
			$lihat = mysql_query("select * from barang ");
				}
				$no = 1;	
			while($hasil = mysql_fetch_array($lihat))
            {
                echo "<tr>
                        <td>".$no."</td>
                        <td>".$hasil['kd_brg']."</td>
                        <td>".$hasil['nama_brg']."</td>
                        <td>Rp.".$hasil['harga']."</td>
                        <td>".$hasil['stok']."</td>
                      </tr>
                ";
                $no ++;
            }
				
				
            ?>
			
	        </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>
