<?php 

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$page_title = "Add Course";
		include 'headerHtml.inc';

		include 'registerClass.php';

		$obj = new dbConnect;
		// $obj->checkLogin();
		// $obj->checkAdmin();

		$c_name = $_POST['c_name'];
		$c_duration = $_POST['c_duration'];
		$c_fees = $_POST['c_fees'];

		$obj->insert_course($c_name, $c_duration, $c_fees);

		echo "<a href='allCourses.php' class='btn btn-primary'>All Courses</a>  |  ";
		echo "<a href='addCourseForm.php' class='btn btn-primary'>Add New Course</a> | ";
		echo "<a href='index.php' class='btn btn-primary'>Main Page</a>";
	} else {
		echo "<h4>Wrong URL!</h4>";
	}

?>