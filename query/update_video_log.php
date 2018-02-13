<?php
	$docid = $_GET['docid'];
	$user = $_GET['uid'];	
	$start_time = $_GET['start_time'];
	$end_time= $_GET['end_time'];
	$page_source = $_GET['page_source'];
	require_once("../config.php");
	
	$sql = "update  Document_log_detail set end_time='$end_time' where video_id='$docid' and user_id='$user' and start_time='$start_time' and page_source='$page_source'";

	$result = mysql_query($sql);
	if ($result)
	{
	//echo $sql;
		//echo "success...";
	}
	else
	{
	//echo $sql;
		//echo "failed...";
	}
	//include_once '../conn_close.php';
?>