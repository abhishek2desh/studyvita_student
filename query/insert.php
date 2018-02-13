
<?php
	$user = $_GET['dt1'];
	$sub = $_GET['dt2'];
	$branch = $_GET['dt3'];
	$batch = $_GET['dt4'];
	$chap = $_GET['dt5'];
	$topic = $_GET['dt6'];
	$tl = $_GET['type_lect'];
	$wk_pl = $_GET['week_plan'];
	$wb_id = $_GET['wb_id'];
	$course_id = $_GET['course_sel'];
	
	require_once("../config.php");
	
	$sql = "insert into class_scheduler(`user_id`,`sub_id`,`branch_id`,`batch_id`,`chap_id`,`topic_id`,
	`type_lect_id`,`weekly_planning`,`wb_id`,`course_id`)
	values('$user','$sub','$branch','$batch','$chap','$topic','$tl','$wk_pl','$wb_id','$course_id')";
	
	$result = mysql_query($sql);
	if ($result)
	{
		echo "success...";
	}
	else
	{
		echo "failed...";
	}
	//include '../conn_close.php';
?>