<?php
	
		include_once '../config.php';
		
		$sub_id=$_GET['sub_id'];
		$board_id=$_GET['board_id'];
		$std_id=$_GET['std_id'];
		$area=$_GET['area'];
		$course_id=$_GET['course_id'];
		$user_id=$_GET['user_id'];
		
		$sql="";
		if($board_id>0)
		{
		$sql= " AND fm.board_id='$board_id'";
		}
		if($std_id>0)
		{
			if($sql=="")
			{
			$sql= " AND fm.standard_id='$std_id'";
			}
			else
			{
			$sql= $sql." AND fm.standard_id='$std_id'";
			}
		
		}
		if($sub_id>0)
		{
			if($sql=="")
			{
			$sql= " AND fm.subject_id='$sub_id'";
			}
			else
			{
			$sql= $sql." AND fm.subject_id='$sub_id'";
			}
		
		}
		if($area=="")
		{
		}
		else
		{
			if($sql=="")
			{
			$sql= " AND u.address like'%$area%'";
			}
			else
			{
			$sql= $sql." AND u.address like'%$area%'";
			}
		
		}
		$rs = mysql_query("SELECT  DISTINCT u.name,fd.`experience`,fd.`Qualification`,u.id,u.contact_no FROM `faculty_detail` fd,USER u,`faculty_subject_board_std_mapping` fm WHERE u.id=fd.user_id AND fm.user_id=fd.user_id $sql");
//echo "SELECT  DISTINCT u.name,fd.`experience`,fd.`Qualification`,u.id,u.contact_no FROM `faculty_detail` fd,USER u,`faculty_subject_board_std_mapping` fm WHERE u.id=fd.user_id AND fm.user_id=fd.user_id $sql";
		$rw = mysql_num_rows($rs);

		if($rw == 0)
		{
			echo "No Data Available";
			
		}
		else
		{
		$flg=0;
			$rs1 = mysql_query("SELECT id FROM `student_registered_course` WHERE `course_id`='$course_id' AND `user_id`='$user_id'");
		$rw1= mysql_num_rows($rs1);

		if($rw1 > 0)
		{
			$flg=1;
		}
			echo "<table style='width:100%;border:solid 1px;' cellspacing='0'>";
			echo "<tr><th style='border:solid 1px;' width='70'>Name</th>";
			echo "<th style='border:solid 1px;' width='70'>Experience</th>";
			echo "<th style='border:solid 1px;' width='70'>Qualification</th>";
				echo "<th style='border:solid 1px;' width='70'>Class Request</th>";
			/*if($flg==1)
			{
				echo "<th style='border:solid 1px;' width='70'>Contact No</th>";
			}*/
			echo "</tr>";
			while($row = mysql_fetch_array($rs))
			{
				echo "<tr  id='$row[3]'>";
				echo "<td style='border:solid 1px;'>".$row[0]."</td>";
				echo "<td style='border:solid 1px;'>".$row[1]."</td>";
				echo "<td style='border:solid 1px;'>".$row[2]."</td>";
				$rs4 = mysql_query("SELECT id  FROM requirement_posted WHERE faculty_id='$row[3]' AND student_id='$user_id' and test_id is null");
				$rw4 = mysql_num_rows($rs4);

				if($rw4 == 0)
				{
				echo "<td style='border:solid 1px;'><input type='button' class='online_test_fact_view' id='request_class' value='Request a class'></td>";
				}
				else
				{
				echo "<td style='border:solid 1px;'>Requested</td>";
				}
				/*if($flg==1)
				{
				echo "<td style='border:solid 1px;'>".$row[4]."</td>";
				}*/
				echo "</tr>";
			}
			echo "</table>";
		}
?>