<?php
	
		include_once '../config.php';
		
		
		$user_id=$_GET['user_id'];
		
		$sql="";
		
		$rs = mysql_query("SELECT  DISTINCT u.name,fd.`experience`,fd.`Qualification`,u.id,u.contact_no FROM `faculty_detail` fd,USER u,`faculty_subject_board_std_mapping` fm WHERE u.id=fd.user_id AND fm.user_id=fd.user_id");
//echo "SELECT  DISTINCT u.name,fd.`experience`,fd.`Qualification`,u.id,u.contact_no FROM `faculty_detail` fd,USER u,`faculty_subject_board_std_mapping` fm WHERE u.id=fd.user_id AND fm.user_id=fd.user_id $sql";
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
				echo "<td style='border:solid 1px;'><input type='button' class='defaultbutton' id='request_class' value='Request a class'></td>";
				}
				else
				{
				echo "<td style='border:solid 1px;'>Requested</td>";
				}
				
				echo "</tr>";
			}
			echo "</table>";
		}
?>