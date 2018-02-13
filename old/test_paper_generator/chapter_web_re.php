<?php
	
		include_once '../config.php';
		session_start();
		$course_id=$_SESSION['course_id'];
		$batch_id=$_SESSION['batch_id'];
		$subject_id=$_SESSION['subject_id'];
		
		$result1=mysql_query("SELECT class,board FROM course WHERE id='$course_id'");
		$row_1=mysql_fetch_array($result1);
		$std=$row_1[0];$board=$row_1[1];
		$j=1;
		$result=mysql_query("SELECT c.ch_no,c.name,c.id FROM chapter c,course_chapter cc WHERE cc.course_id='$course_id' AND c.id=cc.chap_id AND active=1 AND cc.sub_id IN (SELECT sub_id FROM subject_alias WHERE rel_sub_id='$subject_id') ");
		
		$rw = mysql_num_rows($result);
		
		if($rw == 0)
		{
			echo "<option value=''>No Data Available.</option>";
		}
		else
		{
			while($row=mysql_fetch_array($result))
			{
				
					echo "<option value=$row[2]>$row[0] - $row[1]</option>";
					
			}
		}
		include_once '../conn_close.php';
?>