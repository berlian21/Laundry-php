<!DOCTYPE html>
<html>
<head>
	<title>LAUNDRY PAK BAPAK</title>
</head>
<link rel="stylesheet" type="text/css" href="style.css">
<body>
<form action="" method="POST">
	<input type="text" name="usr" minlength="3" placeholder="USERNAME">
	<input type="password" name="pwd" minlength="3" placeholder="PASSWORD">
	<input type="submit" name="submit" value="LOGIN">
</form>

<?php
include "conn.php";
if (isset($_POST['submit'])) {
	if ($_POST['usr'] == "" || is_null($_POST['usr']) || $_POST['pwd'] == "" || is_null($_POST['pwd'])) {
		echo "<script type='text/javascript'>alert('Username or Password Cant empty!!!');</script>";
	}else{
		$us = $_POST['usr'];
		$pd = $_POST['pwd'];
		$news = "select * from akun where username = '$us' AND password = '$pd';";
		$launch = mysql_query($news, $koneksi);
		$go = mysql_num_rows($launch);
		if ($go > 0) {
		session_start();
		$dat = mysql_fetch_assoc($launch);
		if ($dat['tipe'] == "owner") {
			$typec = "owner";				
		}elseif ($dat['tipe'] == "admin") {
			$typec = "admin";
		}
		$_SESSION['types'] = $typec;
		$_SESSION['nama'] = $us;
		$_SESSION['det'] = "CONNECT TO WEBSITE";
		header('location: out.php');
	}else{ echo "<script type='text/javascript'>alert('Username or Password is Wrong!!!');</script>";}

	}
}
?>

</body>
</html>
