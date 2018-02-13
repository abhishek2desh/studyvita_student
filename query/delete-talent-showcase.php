<?php
	include '../config.php';
	$record_id=$_GET['record_id'];
	$sql = "DELETE FROM user_talent WHERE `id` ='$record_id' ";
	$result = mysql_query($sql);
	if ($result)
	{
		echo "success";
	}
	else
	{
		echo "failed...";
	}
	?>