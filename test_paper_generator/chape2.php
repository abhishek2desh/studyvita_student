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
		if($course_tutor_id==$student_tutor_id)
		{
		
		$result=mysql_query("SELECT c.ch_no,UCASE(c.name),c.id FROM chapter c,course_chapter cc,course_batch_active_chapter cb WHERE cc.course_id='$course_id' AND c.id=cc.chap_id AND c.active=1 and cc.sub_id IN (SELECT sub_id FROM subject_alias WHERE rel_sub_id='$subject_id') and c.id=cb.chapter_id and cb.active='1' and cb.course_id=cc.course_id and cb.batch_id='$batch_id'");
		
		}
		else
		{
		$result=mysql_query("SELECT c.ch_no,UCASE(c.name),c.id FROM chapter c,course_chapter cc WHERE cc.course_id='$course_id' AND c.id=cc.chap_id AND active=1 and cc.sub_id IN (SELECT sub_id FROM subject_alias WHERE rel_sub_id='$subject_id')");
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
			/*$total_que=0;
					$result_que=mysql_query("SELECT COUNT(ob.UniqId) FROM concept c,onlinequestionbank ob WHERE c.topic_id IN(SELECT id FROM topic WHERE chap_id='$row[2]') AND c.id=ob.ConceptId  AND MEDIUM IN('E','EG') AND (ob.Blocked_Question='0' OR  ob.Blocked_Question IS NULL)  AND Repeat_uniqid=FALSE AND pdffile_exist=TRUE  AND ob.Documenttype='O' AND ob.conceptid > 0");
					while($row_que=mysql_fetch_array($result_que))
					{
					$total_que=$row_que[0];
					}
			 //for boardmapping que
			 if($board=='1')
			 {
		 $result_que1=mysql_query("SELECT COUNT(ob.UniqId) FROM concept c,onlinequestionbank ob,Concept_mapping m,topic t
WHERE m.Cbse_TopicId IN(SELECT id FROM topic WHERE chap_id='$row[2]') AND m.conceptid=ob.ConceptId  AND c.id=m.conceptid 
AND ob.conceptid > 0 AND Repeat_uniqid=FALSE AND pdffile_exist=TRUE AND t.id=m.Gseb_TopicId  AND ob.MEDIUM IN('E','EG') AND 
(ob.Blocked_Question='0' OR  ob.Blocked_Question IS NULL)  AND ob.documenttype='O' and m.conceptid NOT IN(SELECT id FROM concept WHERE topic_id=m.Cbse_TopicId)");
					while($row_que1=mysql_fetch_array($result_que1))
					{
					$total_que=$total_que+$row_que1[0];
					}
			
			 }
			 elseif($board=='2')
			 {
			 $result_que1=mysql_query("SELECT COUNT(ob.UniqId) FROM concept c,onlinequestionbank ob,Concept_mapping m,topic t
WHERE m.Gseb_TopicId IN(SELECT id FROM topic WHERE chap_id='$row[2]') AND m.conceptid=ob.ConceptId  AND c.id=m.conceptid 
AND ob.conceptid > 0 AND Repeat_uniqid=FALSE AND pdffile_exist=TRUE AND t.id=m.Cbse_TopicId AND ob.MEDIUM IN('E','EG') AND 
(ob.Blocked_Question='0' OR  ob.Blocked_Question IS NULL)  AND ob.documenttype='O' and m.conceptid NOT IN(SELECT id FROM concept WHERE topic_id=m.Gseb_TopicId)");
 
					while($row_que1=mysql_fetch_array($result_que1))
					{
					$total_que=$total_que+$row_que1[0];
					}
			 }
			 else
			 {
			 } 
			 //end board mapping que*/
			 $total_que=0;
			 $result_que=mysql_query("SELECT (SUM(totalque)+SUM(mapped_que)) AS total FROM `question_status` WHERE chap_id='$row[2]'");
					while($row_que=mysql_fetch_array($result_que))
					{
					$total_que=$row_que[0];
					}
			 
				if($j%2==0)
				{
				echo "<tr style='background-color:#5E9DC8;'  >";
				}
				else
				{
				echo "<tr style='background-color:white;'  >";
				}
				$j++;
				echo "<td style='border-bottom:solid 0px;'><input type='radio' name='name_chapter' id='' class='' value='$row[2]' /></td>";
				/*echo "<td style='border-bottom:solid 0px;width:100%;' id='ck_first_value' value=$row[0]-$row[2]><font face='verdana' size='4' color='black' >$row[1]</font></td>";*/
				echo "<td style='border-bottom:solid 0px;width:100%;' id='ck_first_value' value=$row[0]-$row[2]><font face='verdana' size='4' color='black' >$row[1]</font></td>";
				//$avg="-";
				$avg_count=mysql_query("SELECT Avg_percent,Attempted FROM chapterwise_student_average WHERE chapter_id='$row[2]' AND student_id='$s5'");
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
		
				echo "<td><font face='verdana' size='4' color='black' >".$avg."</font></td>";
				echo "</tr>";
			}
		}
		echo "</table>";
		include_once '../conn_close.php';
?>