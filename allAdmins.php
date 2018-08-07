<?php 
	session_start();
	include 'registerClass.php';
	$obj = new dbConnect;

	$page_title = "Users";
	include 'headerHtml.inc';

	// $obj->checkLogin();
	// $obj->checkAdmin();

	$query = "select * from admin order by a_id asc";
	$obj->show($query);
?>