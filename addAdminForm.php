<?php 

	$page_title = "Add Admin";
	include 'headerHtml.inc';

	include 'registerClass.php';

	$obj = new dbConnect;
	// $obj->checkLogin();
	// $obh->checkAdmin();

?>

<script language="javascript">
	function check() {
		var s1, s2;
		s1 = formAdmin.pass.value;
		s2 = formAdmin.c_pass.value;

		if (s1!=s2) {
			formAdmin.checking.disabled = true;
			formAdmin.checking.value =  "Passwords do not match!";
			formAdmin.c_pass.value = "";
			formAdmin.c_pass.focus();
			formAdmin.Submit.disabled = true;
		} else {
			formAdmin.checking.type =  "hidden";
			formAdmin.Submit.disabled = false;
		}
	}

</script>

<h4>Admin Registration: </h4><br>

<form name="formAdmin" method="post" action="addAdmin.php">
	
	Full Name: <input type="text" name="a_name" required size="30" autocomplete="off"><br><br>
	Email: <input type="email" name="email" required><br><br>
	Password: <input type="password" name="pass" required size="30"><br><br>
	Confirm Password: <input type="password" name="c_pass" required size="30" onchange="check()"><br>
	<input type="hidden" name="checking"><br>

	<input type="radio" name="isAdmin" value="yes">Admin
	<input type="radio" name="isAdmin" value="no">Operator
	<br><br>

	<input type="submit" name="Submit">

</form>