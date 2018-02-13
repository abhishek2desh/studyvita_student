<?php
	include '../config.php';
	$uid=$_GET['uid'];
	$course_id=$_GET['course_id'];
	$course_type="";
	$rs = mysql_query("select ct.name from course_type t,course_type_mapping ctm where ctm.course_id='$course_id' and ct.id=ctm.course_type_id");
	while($row=mysql_fetch_array($rs))
		{
		$course_type=$row[0];
		
		}
		echo $course_type;
?>