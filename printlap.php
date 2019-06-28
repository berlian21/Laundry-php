<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	.ds{
		font-size: 40px;
		padding: 25px;
		border-bottom: 10px solid black;
	}
</style>
<link rel="stylesheet" href="css/bootstrap.css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<body>
<center class="ds">LAUNDRY SUKA SUKA</center>
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
		<th>Status Order</th>
	</tr>
</thead>
<?php
include "conn.php";
$id = $_GET['id'];
$idd = $_GET['idd'];
$sqls = "select * from pesenan where (tanggal_masuk BETWEEN '$id' AND '$idd');";
$run = mysql_query($sqls);
while ($dat = mysql_fetch_array($run)) {
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
		if ($check1['status_order'] == "sudah diambil" OR $check1['status_order'] == "cancel") {	
			echo "<tr>
<td>$a1</td><td>$a2</td><td>$a3</td><td>$a4</td><td>$a5</td>
<td>$a6</td><td>$a7</td><td>$a8</td><td>$a11</td>
</tr>";
	 }
	}
$sql = "select SUM(total) as totalbanget from pesenan where (tanggal_masuk BETWEEN '$id' AND '$idd') AND status_order='sudah diambil';";
$runnsql = mysql_query($sql);
$dat = mysql_fetch_assoc($runnsql);
$s = $dat['totalbanget'];
echo "<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td>Total: </td>
<td>
$s
</td>
	</tr>";

?>
</tr>
</table>
<script type="text/javascript">
	window.print();
</script>
</body>
</html>
