<?php
	
		include_once '../config.php';
		session_start();
		$subject_id=$_SESSION['subject_id'];
		$course_id=$_GET['crs_id'];
		if($subject_id=="20")
		{
		$result=mysql_query("SELECT DISTINCT c.standard_id,s.name FROM chapter c,course_chapter cc,standard s WHERE cc.course_id='$course_id' AND c.id=cc.chap_id
AND active=1  and s.id=c.standard_id");
		}
		else
		{
		$result=mysql_query("SELECT DISTINCT c.standard_id,s.name FROM chapter c,course_chapter cc,standard s WHERE cc.course_id='$course_id' AND c.id=cc.chap_id
AND active=1 AND cc.sub_id IN (SELECT sub_id FROM subject_alias WHERE rel_sub_id='$subject_id') and s.id=c.standard_id");
		}
		
		$rw = mysql_num_rows($result);
		echo "<option value='0'>Select Standard</option>";
		while($row=mysql_fetch_array($result))
		{
		 echo "<option value=$row[0]>$row[1]</option>";
		}
		
?>