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
		
		/*$result=mysql_query("select ch_no,name,id from chapter where sub_id IN 
							(SELECT sub_id FROM subject_alias WHERE rel_sub_id='$subject_id')
							AND board_id IN (SELECT board_id FROM student_details WHERE board_id='$board') 
							AND standard_id IN 
							(SELECT standard_id FROM student_details WHERE standard_id='$std')
							AND active=1 order by ch_no ");*/
							//echo "SELECT  c.name,c.id,c.ch_no FROM chapter c,course_chapter cc WHERE cc.course_id='$course_id' AND c.id=cc.chap_id AND active=1 and cc.sub_id IN (SELECT sub_id FROM subject_alias WHERE rel_sub_id='$subject_id')";
	
		//echo "SELECT c.ch_no,UCASE(c.name),c.id FROM chapter c,course_chapter cc WHERE cc.course_id='$course_id' AND c.id=cc.chap_id AND active=1 and cc.sub_id IN (SELECT sub_id FROM subject_alias WHERE rel_sub_id='$subject_id')";
		if($course_tutor_id==$student_tutor_id)
		{
			$result=mysql_query("SELECT c.name,c.id,c.ch_no FROM chapter c,course_chapter cc,course_batch_active_chapter cb WHERE cc.course_id='$course_id' AND c.id=cc.chap_id AND c.active=1 and cc.sub_id IN (SELECT sub_id FROM subject_alias WHERE rel_sub_id='$subject_id') and c.id=cb.chapter_id and cb.active='1' and cb.course_id=cc.course_id and cb.batch_id='$batch_id'");
			
		}
		else
		{
			$result=mysql_query("SELECT  c.name,c.id,c.ch_no FROM chapter c,course_chapter cc WHERE cc.course_id='$course_id' AND c.id=cc.chap_id AND active=1 and cc.sub_id IN (SELECT sub_id FROM subject_alias WHERE rel_sub_id='$subject_id')");
		}
		$rw = mysql_num_rows($result);
			echo "<table  id='tb1' width='100%' border='1'>";
			echo "<tr style='background-color:#0f2541;'><th align='left' style='border-right:solid 1px;border-bottom:solid 1px;border-left:solid 1px;border-top:solid 1px;' width='70%'><font face='verdana' size='2' color='white' >Chapter Name</font></th>";
			echo "<th align='left' style='border-right:solid 1px;border-bottom:solid 1px;border-left:solid 0px;border-top:solid 1px;' width='15%'><font face='verdana' size='2' color='white' >Average %</font></th>";	
			echo "<th align='left' style='border-bottom:solid 1px;border-right:solid 1px;border-left:solid 0px;border-top:solid 1px;' width='15%'><font face='verdana' size='2' color='white' >No of Question</font></th>";
			echo "</tr>";
			$totalr=1;
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
			//echo "in while";
		
			 $total_que=0;
			 $result_que=mysql_query("SELECT (SUM(totalque)+SUM(mapped_que)) AS total FROM `question_status` WHERE chap_id='$row[1]'");
			 //echo "SELECT (SUM(totalque)+SUM(mapped_que)) AS total FROM `question_status` WHERE chap_id='$row[2]'";
					while($row_que=mysql_fetch_array($result_que))
					{
					$total_que=$row_que[0];
					}
					//echo $row[2]."-".$total_que."<br/>";
			 if($total_que>0)
				{
				//echo "in if";
				if($j%2==0)
				{
				echo "<tr style='background-color:#5E9DC8;'  id='$row[1]-$row[2]-$total_que'>";
				}
				else
				{
				echo "<tr style='background-color:white;'  id='$row[1]-$row[2]-$total_que'>";
				}
				
				$j++;
					//echo "<tr id='$row[1]-$row[2]-$total_que'>";
					
						echo "<td style='font-size:12px;border-right:solid 1px;width:535px;border-left:solid 1px;'><font face='verdana'  color='black' >".$row[0]."</font></td>";
						$avg_count=mysql_query("SELECT Avg_percent,Attempted FROM chapterwise_student_average WHERE chapter_id='$row[1]' AND student_id='$s5'");
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
				echo "<td style='font-size:12px;border-right:solid 1px;width:535px;'><font face='verdana'  color='black' >".$avg."</font></td>";
				echo "<td style='font-size:12px;border-right:solid 1px;'><input type='text' id='total_que_chapter' onkeypress='return event.charCode >= 48 && event.charCode <= 57' style='width:50px;' name='total_que_chapter' class='commonclass'/>
				</td>";
			
				echo "</tr>";
				}
				else
				{
				//echo "in else";
				}
				
			}
		}
		echo "</table>";
		//include_once '../conn_close.php';
?>