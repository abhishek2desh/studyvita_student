<?php
	$delete = $_GET['dt9'];

	require_once("../config.php");
	
	$sql = "DELETE FROM `class_scheduler` WHERE `topic_id` =".$delete;
	$result = mysql_query($sql);
	if ($result)
	{
		echo "success...";
	}
	else
	{
		echo "failed...";
	}
	include_once '../conn_close.php';
?>