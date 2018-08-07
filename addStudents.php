<?php 
	include 'registerClass.php';
	$obj = new dbConnect;
	
	$s_id = array();//students array

	if ($_SERVER['REQUEST_METHOD'] == 'GET') {

		//seperating s_time and e_time with explode
		$time = $_GET['time'];
		$time_and_id = explode('|', $time);
		$s_time = $time_and_id[0];
		$e_time = $time_and_id[1];
		$b_string = $time_and_id[2];
		$f_string = $time_and_id[3];

		$b_id = $b_string;
		$f_id = $f_string;

		$c_id = $_GET['c_id'];

		foreach ($_GET['s_id'] as $s_id) {
			$obj->add_batch($b_id, $f_id, $c_id, $s_id, $s_time, $e_time);
		}
		header("Location: index.php?insert=true");

	} else {
		header("Location: index.php?wrong=url");
	}
?>