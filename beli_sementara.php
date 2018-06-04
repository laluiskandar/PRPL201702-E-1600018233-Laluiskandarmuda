<?php
	
	$koneksi = mysql_connect("localhost","root","") or die("Koneksi Gagal !" . mysql_error());
	$database = mysql_select_db("kasir");
?>
<style>
	body {
		color:#FC0;
	}
</style>

<body  background="background.png">
<div align="center">
<div style="width:700px; height:auto; background:#03F; padding:0px 0 10px 0; border-radius:10px; -webkit-border-radius:10px;">
<table align="center" width="600">
			<tr>
            	<td align="center" colspan="2"><h2>SIMPAN DAN CETAK</h2></td>
            </tr>
			<form method='post' enctype="multipart/form-data" action='proses.php' id='form2'>
                <tr>
                	<td>Kode Pesanan</td>
                    <td>Jumlah</td>
                </tr>
            <?php 
			$jumlah = $_POST['jlh_brg'];
			
			for($a = 1; $a <= $jumlah; $a++)
			{
				$b[$a] = $_POST['id'];
				$c[$a] = $_POST['tgl'];
			}
			
			
			for($i = 1; $i <= $jumlah; $i++)
			{
               echo "<tr>
                	<td><select name='kd".$i."'>";
				$lihat = mysql_query("select * from Barang");
				while($data = mysql_fetch_array($lihat))
				{
					echo "<option value=".$data['kd_brg'].">".$data['kd_brg']."<option>";
				}
			
        	echo "</select></td>
				<td><input type='text' name='satuan".$i."' /><input type='hidden' name='jlh_angka' value='".$jumlah."' /><input type='hidden' name='id_pembeli".$i."' value='$b[$i]' /><input type='hidden' name='tgl_beli".$i."' value='$c[$i]' /></td>
                </tr>";
			}
			?>
            <tr>
            	<td colspan="2"><input type="submit" value="Kirim" /></td>
            </tr>
            </form>
</table>
</div></div>