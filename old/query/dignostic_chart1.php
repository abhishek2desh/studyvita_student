<?php

	include_once '../config.php';
	session_start();
	
	$s = $_GET['s'];
	$sid = $_SESSION['sid'];
		
		/*
			$result_q = "SELECT s.unit_id,s.Cumulative_per_Overall,u.unit_name,s.id FROM studenttestwise_unitper s,unit u 
WHERE s.Enroll_id='1623' AND s.subject_id='14' AND s.unit_id=u.id AND 
s.id IN( SELECT MAX(id) FROM studenttestwise_unitper WHERE Enroll_id='1623' AND subject_id='14' GROUP BY unit_id))";
		*/
		$result_q = "SELECT s.unit_id,s.Cumulative_per,u.unit_name,s.id FROM studenttestwise_unitper s,unit u WHERE s.user_id='$sid' AND s.subject_id='$s' AND s.unit_id=u.id AND 
	s.id IN( SELECT MAX(id) FROM studenttestwise_unitper WHERE user_id='$sid' AND subject_id='$s' GROUP BY unit_id)";
	//echo $result_q;
	$result = mysql_query($result_q);
	$array = array();

	$num_rows = mysql_num_rows($result);
	//echo "<br/>".$num_rows;
	$i=0;
	echo "[";
	while($row = mysql_fetch_array($result)) { 
		$i++;
		
		if($i<$num_rows){
			echo $link = $row[1].",";
		}
		else {
			echo $link = $row[1];
		}
	}
	echo "]";
	
?>