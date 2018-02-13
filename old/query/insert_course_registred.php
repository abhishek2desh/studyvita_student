<?php
	$cid = $_GET['cid'];
	$ctutor_id = $_GET['ctutor_id'];
	
	require_once("../config.php");
	
	$sql = "insert into student_registered_course(`course_id`,`user_id`)
	values('$cid','$ctutor_id')";
	$result = mysql_query($sql);
	if ($result)
	{
		echo "success";
	}
	else
	{
		echo "failed";
	}
	include_once '../conn_close.php';
?>