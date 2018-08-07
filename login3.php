<?php 

	session_start();
	$uid = $_SESSION['uid'];
	if (strcmp($uid, "") == 0) {
		echo "Please Login";
	} else {
		header("Location: index.php");
		echo "<a href=logout.php>Logout</a>";
	}

?>