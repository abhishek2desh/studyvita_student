<?php
	
		include_once '../config.php';
		session_start();
		
		$course_id=$_SESSION['course_id'];
		$batch_id=$_SESSION['batch_id'];
		$subject_id=$_SESSION['subject_id'];
		$unitid=$_GET['unitid'];
		$s5=$_SESSION['sid'];
		$result1t=mysql_query("SELECT `tutor_id` FROM course WHERE id='$course_id'");
		$row1t=mysql_fetch_array($result1t);
		$course_tutor_id=$row1t[0];
		$result1t2=mysql_query("SELECT created_by FROM USER WHERE id='$s5'");
		$row1t2=mysql_fetch_array($result1t2);
		$student_tutor_id=$row1t2[0];
		if($course_tutor_id==$student_tutor_id)
		{
		$result=mysql_query("SELECT DISTINCT UCASE(c.name),c.id  FROM `course_chapter` cc,chapter c,unit u,course_batch_active_chapter cb  WHERE c.id=cc.chap_id AND cc.course_id='$course_id' AND (cc.sub_id='$subject_id' or cc.sub_id IN(SELECT DISTINCT sub_id FROM subject_alias WHERE rel_sub_id='$subject_id') ) and c.unit_id=u.id and u.id='$unitid' and c.id=cb.chapter_id and cb.active='1' and cb.course_id=cc.course_id and cb.batch_id='$batch_id' ");
		}
		else
		{
		$result=mysql_query("SELECT DISTINCT UCASE(c.name),c.id  FROM `course_chapter` cc,chapter c,unit u WHERE c.id=cc.chap_id AND cc.course_id='$course_id' AND (cc.sub_id='$subject_id' or cc.sub_id IN(SELECT DISTINCT sub_id FROM subject_alias WHERE rel_sub_id='$subject_id') ) and c.unit_id=u.id and u.id='$unitid'  ");
		}
		
		
		$rw = mysql_num_rows($result);
		/*echo "<table style='width:100%'>
		<tr style='background-color:#0f2541;'>
		<td style='width:100%'>
		<label style='padding-left:5px;'><font face='verdana' size='4' color='white' >Chapter List</font></label><br/>
		</td>
		</tr>
		</table>";*/
		//echo "<font face='verdana' size='3' color='black' >Chapter List</font>";
		echo "<table >";
		$i=1;
		if($rw == 0)
		{
			echo "<tr>";
			echo "<td>No Data Available.<td>";
			echo "</tr>";
		}
		else
		{
		$j=1;
			while($row=mysql_fetch_array($result))
			{
			
			 
				if($j%2==0)
				{
				echo "<tr style='background-color:#5E9DC8;'  >";
				}
				else
				{
				echo "<tr style='background-color:white;'  >";
				}
				$j++;
				
				echo "<td style='border-bottom:solid 0px;width:100%;' id='ck_first_value' value=$row[1]><font face='verdana' size='3' color='black' >$i. $row[0]</font></td>";
				$i=$i+1;
				echo "</tr>";
			}
		}
		echo "</table>";
		include_once '../conn_close.php';
?>