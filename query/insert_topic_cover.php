
<?php
	$user = $_GET['dt1'];
	$sub = $_GET['dt2'];
	//$branch = $_GET['dt3'];
	$batch = $_GET['dt4'];
	$chap = $_GET['dt5'];
	$topic = $_GET['dt6'];
	$datepickerVal = $_GET['datepickerVal'];
	//$wk_pl = $_GET['week_plan'];
	//$wb_id = $_GET['wb_id'];
	$course_id = $_GET['course_sel'];
	
	require_once("../config.php");
	
	$sql = "insert into student_onlinecourse_progress(`user_id`,`sub_id`,`batch_id`,`chap_id`,`topic_id`,
	`class_date`,`course_id`) values('$user','$sub','$batch','$chap','$topic','$datepickerVal','$course_id')";
	
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