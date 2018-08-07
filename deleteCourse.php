<?php 
	include 'registerClass.php';
	$obj = new dbConnect;
	$c_id = $_GET['id'];
	mysql_query("delete from courses where c_id='$c_id'");
	header("Location: allCourses.php?deleted=true");
?>