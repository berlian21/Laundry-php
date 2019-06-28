<?php
include "conn.php";
session_start();
if ($_SESSION['det'] != "CONNECT TO WEBSITE") {
	header('location: in.php');
}
?>