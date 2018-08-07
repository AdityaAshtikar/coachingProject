<?php

	class dbConnect {

		var $admin = FALSE;
		var $operator = FALSE;
		function __construct() {
			$conn = mysql_connect('localhost', 'root', '');
			if(!$conn) {
				echo "<h3>Connection could not be estalished, try again!<h3>";
				exit();
			}
			mysql_select_db('tac');
		}

		function checkLogin() {
			$uid = $_SESSION['uid'];
			// if (strcmp($uid, "") == 0) {
			// 	header("Location: index.php?inv=true");
			// }
		}

		function checkAdmin() {
			$uid = $_SESSION['uid'];
			$email = $_SESSION['email'];
			$rs = mysql_query("select * from admin where email='$email' and a_id='$uid'");
			if ($rw=mysql_fetch_row($rs)) {
				if ($rw[5]=="yes") {
					echo "<h4>You have administrator access!</h4>";
				} else {
					echo "<h4>You don't have administrator access!";
				}
			} else {
				echo "<h4>Login to continue!";
			}
		}

		function insert_course($c_name=null, $c_duration=null, $c_fees) {
			if ($c_name!=null) {
				$query = "insert into courses(c_name, c_duration, fees) values('$c_name', '$c_duration', $c_fees)";
				echo "<h4>Course $c_name inserted</h4>";
			}
			mysql_query($query);
		}

		function update_course($c_id, $c_name, $c_duration, $c_fees) {
			$query = "update courses set c_name='$c_name', c_duration='$c_duration', fees=$c_fees where c_id='$c_id'";
			mysql_query($query);
		}

		function insert_admin($a_name, $email, $pass, $isAdmin) {
			$query = "insert into admin(a_name, email, pass, isAdmin)
			values('$a_name', '$email', '$pass', '$isAdmin')";
			mysql_query($query);
			if ($isAdmin == "yes") {
				echo "<h4>Admin $a_name inserted</h4>";
			} else
				echo "<h4>Operator $a_name inserted</h4>";
		}

		function insert_enquiry($name=null, $phone=null, $email=null, $college=null, $branch=null, $sem=null, $nos=null, $c_id=null, $date=null) {
			if ($name!=null) {
				$query = "insert into enquiry
				(name, phone, email, college, branch, sem, no_students, c_id, date)
				values ('$name', '$phone', '$email', '$college', '$branch', $sem, $nos, $c_id, '$date')";
				mysql_query($query);
				$query2 = "insert into enquiry_status (s_name, c_id, status) values ('$name', '$c_id', 'no')";
				mysql_query($query2);
			}
		}

		function show($query) {
			$all = mysql_query($query);

			echo "<a href='index.php' class='btn btn-info'>Main Page</a>";

			$num_fields = mysql_num_fields($all);
			$num_rows = mysql_num_rows($all);

			echo "<h4>Total $num_rows rows.</h4>";

			echo "<table cellpadding=10 style='border-collapse: collapse; border: 2px solid gray'>";


			echo "<tr style='border: 2px solid #35507c'>";
			$j = 0;
			while ($j < $num_fields) {
				$fields = mysql_fetch_field($all);

				echo "<th style='border-right: 1px solid #324563;'>" . ucwords($fields->name) . "</th>";
				$j++;
			}
			//	echo $j;
			echo "<th> Actions </th>";
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
					echo "<td style='border-right: 1px solid #324563;'>".$rw[$i]."</td>";
				}
				echo "<td style='border-right: 1px solid #324563;'><a href='update.php?id=$id'>Update</a></td>";
				echo "<td style='border-right: 1px solid #324563;'><a href='delete.php?id=$id'>Delete</a></td>";
				echo "</tr>";
				$count++;
			}
		}

		function show_course($query) {
			$all = mysql_query($query);
			echo "<a href='index.php' class='btn btn-info'>Main Page</a>";
			$num_fields = mysql_num_fields($all);
			$num_rows = mysql_num_rows($all);
			echo "<h4>Total $num_rows rows.</h4>";
			echo "<table cellpadding=10 style='border-collapse: collapse; border: 2px solid gray'>";
			echo "<tr style='border: 2px solid #35507c'>";
			$j = 0;
			while ($j < $num_fields) {
				$fields = mysql_fetch_field($all);

				echo "<th style='border-right: 1px solid #324563;'>" . ucwords($fields->name) . "</th>";
				$j++;
			}
			//	echo $j;
			echo "<th> Actions </th>";
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
					echo "<td style='border-right: 1px solid #324563;'>".$rw[$i]."</td>";
				}
				echo "<td style='border-right: 1px solid #324563;'><a href='updateCourse.php?id=$id'>Update</a></td>";
				echo "<td style='border-right: 1px solid #324563;'><a href='deleteCourse.php?id=$id'>Delete</a></td>";
				echo "</tr>";
				$count++;
			}
		}

		function update($id, $name, $email, $pass, $isAdmin) {
			$query = "update admin set a_name='$name', email='$email', pass='$pass',
					  isAdmin='$isAdmin' where a_id='$id' ";
			mysql_query($query);
		}

		function update_enquiry($s_id, $name=null, $phone=null, $email=null, $college=null, $branch=null, $sem=null, $nos=null, $c_id=null, $date=null) {
			$query = "update enquiry set name='$name', phone='$phone', email='$email', college='$college', branch='$branch', sem=$sem, no_students=$nos, c_id=$c_id, date='$date' where s_id='$s_id'";
			mysql_query($query);
			$query2 = "update enquiry_status set s_name='$name', c_id=$c_id, status='no' where s_id='$s_id";
			mysql_query($query2);
		}

		function show_enquiry($query) {
			$all = mysql_query($query);
			echo "<a href='index.php' class='btn btn-info'>Main Page</a><br><br>";
			$num_fields = mysql_num_fields($all);
			$num_rows = mysql_num_rows($all);

			echo "<form name=sform method=get action=search.php>";
					echo "<input type=text name=s_box placeholder='Enter name or phone number' size=30>";
					echo "<input type=submit value='Search' class='btn btn-sm btn-info'>";
			echo "</form>";

			echo "<br><h4>Total $num_rows rows.</h4>";

			echo "<table cellpadding=10 style='border-collapse: collapse; border: 2px solid gray'>";

			echo "<tr style='border: 2px solid #35507c'>";
			$j = 0;
			while ($j < $num_fields) {
				$fields = mysql_fetch_field($all);

				echo "<th style='border-right: 1px solid #324563;'>" . ucwords($fields->name) . "</th>";
				$j++;
			}
			//	echo $j;
			echo "<th> Actions </th>";
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
					if ($i==8) {
						$result = mysql_query("select c_name from courses where c_id='$rw[$i]'");
						while ($row=mysql_fetch_row($result)) {
							echo "<td style='border-right: 1px solid #324563;'>".$row[0]."</td>";
						}
					} else {
					echo "<td style='border-right: 1px solid #324563;'>".$rw[$i]."</td>";
					}
				}
				echo "<td style='border-right: 1px solid #324563;'><a href='updateEnquiry.php?id=$id'>Update</a></td>";
				echo "<td style='border-right: 1px solid #324563;'><a href='deleteEnquiry.php?id=$id'>Delete</a></td>";
				echo "</tr>";
				$count++;
			}
		}

		function add_batch($b_id, $f_id, $c_id, $s_id, $s_time, $e_time) {
			$query = "insert into batch_students(b_id, f_id, c_id, s_time, e_time, s_id) values($b_id, $f_id, $c_id, '$s_time', '$e_time', $s_id)";
				mysql_query($query);
				mysql_query("update enquiry_status set status='yes' where s_id='$s_id'");
		}

		function delete($id) {
			$query = " delete from admin where a_id='$id' ";
			mysql_query($query);
		}

		function delete_enquiry($id) {
			$query = "delete from enquiry where s_id='$id'";
			mysql_query("delete from batch_students where s_id='s_id'");
			mysql_query($query);
		}

		function course_select() {
			$rs = mysql_query("select * from courses");
			while ($rw=mysql_fetch_row($rs)) {
				$c_id = $rw[0];
				$c_name = $rw[1];
				$c_duration = $rw[2];
				echo "<option value='$c_id' >$c_name ($c_duration Days)</option>";
			}
		}
	}

?>
