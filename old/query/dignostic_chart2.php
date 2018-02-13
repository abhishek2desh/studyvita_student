<?php

	include_once '../config.php';
	session_start();
	
	$s = $_GET['s'];
	$sid = $_SESSION['sid'];

		
	$result = mysql_query("SELECT s.unit_id,(100-s.Cumulative_per),u.unit_name,s.id FROM studenttestwise_unitper s,unit u WHERE s.user_id='$sid' AND s.subject_id='$s' AND s.unit_id=u.id AND 
	s.id IN( SELECT MAX(id) FROM studenttestwise_unitper WHERE user_id='$sid' AND subject_id='$s' GROUP BY unit_id)");

	$array = array();

	$num_rows = mysql_num_rows($result);
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