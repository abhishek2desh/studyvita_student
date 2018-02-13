<?php
	$docid = $_GET['docid'];
	$user = $_GET['uid'];	
	$start_time = $_GET['start_time'];	
	$page_source = $_GET['page_source'];	
	require_once("../config.php");
	
	$sql = "insert into Document_log_detail
	(`video_id`,`user_id`,start_time,page_source)
	values('$docid','$user','$start_time','$page_source')";
	$result = mysql_query($sql);
	if ($result)
	{
		//echo "success...";
	}
	else
	{
	//echo $sql;
		//echo "failed...";
	}
	//include_once '../conn_close.php';
?>