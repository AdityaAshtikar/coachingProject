<?php 
	$page_title = "Update Batch";
	include 'headerHtml.inc';
	include 'registerClass.php';
	$obj = new dbConnect;
	$b_id = $_GET['id'];
?>

<h4>Update batch: <?php echo "$b_id"; ?></h4><br>

<form name="uBatchForm" method="post" action="updateBatch1.php">
	<input type="hidden" name="b_id" value=<?php echo $b_id; ?> >
	<p>Faculty: 
		<select name="a_id">
			<?php 
				$rs = mysql_query("select * from admin");
				while ($rw=mysql_fetch_row($rs)) {
					echo "<option value='$rw[0]' >$rw[1]</option>";
				}
			?>
		</select>
	</p>
	<p>Course: 
		<select name="c_id">
			<?php 
				$res = mysql_query("select * from courses");
				while ($row=mysql_fetch_row($res)) {
					echo "<option value='$row[0]' >$row[1] (Duration: $row[2] Days)</option>";
				}
			?>
		</select>
	</p>
	<p>Timing: 
		<?php 
			$result = mysql_query("select * from batch where b_id='$id'");
			if ($r=mysql_fetch_row($result)) {
				$s_time = $r[3];
				$e_time = $r[4];
			}
			echo "<input type='time' name='s_time' value='$s_time'> to <input type='time' name='e_time' value='$e_time'>";
		?>
	</p>
	<p>
		<input type="submit" value="Update Batch">
	</p>
</form>