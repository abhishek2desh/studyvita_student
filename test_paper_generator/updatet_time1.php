<?php
	
		include_once '../config.php';
		
		$test_id=$_GET['test_id_new'];
		$uid=$_GET['user_id'];
		$up_query=mysql_query("SELECT get_time_in_second FROM adaptive_learning_test WHERE test_id='$test_id' AND student_id='$uid'");
		$row=mysql_fetch_array($up_query);
		$time=$row[0];
		echo $time;
		include_once '../conn_close.php';
?>