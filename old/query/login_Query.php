<?php
		session_start();
		$username = $_POST['name'];
		$password = $_POST['pwd'];

		include_once '../config.php';
	

		$query = "SELECT * FROM student WHERE id IN
					(SELECT student_id FROM student_alias WHERE username='$username' AND PASSWORD='$password')";
		$result = mysql_query($query);
		$num_row = mysql_num_rows($result);
		$row=mysql_fetch_array($result);
		if( $num_row >=1 ) {
			echo 'true';
			$_SESSION['username']=$username;
			
			$studid = $row['edutech_student_id'];
			$stnd= $row['standard'];
			$grp = $row['group_id'];
			$btch = $row['batch_id'];
			$stud_id = $row['id'];
			
			$_SESSION['studid1']=$studid;
			$_SESSION['stnd1']=$stnd;
			$_SESSION['grp1']=$grp;
			$_SESSION['btch1']=$btch;
			$_SESSION['sid']=$stud_id;
		}
		else{
			echo 'false';
		}
		include_once '../conn_close.php';
?>