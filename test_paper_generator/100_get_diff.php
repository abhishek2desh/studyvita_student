<?php 
	
	include_once '../config.php';
	
	$uniq_id_get = $_GET['uniq_id_get'];
	
	$result=mysql_query("SELECT Per FROM `uniqidwise_diff_per` WHERE UniqId='$uniq_id_get'");
	$row=mysql_fetch_array($result);
	$per=$row[0];
	echo "Difficulty Per : ".$per;
	include_once '../conn_close.php';
?>