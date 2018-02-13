<?php
	
		include_once '../config.php';
		
		$test_id=$_GET['test_id_new'];
		$uid=$_GET['user_id'];
		$ge_second_time=$_GET['s2'];
		
		$up_query=mysql_query("UPDATE adaptive_learning_test SET get_time_in_second='$ge_second_time' WHERE test_id='$test_id' AND student_id='$uid'");
	
		if($up_query)
		{
			echo "Successfully Insertted";
		}
		else
		{
			echo "Failed Insertted";
		}
		include_once '../conn_close.php';
?>