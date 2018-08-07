<?php 

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$page_title = "Update";

		include 'registerClass.php';
		
		$obj = new dbConnect;

		$a_id = $_POST['a_id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$isAdmin = $_POST['isAdmin'];

		$obj->update($a_id, $name, $email, $pass, $isAdmin);

		$query = "select * from admin where a_id='$a_id'";

		$obj->show($query);

	}

?>