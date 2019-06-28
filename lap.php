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
	form{
		text-align: center;
		margin-top: 250px;
		margin-bottom: 250px;
		margin-left: 300px;
		margin-right: 300px;
	}
	.cari {
		padding: 10px;
	}
	.lapcet{
		padding-bottom: 20px;
		font-size: 25px;
	}
</style>
<link rel="stylesheet" href="css/bootstrap.css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
<body><div id="datatab">
<form action="" method="POST">
<center class="lapcet">Cetak Laporan</center>
<div class="cari">
<input type="date" name="datein" class="btn bg-red">   <input type="date" name="dateout" class="btn bg-red">  <input type="submit" name="sub" value="check" class="btn btn-warning">  <input type="submit" name="submitt" value="back to menu" class="btn btn-danger">  
</div>
</form>
<?php
if (isset($_POST['submitt'])) {
	header('location: out.php');
}elseif (isset($_POST['sub'])) {
	$d1 = $_POST['datein'];
	$d2 = $_POST['dateout'];
	header('location: printlap.php?id='.$d1.'&idd='.$d2);
	}
?>
</table>
<div class="menari">
</div>

</body>
</html>