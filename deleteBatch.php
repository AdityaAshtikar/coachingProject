<?php 
	include 'registerClass.php';
	$obj = new dbConnect;

	$b_id = $_GET['id'];
	mysql_query(" delete from batch where b_id='$b_id' ");
	header("Location: index.php?deleted=true");
?>