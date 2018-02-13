<?php 
	
	include_once '../config.php';
	
	$fac_id = $_GET['uid'];
	$sub_id = $_GET['sub_id'];
	$dt1 = $_GET['dt1'];
	$dt2 = $_GET['dt2'];
	
	$result=mysql_query("SELECT test_id,DATE_FORMAT(DATE(start_time),'%d-%m-%Y') FROM adaptive_learning_test WHERE start_time 
						BETWEEN '$dt1' AND '$dt2' AND student_id='$fac_id' AND subject='$sub_id' order by test_id desc");
	
	echo "<option value='0'>Select TestID</option>";
	while($row=mysql_fetch_array($result))
	{
		echo "<option value='$row[0]'>$row[0] [$row[1]]</option>";
	}
	include_once '../conn_close.php';
?>