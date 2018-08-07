<?php 
	include 'registerClass.php';
	$obj = new dbConnect;

	$inv = $_GET['inv'];
	if (strcmp($inv, "true")==0) {
?>
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
		<strong>Login to continue</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>
<?php
	}

	$deleted = $_GET['deleted'];
	if (strcmp($deleted, "true")==0) {
?>
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
		<strong>Record Deleted</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>
<?php
	}

	$updated = $_GET['updated'];
	if (strcmp($updated, "true")==0) {
?>
		<div class="alert alert-primary alert-dismissible fade show" role="alert">
		<strong>Record Updated</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>
<?php 
	}

	$insert = $_GET['insert'];
	if (strcmp($insert, "true")==0) {
?>
		<div class="alert alert-primary alert-dismissible fade show" role="alert">
		<strong>Batch Added</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>
<?php
	}

	$wrong = $_GET['wrong'];
	if (strcmp($wrong, "url")==0) {
?>
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
		<strong>Wrong URL!</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>
<?php 
}

	$page_title = "Index";
	include 'headerHtml.inc';
?>

<a href="allEnquiries.php" class="btn btn-info">Enquiries</a>
<a href="allCourses.php" class="btn btn-info">Courses</a>
<a href="addEnquiryForm.php" class="btn btn-info">Add New Enquiry</a>

<hr>

<h5>Admin: </h5>

<a href="allAdmins.php" class="btn btn-info">Users</a>
<a href="addBatchStudents.php" class="btn btn-info">Add Students in Batch</a>
<a href="addBatchForm.php" class="btn btn-info">Add New Batch</a>
<a href="addAdminForm.php" class="btn btn-info">Register</a>
<a href="addCourseForm.php" class="btn btn-info">Add New Course</a>

<hr>

<h4>Batches: </h4><br>

<h6>View : 

By Course: <select name="courseName">
	<?php 
		$c_result = mysql_query("select c_id, c_name from courses");
		while ($c_row = mysql_fetch_row($c_result)) {
			$c_id = $c_row[0];
			$c_name = $c_row[1];
			echo "<option value='$c_id'> $c_name </option>";
		}
	?>
</select><br><br>

<?php 
	$query = "select * from batch_students order by c_id asc";
	$all = mysql_query($query);

	$num_fields = mysql_num_fields($all);
	$num_rows = mysql_num_rows($all);
?>

<form method="get" action=searchBatch.php>
	<input type="text" name="s_box" placeholder="Enter Course name or Enrolled Student name" size="45">
	<input type="submit" value="search" class="btn btn-sm btn-info">
</form><br>

<?php
	echo "<h4>Total $num_rows rows.</h4>";

	echo "<table cellpadding=10 style='border-collapse: collapse; border: 2px solid gray'>";
	echo "<tr style='border: 2px solid #35507c'>";
	// $j = 0;
	// while ($j < $num_fields) {
	// 	$fields = mysql_fetch_field($all);
		
	// 	echo "<th style='border-right: 1px solid #324563;'>" . ucwords($fields->name) . "</th>";
	// 	$j++;
	// }
	//	echo $j;
	echo "<th style='border-right: 1px solid #324563;'> Batch Id: </th>";
	echo "<th style='border-right: 1px solid #324563;'> Faculty </th>";
	echo "<th style='border-right: 1px solid #324563;'> Course Name </th>";
	echo "<th style='border-right: 1px solid #324563;'> Starts </th>";
	echo "<th style='border-right: 1px solid #324563;'> Ends </th>";
	echo "<th style='border-right: 1px solid #324563;'> Student Enrolled </th>";
	echo "</tr>";

	$count = 0;
	while ($rw=mysql_fetch_row($all)) {
		$id = $rw[0];
		if ($count%2==0) {
			echo "<tr bgcolor='#c0cde2'>";
		} else {
			echo "<tr bgcolor='#82a1a3'>";
		}
		for ($i=0; $i < $num_fields ; $i++) {
			if ($i==1) {
				$result = mysql_query("select a_name, a_id from admin where a_id='$rw[$i]'");
				while ($row=mysql_fetch_row($result)) {
					echo "<td style='border-right: 1px solid #324563;'>".$row[0]."</td>";
				}
			} elseif ($i==2) {
				$result = mysql_query("select c_name, c_id from courses where c_id='$rw[$i]'");
				while ($row=mysql_fetch_row($result)) {
					echo "<td style='border-right: 1px solid #324563;'>".$row[0]." (id=".$row[1].")"."</td>";
				}
			} elseif ($i==5) {
				$result = mysql_query("select name from enquiry where s_id='$rw[$i]'");
				$nos = mysql_num_rows($result);
				if ($nos==0) {
					echo "<td style='border-right: 1px solid #324563;'>".$nos."</td>";
				} else {
					while ($row=mysql_fetch_row($result)) {
						echo "<td style='border-right: 1px solid #324563;'>".$row[0]."</td>";
					}
				}
			} else {
				echo "<td style='border-right: 1px solid #324563;'>".$rw[$i]."</td>";
			}
		}
		echo "</tr>";
		$count++;
	}
?>