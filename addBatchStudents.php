<?php 
	$page_title = "Enquiry Status";
	include 'headerHtml.inc';
	include 'registerClass.php';
	$obj = new dbConnect;
?>

<script language="javascript">
	function x() { //to get info for course name
		form1.action = "addBatchStudents.php";
		form1.submit();
	}

	function y() {
		form1.action = "addStudents.php";
		form1.submit();
	}
</script>

	<a href='index.php' class='btn btn-info'>Main Page</a><br><br>
	<h4>Add Students in Batch: </h4><br>

	<form name=form1 method=get action="">
	Courses: 
	<select name='c_id' required onchange=x()>
		<?php 
		$c_get = $_GET['c_id'];
		$all = mysql_query("select * from courses");
		while ($rw=mysql_fetch_row($all)) {
			$c_id = $rw[0];
			$c_name = $rw[1];
			$c_duration = $rw[2];
			if ($c_id==$c_get) {
				echo "<option value='$c_id' selected>$c_name (Duration: $c_duration days)</option>";
			} else {
				echo "<option value='$c_id'>$c_name (Duration: $c_duration days)</option>";
			}
		}
		echo "</select>";
	?>
	<br><br>Students: 
		<select name="s_id[]" multiple='multiple' required>
			<?php 
				$res = mysql_query("select * from enquiry_status where c_id='$c_get' and status='no'");
				while ($row=mysql_fetch_row($res)) {
					$s_id = $row[0];
					$c_id = $row[1];
					$status = $row[2];
					$s_result = mysql_query("select * from enquiry where s_id='$s_id'");
					if ($s_row = mysql_fetch_row($s_result)) {
						$s_id2 = $s_row[0];
						$s_name = $s_row[1];
						$college = $s_row[4];
						echo "<option value='$s_id2'>$s_name ($college)</option>";
					}
				}
			?>
		</select>
	<br><br>

		Batch: <select name="time" required>
			<?php 
				$result = mysql_query("select * from batch where c_id='$c_get'");
				while ($r=mysql_fetch_row($result)) {
					$b_id = $r[0];
					$f_id = $r[1];
					$c_id = $r[2];
					$s_time = $r[3];
					$e_time = $r[4];
					echo "<option value='$s_time|$e_time|$b_id|$f_id'>$s_time - $e_time</option>";
				?>
				<?php 
				}
			?>
		</select><br><br>

	<input type="button" value="Add" onclick="y()" class="btn btn-info">

	</form><br>
	<a href="addBatchForm.php" class='btn btn-info'>Add New Batch</a>