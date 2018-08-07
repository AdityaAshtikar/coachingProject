<?php 
	include 'registerClass.php';
	$obj = new dbConnect;
	$s_id = $_GET['id'];
	$obj->delete_enquiry($s_id);
	header("Location: allEnquiries.php?deleted=true");
?>