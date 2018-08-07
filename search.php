<?php 
	$page_title = "Search";
	include 'headerHtml.inc';
	include 'registerClass.php';
	$obj = new dbConnect;

	$s_box = $_GET['s_box'];

	if (is_numeric($s_box)) {
		$phone = $s_box;
		$query = "select * from enquiry where phone like '%$phone%'";
	} else {
		$name = $s_box;
		$query = "select * from enquiry where name like '%$name%'";
	}

	$obj->show_enquiry($query);

?>