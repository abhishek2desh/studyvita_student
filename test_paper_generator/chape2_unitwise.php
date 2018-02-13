<?php
	
		include_once '../config.php';
		session_start();
		
		$course_id=$_SESSION['course_id'];
		$batch_id=$_SESSION['batch_id'];
		$subject_id=$_SESSION['subject_id'];
$s5=$_SESSION['sid'];
$result1t=mysql_query("SELECT `tutor_id` FROM course WHERE id='$course_id'");
		$row1t=mysql_fetch_array($result1t);
		$course_tutor_id=$row1t[0];
		$result1t2=mysql_query("SELECT created_by FROM USER WHERE id='$s5'");
		$row1t2=mysql_fetch_array($result1t2);
		$student_tutor_id=$row1t2[0];
$result1=mysql_query("SELECT board_id,standard_id FROM batch WHERE id='$batch_id'");
	
		$row1=mysql_fetch_array($result1);
		$board=$row1[0];
		$std=$row1[1];
		if($course_tutor_id==$student_tutor_id)
		{
		/*$result=mysql_query("SELECT c.ch_no,UCASE(c.name),c.id FROM chapter c,course_chapter cc,course_batch_active_chapter cb WHERE cc.course_id='$course_id' AND c.id=cc.chap_id AND c.active=1 and cc.sub_id IN (SELECT sub_id FROM subject_alias WHERE rel_sub_id='$subject_id') and c.id=cb.chapter_id and cb.active='1' and cb.course_id=cc.course_id and cb.batch_id='$batch_id'");*/
		$result=mysql_query("SELECT DISTINCT u.unit_name,u.id FROM `course_chapter` cc,chapter c,unit u,course_batch_active_chapter cb WHERE c.id=cc.chap_id AND cc.course_id='$course_id' AND (cc.sub_id='$subject_id' or cc.sub_id IN(SELECT DISTINCT sub_id FROM subject_alias WHERE rel_sub_id='$subject_id') ) and c.unit_id=u.id and u.id!='39' and c.id=cb.chapter_id and cb.active='1' and cb.course_id=cc.course_id and cb.batch_id='$batch_id' order by u.unit_name");
		}
		else
		{
		$result=mysql_query("SELECT DISTINCT u.unit_name,u.id FROM `course_chapter` cc,chapter c,unit u WHERE c.id=cc.chap_id AND cc.course_id='$course_id' AND (cc.sub_id='$subject_id' or cc.sub_id IN(SELECT DISTINCT sub_id FROM subject_alias WHERE rel_sub_id='$subject_id') ) and c.unit_id=u.id and u.id!='39' order by u.unit_name");
		}
		
		
		$rw = mysql_num_rows($result);
		echo "<table >";
		$j=1;
		if($rw == 0)
		{
			echo "<tr>";
			echo "<td>No Data Available.<td>";
			echo "</tr>";
		}
		else
		{
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
				echo "<td style='border-bottom:solid 0px;'><input type='radio' name='name_chapter' id='' class='' value='$row[1]' /></td>";
				/*echo "<td style='border-bottom:solid 0px;width:100%;' id='ck_first_value' value=$row[0]-$row[2]><font face='verdana' size='4' color='black' >$row[1]</font></td>";*/
				echo "<td style='border-bottom:solid 0px;width:100%;' id='ck_first_value' value=$row[1]><font face='verdana' size='3' color='black' >$row[0]</font></td>";
				/*$avg_count=mysql_query("SELECT Avg_percent,Attempted FROM chapterwise_student_average WHERE chapter_id='$row[2]' AND student_id='$s5'");
				$avg_count_rw = mysql_num_rows($avg_count);
				if($avg_count_rw==0)
				{
				$avg="-";
				}
				else
				{
				$avg_count_row=mysql_fetch_array($avg_count);
				$avg=$avg_count_row[0];
				}
		
				echo "<td><font face='verdana' size='4' color='black' >".$avg."</font></td>";*/
				echo "</tr>";
			}
		}
		echo "</table>";
		include_once '../conn_close.php';
?>