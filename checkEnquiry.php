<?php 

	include 'registerClass.php';
	$obj = new dbConnect;

	$c_box = $_POST['c_box'];
	$s_id = $_POST['s_id'];

	if (strcmp($c_box, "yes")) {
		$query = "update enquiry_status set status='yes' where s_id='$s_id'";
	} else {
		$query = "update enquiry_status set status='no' where s_id='$s_id'";
	}
	mysql_query($query);

	header("Location: enquiry_status.php");

?>