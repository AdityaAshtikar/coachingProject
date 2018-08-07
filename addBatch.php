<?php 
	
	include 'registerClass.php';
	$obj = new dbConnect;

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$a_id = $_POST['a_id'];
		$c_id = $_POST['c_id'];
		$s_time = $_POST['s_time'];
		$e_time = $_POST['e_time'];

		$query = "insert into batch(f_id, c_id, s_time, e_time)
				values($a_id, $c_id, '$s_time', '$e_time')";

		mysql_query($query);

		header("Location: index.php");
	} else {
		echo "<h4>Wrong URL!</h4>";
	}

?>