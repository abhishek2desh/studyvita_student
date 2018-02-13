<?php
	
		include_once '../config.php';
		session_start();
		$course_id=$_GET['course_id'];
		$subject_id=$_SESSION['subject_id'];
		if($subject_id=="20")
		{
		$result=mysql_query("SELECT DISTINCT c.standard_id FROM chapter c,course_chapter cc WHERE cc.course_id='$course_id' AND c.id=cc.chap_id
AND active=1 ");
		}
		else
		{
		$result=mysql_query("SELECT DISTINCT c.standard_id FROM chapter c,course_chapter cc WHERE cc.course_id='$course_id' AND c.id=cc.chap_id
AND active=1 AND cc.sub_id IN (SELECT sub_id FROM subject_alias WHERE rel_sub_id='$subject_id')");
}
		$rw = mysql_num_rows($result);
		if($rw=="1")
		{
		echo 1;
		}
		else
		{
		echo 2;
		}
		
?>