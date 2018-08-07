<?php 
	$page_title = "Login";
	include 'headerHtml.inc';

	$inv = $_GET['inv'];
	if (strcmp($inv, 'yes')==0) {
		echo "<b>Invalid Login Info!</b>";
	}
	if (strcmp($inv, 'logout')==0) {
		echo "<b>Visit Again!</b>";
	}

?>

<form method="post" name="form1" action="login2.php">
	Email: <input type="text" name="email" size="30" required><br><br>
	Password: <input type="text" name="pass" size="30" required><br><br>
	<input type="submit" value="Login">
</form>