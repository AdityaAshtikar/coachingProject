<?php 
	$page_title = "Courses";
	include 'headerHtml.inc';
	include 'registerClass.php';
	$obj = new dbConnect;
	$deleted = $_GET['deleted'];
	if (strcmp($deleted, "true")==0) {
?>
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
		<strong>Record Deleted</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>
<?php 
	}
	$query = "select * from courses order by c_id asc";
	$obj->show_course($query);
?>