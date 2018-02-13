<?php
	
		include_once '../config.php';
		session_start();
		$s5=$_SESSION['sid'];
		$sub_id=$_GET['sub_id'];
		$course_id=$_GET['course_id'];
		$test_id=$_GET['test_id'];
		$board_id="";
		$std_id="";
		$result1=mysql_query("SELECT class,board FROM `course` WHERE id='$course_id' ");
		
			while($row1_ch=mysql_fetch_array($result1))
			{
				$std_id=$row1_ch[0];
				$board_id=$row1_ch[1];
			}
		
		$rs = mysql_query("SELECT  DISTINCT u.name,fd.`experience`,fd.`Qualification`,u.id FROM `faculty_detail` fd,USER u,`faculty_subject_board_std_mapping` fm WHERE u.id=fd.user_id AND fm.user_id=fd.user_id AND fm.board_id='$board_id' AND fm.standard_id='$std_id' AND fm.subject_id='$sub_id'");

		$rw = mysql_num_rows($rs);

		if($rw == 0)
		{
			echo "No Data Available";
			
		}
		else
		{
			echo "<table style='width:100%;border:solid 1px;' cellspacing='0'>";
			echo "<tr><th style='border:solid 1px;' width='70'>Name</th>";
			echo "<th style='border:solid 1px;' width='70'>Experience</th>";
			echo "<th style='border:solid 1px;' width='70'>Qualification</th>";
			echo "<th style='border:solid 1px;' width='70'>Class Request</th>";
				echo "<th style='border:solid 1px;' width='70'></th>";
			echo "</tr>";
			while($row = mysql_fetch_array($rs))
			{
				echo "<tr  id='$row[3]'>";
				echo "<td style='border:solid 1px;'>".$row[0]."</td>";
				echo "<td style='border:solid 1px;'>".$row[1]."</td>";
				echo "<td style='border:solid 1px;'>".$row[2]."</td>";
				if($test_id>0)
				{
				$rs4 = mysql_query("SELECT id  FROM requirement_posted WHERE faculty_id='$row[3]' AND student_id='$s5' and test_id='$test_id'");
				//echo "SELECT id  FROM requirement_posted WHERE faculty_id='$row[3]' AND user_id='$s5' and test_id='$test_id'";
				}
				else
				{
				$rs4 = mysql_query("SELECT id  FROM requirement_posted WHERE faculty_id='$row[3]' AND student_id='$s5'");
				}
				
				$rw4 = mysql_num_rows($rs4);

				if($rw4 == 0)
				{
				echo "<td style='border:solid 1px;'><input type='button' class='defaultbutton' id='request_class' value='Request a class'></td>";
				}
				else
				{
				echo "<td style='border:solid 1px;'>Requested</td>";
				}
				echo "<td style='border:solid 1px;'><input type='button' class='defaultbutton' id='brief_view' value='View Profile'></td>";
				echo "</tr>";
			}
			echo "</table>";
		}
?>