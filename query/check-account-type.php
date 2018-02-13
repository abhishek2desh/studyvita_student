<?php
		include '../config.php';
		
		$uid=$_GET['uid'];
		$course_id=$_GET['course_id'];
		$acttype="";
		
			$result_u=mysql_query("SELECT id FROM `student_registered_course` WHERE user_id='$uid' AND course_id='$course_id' ");
	$rwc=mysql_num_rows($result_u);
	if($rwc==0)
	{
	$acttype="Basic";
	}
	else
	{
	$acttype="premium";
	}
			if($acttype=="basic" || $acttype=="Basic")
			{
			//check course type
			$result_u1=mysql_query("SELECT ct.name FROM course_type ct,course_type_mapping ctm  WHERE ctm.course_id='$course_id' and ct.id=ctm.course_type_id");
			while($rowu=mysql_fetch_array($result_u1))
			{
			$course_type=$rowu[0];
			if($course_type=="Regular" || $course_type=="regular")
			{
			echo "success";
			}
			else
			{
			}
			}
			//end course type
			}
			else
			{
			echo "success";
			}