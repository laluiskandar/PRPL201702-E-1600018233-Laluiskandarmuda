<?php 
$koneksi = mysql_connect("localhost","root","") or die("Koneksi Gagal !" . mysql_error());
$database = mysql_select_db("kasir");

require('fpdf.php');
$pdf = new FPDF();
$pdf->addPage();
$pdf->setAutoPageBreak(false);
$pdf->setFont('Arial','',12);

$aidi = $_POST['id'];

$tgl = date('d-m-y');
$id_beli = mysql_query("select id_pembeli from pembeli where id_pembeli = '".$aidi."'");
$ar_data = mysql_fetch_array($id_beli);

$pdf->text(75,30,'NOTA PEMBAYARAN');
$pdf->text(10,37,'Nama : ');
$pdf->text(30,37,$ar_data['id_pembeli']);
$pdf->text(150,37,'Tanggal : ');
$pdf->text(170,37,$tgl);


$yi = 50;
$ya = 44;
$row = 6;

$pdf->setFont('Arial','',9);
$pdf->setFillColor(222,222,222);
$pdf->setXY(10,$ya);
$pdf->cell(6,6,'No',1,0,'C',1);
$pdf->CELL(25,6,'Nama Pesanan',1,0,'C',1);
$pdf->CELL(50,6,'Harga Pesanan',1,0,'C',1);
$pdf->CELL(50,6,'Jumlah Beli',1,0,'C',1);
$pdf->CELL(50,6,'Jumlah Harga',1,0,'C',1);
$ya = $yi + $row;

$lihat = mysql_query("select pembeli.id_pembeli,pembeli.kd_brg,barang.nama_brg,format(barang.harga,0) as 'harga',pembeli.jlh_beli,format((barang.harga * pembeli.jlh_beli),0) as 'Total' from pembeli,barang where pembeli.kd_brg = barang.kd_brg and pembeli.id_pembeli = '".$aidi."'");

$i = 1;
$no = 1;
$max = 31;

while($data = mysql_fetch_array($lihat)){

$pdf->setXY(10,$ya);
$pdf->setFont('arial','',9);
$pdf->setFillColor(255,255,255);
$pdf->cell(6,6,$no,1,0,'C',1);
$pdf->cell(25,6,$data['nama_brg'],1,0,'L',1);
$pdf->cell(50,6,$data['harga'],1,0,'L',1);
$pdf->cell(50,6,$data['jlh_beli'],1,0,'L',1);
$pdf->CELL(50,6,$data['Total'],1,0,'C',1);
$ya = $ya+$row;
$no++;
$i++;
}
$hasil = mysql_query("select format(sum(barang.harga * pembeli.jlh_beli),0) as 'jlh_total' from pembeli,barang where pembeli.kd_brg = barang.kd_brg and pembeli.id_pembeli = '".$aidi."'");
$arr_hsl = mysql_fetch_array($hasil);
$pdf->text(150,$ya+7,"Total Harga  :  Rp.".$arr_hsl['jlh_total']);





$pdf->output();

?>