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
	
	$sql = "DELETE FROM `class_scheduler` WHERE `topic_id` ='$topic' AND user_id='$user' AND branch_id='$branch' AND batch_id='$batch' AND sub_id='$sub'
AND chap_id='$chap' AND type_lect_id='$tl' AND wb_id='$wb_id' and course_id='$course_id '";
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