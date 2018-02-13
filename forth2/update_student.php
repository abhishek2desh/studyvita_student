<?php
	
		include_once '../config.php';
		
		$first=$_GET['first'];
		$second=$_GET['second'];		
	
		$que=mysql_query("RENAME TABLE $first TO $second");
		if($que)
		{
			echo "success";
		}
		else
		{
			echo "Failed";
		}
?>