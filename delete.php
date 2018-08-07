<?php 
	include 'registerClass.php';
	$obj = new dbConnect;

	$id = $_GET['id'];
	$obj->delete($id);
	header("Location: index.php?deleted=true");
?>