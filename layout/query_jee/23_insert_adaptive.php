<?php

	include_once '../config.php';
	
	$end_time=$_GET['date_time2'];
	
	$new_test_id=$_GET['new_test_id'];
	
		$update_query=mysql_query("UPDATE adaptive_learning_test SET end_time='$end_time',Test_submit='1' WHERE test_id='$new_test_id'");
		
		if($update_query)
		{
			echo "Successfully Updated";
		}
		else
		{
			echo "Failed";
		}

?>