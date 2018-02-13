<?php
	$name = $_GET['name'];
	$user = $_GET['uid'];	
	$batch = $_GET['bta'];
	$chap = $_GET['chap_id'];
	$dt = $_GET['dt'];
	$course_id = $_GET['course_id'];
	$subject_id = $_GET['subject_id'];
	require_once("../config.php");
	
	$sql = "insert into student_onlinecourse_progress
	(`additional_topic_name`,`user_id`,`batch_id`,`chap_id`,`course_id`,`class_date`,sub_id)
	values('$name','$user','$batch','$chap','$course_id','$dt','$subject_id')";
	$result = mysql_query($sql);
	if ($result)
	{
		echo "success...";
	}
	else
	{
		echo "failed...";
	}
	//include_once '../conn_close.php';
?>