<?php
	session_start();
	include 'registerClass.php';
	$obj = new dbConnect;

	$email = $_POST['email'];
	$pass = $_POST['pass'];

	$query1 = "select * from admin where email='$email' and pass='$pass'";

	if ($all=mysql_query($query1)) {
		if ($rw=mysql_fetch_row($all)) {
			$_SESSION["uid"] = $rw[0];
			$_SESSION["uname"] = $rw[1];
			$_SESSION["email"] = $rw[2];
			if ($rw[5] == "yes") {
				$obj->admin = TRUE;
			}
			header("Location: login3.php");
		} else {
			header("Location: login1.php?inv=yes");
		}
	}

?>