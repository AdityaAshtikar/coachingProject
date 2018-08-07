<?php 

	include 'registerClass.php';
	$obj = new dbConnect;
	// $obj->checkAdmin();
	$page_title = "Add Course";
	include 'headerHtml.inc';

?>

<form name="courseForm" method="post" action="addCourse.php">
	
	Course Name: <input type="text" name="c_name" required size="30"><br><br>
	Course Duration(Days): <input type="number" name="c_duration" required min="10" max="120"><br><br>
	Fees: <input type="number" name="c_fees" required min="500"><br><br>
	<input type="submit" name="Submit">

</form>