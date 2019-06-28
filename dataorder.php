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
	<meta name="viewport" content="width=device-width, initial-scale=1">
  
</head>
<style type="text/css">
.datatab{
	text-align: right;
}
	form{
		text-align: right;
	}
</style>
<link rel="stylesheet" href="css/bootstrap.css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="do.css">
<body><div id="datatab">
</div>

<form action="" method="POST">
<input type="date" name="dateinn">
<input type="date" name="dateoutt">
<button name="subbot" class="btn btn-info">CHECK TOTAL</button>
<?php

if ($_SESSION['types'] == "owner") {
}elseif($_SESSION['types'] == "admin" ){
	echo "<button name='submit' class='btn btn-info'>ORDER</button>";
}else{}

if(isset($_POST['subbot'])){
	$a4 = $_POST['dateinn'];
	$a6 = $_POST['dateoutt'];
	$sql = "select SUM(total) as totalbanget from pesenan where (tanggal_masuk BETWEEN '$a4' AND '$a6');";
	$runnsql = mysql_query($sql);
	$dat = mysql_fetch_array($runnsql);
	$s = $dat['totalbanget'];
	echo "</br></br></br><div class='btn btn-danger'>Total: $s</div>";
}
?>

<button name="submitt" class="btn btn-info">Back To Menu</button>
<div class="cari">
</div>
</form>
<?php
if (isset($_POST['submit'])) {
	header('location: order.php');
}elseif (isset($_POST['submitt'])) {
	header('location: out.php');
}elseif (isset($_POST['submitts'])) {
	header('location: dataorder.php');
}
?>
<div class="menari">
<table class="table table-stripped table-hover datatab">
<thead>
	<tr>
		<th>No Order</th>
		<th>Nama Pelanggan</th>
		<th>No Telepon</th>
		<th>Tanggal Masuk</th>
		<th>Jenis Paket</th>
		<th>Tanggal Keluar</th>
		<th>Jumlah Kg</th>
		<th>Total</th>
		<?php

if ($_SESSION['types'] == "owner") {
	echo "<th>Keterangan Tambahan</th>
		<th>Status Pembayaran</th>
		<th>Status Order</th>";
}elseif($_SESSION['types'] == "admin" ){
	echo "<th>Keterangan Tambahan</th>
		<th>Status Pembayaran</th>
		<th>Status Order</th>
		<th>ACTION</th>";
}else{}
?>
		
	</tr>
</thead>
<!--
Full texts	no_order 	nama_pelanggan 	no_tlp 	tanggal_masuk 	jenis_paket 	tanggal_keluar 	jumlah_kg 	total 	keterangan 	status_pembayaran 	status_order
!-->

<form action="" method="POST">
<?php
include "conn.php";
$sql = "select * from pesenan;";
$go = mysql_query($sql, $koneksi);
while ($dat = mysql_fetch_array($go)) {
	$a1 = $dat['no_order'];
	$a2 = $dat['nama_pelanggan'];
	$a3 = $dat['no_tlp'];
	$a4 = $dat['tanggal_masuk'];
	$a5 = $dat['jenis_paket'];
	$a6 = $dat['tanggal_keluar'];
	$a7 = $dat['jumlah_kg'];
	$a8 = $dat['total'];
	$a9 = $dat['keterangan'];
	$a10 = $dat['status_pembayaran'];
	$a11 = $dat['status_order'];
	
	$sql1 = "select * from pesenan where no_order = '$a1';";
	$go1 = mysql_query($sql1, $koneksi);
	$check1 = mysql_fetch_assoc($go1);
	if ($check1['status_order'] == "sudah diambil") {
		$xx = "";
		if ($_SESSION['types'] == "owner") {
			echo "<tr>
<td>$a1</td><td>$a2</td><td>$a3</td><td>$a4</td><td>$a5</td>
<td>$a6</td><td>$a7</td><td>$a8</td><td>$a9</td><td>$a10</td><td style='color: green;'>$a11</td>
	</tr>";
}elseif($_SESSION['types'] == "admin" ){
	echo "<tr>
<td>$a1</td><td>$a2</td><td>$a3</td><td>$a4</td><td>$a5</td>
<td>$a6</td><td>$a7</td><td>$a8</td><td>$a9</td><td>$a10</td><td style='color: green;'>$a11</td>
<td>
$xx <a href='printla.php?id=".$a1."'>PRINT</a>
</td>
	</tr>";
}	

	 }elseif ($check1['status_order'] == "belum diambil"){
	 	$xx = "<a href='fun.php?id=".$a1."'>confirm</a>"; //"<input type='submit' name='consel' value='Confirm Selesai' style='background: black; color: white; border: 1px solid white; padding: 3px; width: 100px margin: 5px;'>";
	 	if ($_SESSION['types'] == "owner") {
			echo "<tr>
<td>$a1</td><td>$a2</td><td>$a3</td><td>$a4</td><td>$a5</td>
<td>$a6</td><td>$a7</td><td>$a8</td><td>$a9</td><td>$a10</td><td>$a11</td>
	</tr>";
}elseif($_SESSION['types'] == "admin" ){
	echo "<tr>
<td>$a1</td><td>$a2</td><td>$a3</td><td>$a4</td><td>$a5</td>
<td>$a6</td><td>$a7</td><td>$a8</td><td>$a9</td><td>$a10</td><td>$a11</td>
<td>
$xx <a href='edit.php?id=".$a1."&idd=".$a2."'>edit</a>  <a href='printla.php?id=".$a1."'>PRINT</a>
</td>
	</tr>";
}	
	 }elseif ($check1['status_order'] == "cancel"){
	 	$xx = ""; //"<input type='submit' name='consel' value='Confirm Selesai' style='background: black; color: white; border: 1px solid white; padding: 3px; width: 100px margin: 5px;'>";
	 	if ($_SESSION['types'] == "owner") {
			echo "<tr>
<td>$a1</td><td>$a2</td><td>$a3</td><td>$a4</td><td>$a5</td>
<td>$a6</td><td>$a7</td><td>$a8</td><td>$a9</td><td>$a10</td><td  style='color: red;'>$a11</td>
	</tr>";
}elseif($_SESSION['types'] == "admin" ){
	echo "<tr>
<td>$a1</td><td>$a2</td><td>$a3</td><td>$a4</td><td>$a5</td>
<td>$a6</td><td>$a7</td><td>$a8</td><td>$a9</td><td>$a10</td><td style='color: red;'>$a11</td>
<td>
$xx
</td>
	</tr>";
}	


	 }
}

?>
</form>
</table>
</div>
</body>
<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready(function() {
    $('.datatab').DataTable();
  } );
  </script>
</html>