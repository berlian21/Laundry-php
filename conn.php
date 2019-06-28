<?php 
$lc = "localhost";
$usr = "root";
$pwd = "";
$dbs = "laundry";

$koneksi = mysql_connect($lc, $usr, $pwd, $dbs);
$db = mysql_select_db($dbs, $koneksi);
if ($db) { echo ""; } else { echo "Failed to open Database, Please check the Database."; }
 ?>
