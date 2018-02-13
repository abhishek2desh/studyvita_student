<?php

	include_once '../config.php';
	$batch_id=$_GET['batch_id'];
	$result1=mysql_query("SELECT email_id,password,name FROM batch WHERE id='$batch_id'");
	$batch_name="";
		while($row1 = mysql_fetch_array($result1))
		{
		
		
			$batch_name=$row1[2];
		}
		echo $batch_name;
?>