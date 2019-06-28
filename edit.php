<?php
include "conn.php";
session_start();
if ($_SESSION['det'] != "CONNECT TO WEBSITE") {
	header('location: in.php');
}
$nt = $_GET['id'];
$sql2 = "select * from pesenan where no_order='$nt';";
$runsql2 = mysql_query($sql2, $koneksi);
$sd = mysql_fetch_assoc($runsql2);
?>
<!DOCTYPE html>
<html>
<head>
	<title>EDIT DAT</title>
</head>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="orderstyle.css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<body>

<form method="POST">
	
<div class="textrata">Nama Pelanggan :</div> 
<input type="text" name="pelanggan" placeholder="Nama Pelanggan" value="<?php echo $_GET['idd']; ?>">
</br>

<div class="textrata">No Telepon :</div> 
<input type="text" name="notelp" placeholder="No. Telp (Optional)" value="<?php echo $sd['no_tlp']; ?>">
</br>
<div class="textrata">Tanggal Masuk :</div><input type="date" name="datein"></br>
<div class="textrata">Pilih Paket :</div> 
<select name="paket" class="selectacc">
	<option value="Paket Express">Express (1 hari)</option>
	<option value="Paket Kilat">Kilat (2 hari)</option>
	<option value="Paket Normal">Normal (3 - 4 hari)</option>
</select></br>
<div class="textrata">Tanggal Keluar :</div> <input type="date" name="dateout"></br>
<div class="textrata">Jumlah Dalam Kg :</div><input type="text" name="brpkg" placeholder="Masukan Jumlah Kg" value="<?php echo $sd['jumlah_kg']; ?>"></br>
<div class="textrata">Keterangan Tambahan :</div><input type="text" name="keterangan" placeholder="Keterangan..." maxlength="1000" value="<?php echo $sd['keterangan']; ?>"></br>
<select name="paketo" class="selectacc">
	<option value="belum diambil">belum diambil</option>
	<option value="sudah diambil">sudah diambil</option>
	<option value="cancel">cancel</option>
</select></br>
<input type="submit" name="spush" value="UPDATE"><input type="submit" name="sback" value="BATAL">
</form>
<!--
nama_pelanggan
no_telp
tanggal_masuk
jenis_paket
tanggal_keluar
jumlah_kg
keterangan
!-->

<?php
include "conn.php";
$nt = $_GET['id'];
if (isset($_POST['spush'])) {
$napel = $_POST['pelanggan']; // nama pelanggan
$nohp = $_POST['notelp'];
$datein = $_POST['datein']; // tgl masuk
$paket = $_POST['paket']; // paketan
$dateout = $_POST['dateout']; //tgl keluar
$kg = $_POST['brpkg']; // jumlahnya
$ket = $_POST['keterangan']; // keterangan tambahan
$keto = $_POST['paketo'];
if ($paket == "Paket Express") {
	$jumlah = 6000;
}elseif ($paket == "Paket Kilat") {
	$jumlah = 5000;		
}elseif ($paket == "Paket Normal") {
	$jumlah = 4000;
}
$total = $kg*$jumlah;
$sql = "update pesenan set nama_pelanggan='$napel', no_tlp='$nohp', tanggal_masuk='$datein', jenis_paket='$paket', tanggal_keluar='$dateout', jumlah_kg='$kg', total='$total', keterangan='$ket', status_order='$keto' where no_order='$nt';";
$run = mysql_query($sql);
if ($run) {
	header("location: dataorder.php");
}else{
	header("location: dataorder.php");
}

}if (isset($_POST['sback'])) {
	header("location: dataorder.php");
}
	/**if (isset($_POST['spush'])) {
	$napel = $_POST['pelanggan']; // nama pelanggan
	$nohp = $_POST['notelp'];
	$datein = $_POST['datein']; // tgl masuk
	$paket = $_POST['paket']; // paketan
	$dateout = $_POST['dateout']; //tgl keluar
	$kg = $_POST['brpkg']; // jumlahnya
	$ket = $_POST['keterangan']; // keterangan tambahan
	if ($paket == "Paket Express") {
		$jumlah = 6000;
	}elseif ($paket == "Paket Kilat") {
		$jumlah = 5000;		
	}elseif ($paket == "Paket Normal") {
		$jumlah = 4000;
	}
	$total = $kg*$jumlah;
	$co = "update pesenan set nama_pelanggan='$napel' where no_oder='$id';";
	$cogo = mysql_query($co, $koneksi);
	if ($cogo) {
		header('location: dataorder.php');
	}else{
		echo "<script type='text/javascript'>alert('Kesalahan!!!');</script>";
	}
}elseif(isset($_POST['sback'])){
	header('location: out.php');
}else{}
}**/
?>
</body>
</html>