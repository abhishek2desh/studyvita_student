<?php

		include_once '../config.php';
	
		$date_time=$_GET['date_time'];
		$uid=$_GET['uid'];
		$new_test_id=$_GET['test_id'];
	
		$update_query=mysql_query("UPDATE adaptive_learning_test SET start_time='$date_time' WHERE test_id='$new_test_id' AND student_id='$uid'");
		
		if($update_query)
		{
			echo "true";
		}
		
		
?>