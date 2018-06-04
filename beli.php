<?php
	$koneksi = mysql_connect("localhost","root","") or die("Koneksi Gagal !" . mysql_error());
	$database = mysql_select_db("kasir");
	$tanggal = date('d-m-y');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pembelian</title>
<script type="text/javascript" src="jquery-1.7.1.js"></script>

<style>
	a {
		text-decoration:none;
		color:#FF0;
	}
	body {
		color:#FFF;
	}
</style>
</head>

<body background="background.png">
<div align="center">
<div style="width:700px; height:auto; background:#03F; padding:0px 0 10px 0; border-radius:10px; -webkit-border-radius:10px;">
<form action="beli_sementara.php" method="post"  enctype="multipart/form-data">
<table align="center" width="600">
	<tr>
    	<td colspan="2" align="center"><h2>PEMESANAN</h2></td>
    </tr>
    <tr>
    	<td>Jumlah Pesanan</td>
        <td><input type="text" name="jlh_brg"  onKeyPress="return goodchars(event,'12345678990',this)" title="Isi Dengan Angka" required /></td>       
    </tr>
    <tr>
         <td>Nama Pemesan</td>
         <td><input type="text" name="id" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)" title="Isi Dengan Huruf" required /><input type="hidden" name="tgl"  value="<?php echo $tanggal ?>" /></td>
   </tr>
   <tr>
   		<td colspan="2"><input type="submit"  value="LIHAT" />&nbsp;&nbsp;&lt;&lt; <a href="index.php">Back To INDEX</a></td>
   </tr>
</table>
</form>
</div></div>
</body>
</html>


<script language="javascript">
function getkey(e)
{
if (window.event)
   return window.event.keyCode;
else if (e)
   return e.which;
else
   return null;
}
function goodchars(e, goods, field)
{
var key, keychar;
key = getkey(e);
if (key == null) return true;
 
keychar = String.fromCharCode(key);
keychar = keychar.toLowerCase();
goods = goods.toLowerCase();
 
// check goodkeys
if (goods.indexOf(keychar) != -1)
    return true;
// control keys
if ( key==null || key==0 || key==8 || key==9 || key==27 )
   return true;
    
if (key == 13) {
    var i;
    for (i = 0; i < field.form.elements.length; i++)
        if (field == field.form.elements[i])
            break;
    i = (i + 1) % field.form.elements.length;
    field.form.elements[i].focus();
    return false;
    };
// else return false
return false;
}
</script>
