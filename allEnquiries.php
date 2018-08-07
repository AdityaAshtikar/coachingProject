<?php 
	$page_title = "Enquiries";
	include 'headerHtml.inc';
	include 'registerClass.php';
	$obj = new dbConnect;

	$query = "select * from enquiry order by s_id asc";
	$deleted = $_GET['deleted'];
	if (strcmp($deleted, "true")==0) {
		echo "<h4>Record Deleted</h4>";
	}
	$obj->show_enquiry($query);
?>