<?php 
	
	include_once '../config.php';
	
	$cp_value12 = $_GET['cp_value12'];
	$uid = $_GET['uid'];
	
	
	$result=mysql_query("SELECT Avg_Percent FROM chapterwise_student_average WHERE student_id='$uid' AND Chapter_id='$cp_value12'");
	
	$row=mysql_fetch_array($result);
	$avg=$row[0];
	if($avg == "")
	{
		echo "[-%]";
	}
	else
	{
			echo "[".$avg."%]";
	}
	include_once '../conn_close.php';
?>