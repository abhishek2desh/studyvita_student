<?php
	
	include_once '../config.php';
	$u_id=$_GET['uid'];
	$result1=mysql_query("SELECT COUNT(*) FROM user_roll WHERE user_id='$u_id' AND roll_id='16'");
	$row=mysql_fetch_array($result1);
	$get_val=$row[0];
	echo $get_val;
	include_once '../conn_close.php';
?>
