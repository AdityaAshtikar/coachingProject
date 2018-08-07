<?php 

	$page_title = "Enquiry";
	include 'headerHtml.inc';

	include 'registerClass.php';
	$obj = new dbConnect;

	$c_id = array();

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$college = $_POST['college'];
		$branch = $_POST['branch'];
		$sem = $_POST['sem'];
		$nos = $_POST['nos'];
		$date = $_POST['date'];

		foreach ($_POST['c_id'] as $c_id) {
			$obj->insert_enquiry($name, $phone, $email, $college, $branch, $sem, $nos, $c_id, $date);
		}
		echo "<h4>Enquiry made by $name</h4>";
		echo "<a href='allEnquiries.php' class='btn btn-primary'>All Enquiries</a>  |  ";
		echo "<a href='addEnquiryForm.php' class='btn btn-primary'>New Enquiry</a>";

	} else {
		echo "<h4>Wrong URL!</h4>";
	}

?>