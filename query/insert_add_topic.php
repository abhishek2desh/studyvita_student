<?php
	$name = $_GET['name'];
	$user = $_GET['uid'];	
	$batch = $_GET['bta'];
	$chap = $_GET['chap_id'];
	$tl = $_GET['type_lect'];
	$wb = $_GET['wb_id'];

	require_once("../config.php");
	
	$sql = "insert into additional_topic_cover
	(`name`,`user_id`,`batch_id`,`chap_id`,`type_lect_id`,`working_batch_id`)
	values('$name','$user','$batch','$chap','$tl','$wb')";
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