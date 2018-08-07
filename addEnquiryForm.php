<?php 

	$page_title = "Enquiry";
	include 'headerHtml.inc';

	include 'registerClass.php';
	$obj = new dbConnect;

?>

<h4>Enquiry Form: </h4><br>

<form name="enquiry" method="post" action="addEnquiry.php">
	<p>
		Full Name: <input type="text" name="name" required>
	</p>
	<p>
		Phone: <input type="text" name="phone" required>
	</p>
	<p>
		Email ID: <input type="email" name="email" required>
	</p>
	<p>
		College: <input type="text" name="college" required>
	</p>
	<p>
		Branch: 
			<select name="branch" required>
				<option value="CSE">CSE</option>
				<option value="Mech">Mech</option>
				<option value="BCA">BCA</option>
				<option value="Civil">Civil</option>
			</select>
	</p>
	<p>
		Semester: <input type="number" name="sem" required min="1" max="8">
	</p>
	<p>
		Number of Students: <input type="number" name="nos" required min="1">
	</p>
	<p>
		Course:
			<select name="c_id[]" multiple="multiple" required>
				<?php $obj->course_select(); ?>
			</select>
	</p>
	<p>
		Date: <input type="date" name="date" required>
	</p>
	<input type="submit" value="Submit">

</form>