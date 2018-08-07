<?php 
	$page_title = "Search Results";
	include 'headerHtml.inc';
	include 'registerClass.php';
	$obj = new dbConnect;

	echo "<a href='index.php' class='btn btn-primary'>Index</a><br><br>";

	$s_box = $_GET['s_box'];
	$query1 = "select c_id from courses where c_name like '%$s_box%'"; // search for c_name
	$query2 = "select * from enquiry where name like '%$s_box%'";	//search for student_name
	
	if ($q1_results = mysql_query($query1)) {
		if ($q1_rows=mysql_fetch_row($q1_results)) {	//checking for c_name in courses
			$c_id = $q1_rows[0];

			$q1_res=mysql_query("select * from batch where c_id='$c_id'");
			$num_fields = mysql_num_fields($q1_res);
			$num_rows = mysql_num_rows($q1_res);
			echo "<h4>Total $num_rows rows.</h4>";
			echo "<table cellpadding=10 style='border-collapse: collapse; border: 2px solid gray'>";
			echo "<tr style='border: 2px solid #35507c'>";
			$j = 0;
			while ($j < $num_fields) {
				$fields = mysql_fetch_field($q1_res);		
				echo "<th style='border-right: 1px solid #324563;'>" . ucwords($fields->name) . "</th>";
				$j++;
			}
			echo "<th> Actions </th>";
			echo "</tr>";

			while ($q1_rw=mysql_fetch_row($q1_res)) {	//checking for c_id of c_name in batch
				$count = 0;
				$id = $q1_rw[0];
				if ($count%2==0) {
					echo "<tr bgcolor='#c0cde2'>";
				} else {
					echo "<tr bgcolor='#82a1a3'>";
				}
				for ($i=0; $i < $num_fields ; $i++) {
					if ($i==1) {
						$result = mysql_query("select a_name, a_id from admin where a_id='$q1_rw[$i]'");
						while ($row=mysql_fetch_row($result)) {
							echo "<td style='border-right: 1px solid #324563;'>".$row[0]."</td>";
						}
					} elseif ($i==2) {
						$result = mysql_query("select c_name, c_id from courses where c_id='$q1_rw[$i]'");
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
						else {
							echo "<td style='border-right: 1px solid #324563;'>".$q1_rw[$i]."</td>";
						}
					}
				echo "<td style='border-right: 1px solid #324563;'><a href='updateBatch.php?id=$id'>Update</a></td>";
				echo "<td style='border-right: 1px solid #324563;'><a href='deleteBatch.php?id=$id'>Delete</a></td>";
			}
		}
	} elseif ($q1_results = mysql_query($query2)) {	//$query2 = "select * from enquiry where name like '$s_box'";
		while ($q1_rows=mysql_fetch_row($q1_results)) {	//checking for name in enquiry
			$s_name = $q1_rows[1];

			$q1_res=mysql_query("select * from enquiry where name='$s_name'");	//taking id if name found
			if ($s_row=mysql_fetch_row($q1_res)) {
				$s_id = $s_row[0];
			}

			$b_query = mysql_query("select * from batch where s_id='$s_id'");	//checking id in batch
			$num_fields = mysql_num_fields($b_query);
			$num_rows = mysql_num_rows($b_query);
			echo "<h4>Total $num_rows rows.</h4>";
			echo "<table cellpadding=10 style='border-collapse: collapse; border: 2px solid gray'>";
			echo "<tr style='border: 2px solid #35507c'>";
			$j = 0;
			while ($j < $num_fields) {
				$fields = mysql_fetch_field($q1_res);		
				echo "<th style='border-right: 1px solid #324563;'>" . ucwords($fields->name) . "</th>";
				$j++;
			}
			echo "<th> Actions </th>";
			echo "</tr>";

			while ($q1_rw=mysql_fetch_row($b_query)) {	//rows for s_id of s_name in batch
				$count = 0;
				$id = $q1_rw[0];
				if ($count%2==0) {
					echo "<tr bgcolor='#c0cde2'>";
				} else {
					echo "<tr bgcolor='#82a1a3'>";
				}
				for ($i=0; $i < $num_fields ; $i++) {
					if ($i==1) {
						$result = mysql_query("select a_name, a_id from admin where a_id='$q1_rw[$i]'");
						while ($row=mysql_fetch_row($result)) {
							echo "<td style='border-right: 1px solid #324563;'>".$row[0]."</td>";
						}
					} elseif ($i==2) {
						$result = mysql_query("select c_name, c_id from courses where c_id='$q1_rw[$i]'");
						while ($row=mysql_fetch_row($result)) {
							echo "<td style='border-right: 1px solid #324563;'>".$row[0]." (id=".$row[1].")"."</td>";
						}
					} elseif ($i==5) {
						$result = mysql_query("select name, s_id from enquiry_status where s_id='$q1_rw[$i]'");
						while ($row=mysql_fetch_row($result)) {
							echo "<td style='border-right: 1px solid #324563;'>".$row[0]." (id=".$row[1].")"."</td>";
						}
					} else {
						echo "<td style='border-right: 1px solid #324563;'>".$q1_rw[$i]."</td>";
					}
					echo "<td style='border-right: 1px solid #324563;'><a href='updateBatch.php?id=$id'>Update</a></td>";
					echo "<td style='border-right: 1px solid #324563;'><a href='deleteBatch.php?id=$id'>Delete</a></td>";
				}
			}
		}
	}

?>