<?php
	
		include_once '../config.php';
		session_start();
		
		$course_id=$_SESSION['course_id'];
		$batch_id=$_SESSION['batch_id'];
		$subject_id=$_SESSION['subject_id'];
		
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
		$result=mysql_query("SELECT c.ch_no,UCASE(c.name),c.id FROM chapter c,course_chapter cc WHERE cc.course_id='$course_id' AND c.id=cc.chap_id AND active=1 and cc.sub_id IN (SELECT sub_id FROM subject_alias WHERE rel_sub_id='$subject_id')");
		$rw = mysql_num_rows($result);
		echo "<option value='0'>Select Chapter</option>";
		if($rw == 0)
		{
			
			echo "No Data Available.";
			
		}
		else
		{
			while($row=mysql_fetch_array($result))
			{
			
					
				echo "<option value='$row[2]'>$row[1]</option>";
			
			}
		}
		
?>