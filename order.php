<?php
include "conn.php";
session_start();
if ($_SESSION['det'] != "CONNECT TO WEBSITE") {
	header('location: in.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" type="text/css" href="orderstyle.css">
<body>

<!-- Form Pesanan -->
<form action="" method="POST">

<div class="textrata">Nama Pelanggan :</div> 
<input type="text" name="pelanggan" placeholder="Nama Pelanggan">
</br>

<div class="textrata">No Telepon :</div> 
<input type="text" name="notelp" placeholder="No. Telp (Optional)">
</br>

<div class="textrata">Tanggal Masuk :</div><input type="date" name="datein"></br>

<div class="textrata">Pilih Paket :</div> 
<select name="paket" class="selectacc">
	<option value="Paket Express">Express (1 hari)</option>
	<option value="Paket Kilat">Kilat (2 hari)</option>
	<option value="Paket Normal">Normal (3 - 4 hari)</option>
</select></br>

<div class="textrata">Tanggal Keluar :</div> <input type="date" name="dateout"></br>

<div class="textrata">Jumlah Dalam Kg :</div><input type="text" name="brpkg" placeholder="Masukan Jumlah Kg"></br>

<div class="textrata">Keterangan Tambahan :</div><input type="text" name="keterangan" placeholder="Keterangan..." maxlength="1000"></br> 

<div class="textrata">Status Pembayaran :</div><select name="bill" class="selectacc">
	<option value="Belum Bayar">Belum Bayar</option>
	<option value="Lunas">Lunas</option>
</select></br>

<input type="submit" name="spush" value="Pesan">
<input type="submit" name="submitts" value="Lihar Data">
<input type="submit" name="sback" value="Back to Menu">
</form>


<?php
include "conn.php";
if (isset($_POST['spush'])) {
	$napel = $_POST['pelanggan']; // nama pelanggan
	$nohp = $_POST['notelp'];
	$datein = $_POST['datein']; // tgl masuk
	$paket = $_POST['paket']; // paketan
	$dateout = $_POST['dateout']; //tgl keluar
	$kg = $_POST['brpkg']; // jumlahnya
	$ket = $_POST['keterangan']; // keterangan tambahan
	$bill = $_POST['bill']; // keterangan bayar ato belum 
	$total = 0;
	$jumlah = 0; //jmlh perpaket + ketentuan membernya
	
	/**
no_order 	nama_pelanggan 	no_tlp 	tanggal_masuk 	jenis_paket 	tanggal_keluar 	jumlah_kg 	total 	keterangan 	status_pembayaran 	status_order

	**/

	$sql1 = "select * from pesenan;";
	$runsql1 = mysql_query($sql1, $koneksi);
	$rowsql1 =  mysql_num_rows($runsql1);
	$aurow = $rowsql1+1;
	$autorow = "P0" . $aurow;
	if ($paket == "Paket Express") {
		$jumlah = 6000;
	}elseif ($paket == "Paket Kilat") {
		$jumlah = 5000;		
	}elseif ($paket == "Paket Normal") {
		$jumlah = 4000;
	}
	$total = $kg*$jumlah;
	$co = "insert into pesenan values('$autorow', '$napel', '$nohp', '$datein', '$paket', '$dateout', '$kg', '$total', '$ket', '$bill', 'belum diambil');";
	$cogo = mysql_query($co, $koneksi);
	if ($cogo) {
		echo "<script type='text/javascript'>alert('Data Berhasil Di Proses');</script
		>";
	}else{
		echo "<script type='text/javascript'>alert('Kesalahan!!!');</script>";
	}
}elseif(isset($_POST['sback'])){
	header('location: out.php');
}elseif (isset($_POST['submitts'])) {
	header('location: dataorder.php');
}
else{}
?>
</body>
</html>