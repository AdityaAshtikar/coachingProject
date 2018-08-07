<?php 

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$page_title = "Add Admin";
		include 'headerHtml.inc';
		include 'registerClass.php';

		$obj = new dbConnect;

		// $obj->checkLogin();
		// $obj->checkAdmin();

		$a_name = $_POST['a_name'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		// $c_id = $_POST['c_id'];
		$isAdmin = $_POST['isAdmin'];

		// $c_ids = array();

		// foreach ($c_id as $id) {
		// 	$c_ids[] = (int) $id;
		// }

		// $c_ids_joined = join('), (', $c_ids);

		$obj->insert_admin($a_name, $email, $pass, $isAdmin);

		echo "<a href='allAdmins.php' class='btn btn-primary'>All Users</a>  |  ";
		echo "<a href='addAdminForm.php' class='btn btn-primary'>Register</a>";

	} else {
		echo "<h4>Wrong URL!</h4>";
	}

?>