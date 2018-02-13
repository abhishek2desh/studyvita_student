<?php
	include_once '../config.php';
	$course_id=$_GET['course_id'];
	$result=mysql_query("SELECT course_type_id FROM `course_type_mapping` WHERE course_id='$course_id'");
	while($row=mysql_fetch_array($result))
	{
	echo $row[0];
	}
	
?>