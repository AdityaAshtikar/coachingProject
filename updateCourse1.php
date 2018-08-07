<?php 
	include 'registerClass.php';
	$obj = new dbConnect;
	$c_id = $_POST['c_id'];
	$c_name = $_POST['c_name'];
	$c_duration = $_POST['c_duration'];
	$fees = $_POST['c_fees'];

	$obj->update_course($c_id, $c_name, $c_duration, $fees);

	$query = "select * from courses order by c_id asc";
	$obj->show_course($query);
?>