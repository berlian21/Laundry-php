<?php
include "conn.php";
session_start();
if ($_SESSION['det'] != "CONNECT TO WEBSITE") {
	header('location: in.php');
}
?>
<?php

include "conn.php";
$nt = $_GET['id'];
$sql = "update pesenan set status_pembayaran='Lunas', status_order='sudah diambil' where no_order='$nt';";
$run = mysql_query($sql);
if ($run) {
	header("location: dataorder.php");
}else{
	header("location: dataorder.php");
}
?>