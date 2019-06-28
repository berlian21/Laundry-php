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
<link rel="stylesheet" type="text/css" href="outstyle.css">
<body>
<div class="atas">
<div class="headermang">LAUNDRY SUKA SUKA</div>
<div class="headkuy"><?php echo $_SESSION['nama'] . ", " . $_SESSION['types']; ?></div>
</div>
<form action="" method="POST">
<input type="submit" name="submits" value="DATA ORDER">
<?php
if ($_SESSION['types'] == "owner") {
	echo "<input type='submit' name='lap' value='laporan'>";
}elseif($_SESSION['types'] == "admin" ){
	echo "<input type='submit' name='submitt' value='ORDER'>";
}
?>
<input type="submit" name="submit" value="LOGOUT">
</br></br></br>
</form>



<?php
if(isset($_POST['submit'])){
	session_destroy();
	header('location: in.php');
}elseif(isset($_POST['submits'])) {
	header('location: dataorder.php');
}elseif(isset($_POST['submittt'])) {
	header('location: test.php');
}elseif (isset($_POST['submitt'])) {
	header('location: order.php');
}elseif(isset($_POST['lap'])) {
	header('location: lap.php');
}
else{}
?>
</body>
</html>

