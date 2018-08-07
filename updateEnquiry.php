<?php 
	$page_title = "Update Enquiry";
	include 'headerHtml.inc';
	include 'registerClass.php';
	$obj = new dbConnect;
	$s_id = $_GET['id'];
?>

<h4>Update Enquiry: </h4><br>

<form name="enquiry" method="post" action="updateEnquiry2.php">

	<?php 
		$result = mysql_query(" select * from enquiry where s_id='$s_id' ");
		if ($row=mysql_fetch_row($result)) {
			echo "<p><input type='hidden' name='s_id' value='$s_id'></p>";
			echo "<p>Full Name: <input type='text' name='name' required value='$row[1]'></p>";
			echo "<p>Phone: <input type='text' name='phone' required value='$row[2]'></p>";
			echo "<p>Email ID: <input type='email' name='email' required value='$row[3]'></p>";
			echo "<p>College: <input type='text' name='college' required value='$row[4]'></p>";
			echo "<p>Branch: ";
					echo "<select name='branch' required>";
					echo "<option value='CSE'>CSE</option>";
					echo "<option value='Mech'>Mech</option>";
					echo "<option value='BCA'>BCA</option>";
					echo "<option value='Civil'>Civil</option>";
					echo "</select>";
			echo "</p>";
			echo "<p>Semester: <input type='number' name='sem' required min='1' max='8' value='$row[6]'></p>";
			echo "<p>Number of Students: <input type='number' name='nos' required min='1' value='$row[7]'></p>";
			echo "<p>Course: ";
			?>
					<select name='c_id[]' multiple='multiple'>
			<?php
					$c_res = mysql_query('select * from courses');
					while ($c_rw=mysql_fetch_row($c_res)) {
						$c_id = $c_rw[0];
						$c_name = $c_rw[1];
						$c_duration = $c_rw[2];
						echo "<option value='$c_id'>$c_name ($c_duration Days)</option>";
					}
			?>
					</select>
			<?php
			echo "</p>";
			echo "<p>Date: <input type='date' name='date' required value='$row[9]'></p>";
		}
	?>

	<input type="submit" value="Update">

</form>