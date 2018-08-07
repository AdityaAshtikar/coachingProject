<?php 
	include 'registerClass.php';
	$obj = new dbConnect;

	$b_id = $_POST['b_id'];

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$a_id = $_POST['a_id'];
		$c_id = $_POST['c_id'];
		$s_time = $_POST['s_time'];
		$e_time = $_POST['e_time'];

		mysql_query("update batch set f_id=$a_id, c_id=$c_id, s_time='$s_time', e_time='$e_time' where b_id='$b_id'");

		header("Location: index.php?updated=true");
	}

?>