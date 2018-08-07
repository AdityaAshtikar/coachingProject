<?php 

	$page_title = "Update";
	include 'headerHtml.inc';

	include 'registerClass.php';
	
	$obj = new dbConnect;

	$id = $_GET['id'];

?>

<h3>Update Form: </h3><br>

<form name="updateForm" method="post" action="update2.php">

<?php

	$rs = mysql_query(" select * from admin where a_id='$id' ");
	if ($rw=mysql_fetch_row($rs)) {
		echo "<input type='hidden' name='a_id' value='$rw[0]'>";
		echo "Name: <input type='text' name='name' value='$rw[1]'><br><br>";
		echo "Email: <input type='text' name='email' value='$rw[2]'><br><br>";
		echo "Password: <input type='text' name='pass' value='$rw[3]'><br><br>";

		if ($rw[5]=="yes") {
			echo "<input type=radio name='isAdmin' value='yes' selected='true'>Admin    ";
			echo "<input type=radio name='isAdmin' value='no'>Operator<br><br>";
		} else {
			echo "<input type=radio name='isAdmin' value='yes'>Admin    ";
			echo "<input type=radio name='isAdmin' value='no' selected='true'>Operator<br><br>";
		}

		echo '<input type="submit" value="Update"><br>';
	}
	else {
		echo "<h4>No records to update</h4>";
	}

?>

</form>