<?php 
	$page_title = "Add Batch";
	include 'headerHtml.inc';

	include 'registerClass.php';
	$obj = new dbConnect;
?>

<h4>Add new batch: </h4><br>

<form name="BatchForm" method="post" action="addBatch.php">
	<p>Faculty: 
		<select name="a_id" required>
			<?php 
				$rs = mysql_query("select * from admin");
				while ($rw=mysql_fetch_row($rs)) {
					echo "<option value='$rw[0]' >$rw[1]</option>";
				}
			?>
		</select>
	</p>
	<p>Course: 
		<select name="c_id" required>
			<?php 
				$res = mysql_query("select * from courses");
				while ($row=mysql_fetch_row($res)) {
					echo "<option value='$row[0]' >$row[1] (Duration: $row[2] Days)</option>";
				}
			?>
		</select>
	</p>
	<p>Timing: 
		<input type="time" name="s_time" required> to <input type="time" name="e_time" required>
	</p>
	<p>
		<input type="submit" value="Add Batch">
	</p>
</form>