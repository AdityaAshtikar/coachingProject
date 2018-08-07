<?php 
	$page_title = "Update Course";
	include 'headerHtml.inc';
	include 'registerClass.php';
	$obj = new dbConnect;
	$id = $_GET['id'];
?>

<form name="cu_form" method="post" action="updateCourse1.php">

	<?php 
		$res = mysql_query("select * from courses where c_id='$id'");
		if ($row = mysql_fetch_row($res)) {
			$c_id = $row[0];
			$c_name = $row[1];
			$c_duration = $row[2];
			$fees = $row[3];
		}
	?>
	
	<input type="hidden" name="c_id" value="<?php echo $c_id; ?>">
	Course Name: <input type="text" name="c_name" value="<?php echo $c_name; ?>" required size="30"><br><br>
	Course Duration(Days): <input type="number" name="c_duration" value=<?php echo $c_duration; ?> required min="10" max="120"><br><br>
	Fees: <input type="number" name="c_fees" value=<?php echo $fees; ?> required min="500"><br><br>
	<input type="submit" name="Submit">

</form>